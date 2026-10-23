<?php
echo "\n最新提交：\n\n";
$output = file(__DIR__ . '/changelog.txt', FILE_IGNORE_NEW_LINES);
foreach ($output as $line) {
    if (strpos($line, 'bitbucket.org') === false) {
        echo $line . "\n";
    }
}
echo "\n本站已处于归档状态，登录及云存档功能不可用，请访问 https://renya.mhtlim.top/\n";