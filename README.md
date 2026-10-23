# 欢迎来到 Milthm 查分器 的史山代码库

本项目is under the WTFPL.

## 在线服务请转到 [mhtlim.top](https://mhtlim.top)

感谢所有的贡献者！

主要负责人：

    mkzi_nya
    不是xyn喵~

脚本：

    mkzi_nya
    不是xyn喵~

前端&后端&托管：

    不是xyn喵~

UI/查分图:

    不是xyn喵~
    xzadudu179

文档:

    mkzi_nya
    xyh5033
    不是xyn喵~
    纸喵柚nya
    "火猫"

其他:
    Autumn
    libchara-dev
    Panyi

特别鸣谢：

    mkzi_nya(归梦)
    不是xyn喵~
    libchara-dev
    Autumn
    Panyi
    Eric_Lian
    xzadudu179
    xyh5033
    纸喵柚nya
    "火猫"

## Cloudflare Workers 部署

使用 `php-cloud-wasm` 在 Workers 中执行现有 PHP，静态资源通过 Workers Assets 提供；登录、云存档和统计保持归档状态。

需要 Node.js 22+、Yarn 4.18.1 和 Git；请从 Git 仓库构建，更新日志在构建时由 `git log -1 --stat` 生成。

```sh
yarn install --immutable
yarn dev
```

本地地址为 `http://localhost:8787`。`yarn dev` 会自动构建并监听源文件；单独生成部署资源使用 `yarn build`，产物位于 `dist/`。

```sh
yarn deploy --dry-run
yarn wrangler login
yarn deploy
```

- 首页和现有归档 PHP 接口由 `workers/index.js` 执行；其余请求交给静态资源绑定 `ASSETS`。
- 当前 PHP 实例初始内存为 64 MiB，同一 isolate 内只允许一个 PHP 请求执行；重叠请求返回 HTTP 503 和 `Retry-After: 1`，静态资源不受此锁影响。
- 保留 `no_nodejs_compat` 和 `no_nodejs_compat_v2`，避免 PHP-WASM 将 Workers 误识别为 Node.js。
