<?php
echo "\n最新提交：\n\n";
exec("git log -1 --stat", $output);
foreach ($output as $line) {
    if (strpos($line, 'bitbucket.org') === false) {
        echo $line . "\n";
    }
}
echo "\n本站已处于归档状态，登录及云存档功能不可用，请访问 https://renya.mhtlim.top/\n";