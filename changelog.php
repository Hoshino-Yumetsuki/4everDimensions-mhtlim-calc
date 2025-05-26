<?php
echo "最后更新信息：\n\n";
exec("git log -1 --stat", $output);
foreach ($output as $line) {
    if (strpos($line, 'bitbucket.org') === false) {
        echo $line . "\n";
    }
}

?>