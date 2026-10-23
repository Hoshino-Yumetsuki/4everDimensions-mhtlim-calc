import { PhpCloudflare } from 'php-cloud-wasm/php8.3-cloudflare.mjs';
import files from '../dist/php-files.json';

// ponytail: one 64 MiB PHP instance per isolate; a smaller build is needed for parallel execution.
let phpBusy = false;

export default {
  async fetch(request, env) {
    const url = new URL(request.url);
    const pathname = url.pathname === '/' ? '/index.php' : url.pathname;
    const script = `/app${pathname}`;
    if (!pathname.endsWith('.php')) return env.ASSETS.fetch(request);
    if (!Object.hasOwn(files, script) || pathname === '/fc.php' || pathname === '/user/auth.php') {
      return new Response('Not Found', { status: 404 });
    }
    if (!['GET', 'HEAD', 'POST'].includes(request.method)) {
      return new Response('Method Not Allowed', { status: 405, headers: { Allow: 'GET, HEAD, POST' } });
    }
    if (phpBusy) {
      return new Response('PHP is busy', { status: 503, headers: { 'Retry-After': '1', 'Cache-Control': 'no-store' } });
    }

    phpBusy = true;
    try {
      let metadata;
      const php = new PhpCloudflare({
        shared: { script, respond: value => { metadata = JSON.parse(value); } },
        ini: 'display_errors=0\nlog_errors=1\nerror_log=/dev/stderr\nshort_open_tag=0',
      });
      let output = '';
      php.addEventListener('output', event => { output += event.detail.join(''); });
      php.addEventListener('error', event => { console.error(event.detail.join('')); });
      for (const directory of ['/app', '/app/user', '/app/includes', '/app/includes/sbrobot', '/app/wtf']) {
        await php.mkdir(directory);
      }
      for (const [name, content] of Object.entries(files)) {
        await php.writeFile(name, content);
      }
      const exit = await php.run(`<?php
        $respond = function () {
          vrzno_shared('respond')(json_encode([http_response_code() ?: 200, headers_list()]));
        };
        header_register_callback($respond);
        chdir('/app');
        require vrzno_shared('script');
        $respond();
      `);
      if (exit !== 0 || !metadata) throw new Error(`PHP execution failed: ${exit}`);
      const headers = new Headers({ 'Content-Type': 'text/html; charset=utf-8', 'Cache-Control': 'no-store' });
      for (const header of metadata[1]) {
        const colon = header.indexOf(':');
        if (colon > 0) headers.set(header.slice(0, colon), header.slice(colon + 1).trim());
      }
      return new Response(request.method === 'HEAD' ? null : output, { status: metadata[0], headers });
    } catch (error) {
      console.error(error);
      return new Response('Internal Server Error', { status: 500 });
    } finally {
      phpBusy = false;
    }
  },
};
