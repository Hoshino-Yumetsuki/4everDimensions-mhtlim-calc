import { execFileSync } from 'node:child_process';
import { cp, mkdir, readdir, readFile, rm, writeFile } from 'node:fs/promises';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const root = fileURLToPath(new URL('../', import.meta.url));
const assets = path.join(root, 'dist/assets');
const publicDirectories = ['files', 'js', 'layui', 'resources', 'RubbishBin', 'static', 'story', 'usage', 'wiki', 'wtf'];
const publicFiles = [
  'authors.txt', 'favicon.ico', 'importantNotice.txt', 'lang.json', 'licenseAndPrivacy.txt',
  'new_UI.css', 'new_ui.js', 'pic.js', 'prefedit.html', 'robots.txt', 'sitemap.xml',
  'table.html', 'tips.txt', 'tips_html.txt', 'up.txt', 'version.txt',
];

await rm(assets, { recursive: true, force: true });
await mkdir(assets, { recursive: true });
for (const name of [...publicDirectories, ...publicFiles]) {
  await cp(path.join(root, name), path.join(assets, name), {
    recursive: true,
    filter: source => !path.relative(root, source).split(path.sep).some(part => part.startsWith('.'))
      && !/\.(php|py|map)$/i.test(source)
      && !source.includes(`${path.sep}new_picture_origin_files`),
  });
}

const files = {};
for (const directory of ['', 'user', 'includes', 'wtf']) {
  for (const entry of await readdir(path.join(root, directory), { recursive: directory !== '', withFileTypes: true })) {
    if (!entry.isFile() || !entry.name.endsWith('.php')) continue;
    const source = path.join(entry.parentPath, entry.name);
    const name = path.relative(root, source).split(path.sep).join('/');
    files[`/app/${name}`] = await readFile(source, 'utf8');
  }
}
for (const name of ['version.txt', 'importantNotice.txt']) {
  files[`/app/${name}`] = await readFile(path.join(root, name), 'utf8');
}
files['/app/changelog.txt'] = execFileSync('git', ['log', '-1', '--stat'], { cwd: root, encoding: 'utf8' });
await writeFile(path.join(root, 'changelog.txt'), files['/app/changelog.txt']);
await writeFile(path.join(root, 'dist/php-files.json'), JSON.stringify(files));
console.log('Built Workers assets and PHP files.');
