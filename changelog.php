<?php
include "fc.php";
$s=dbc();
echo "\n最新提交：\n\n";
exec("git log -1 --stat", $output);
foreach ($output as $line) {
    if (strpos($line, 'bitbucket.org') === false) {
        echo $line . "\n";
    }
}
$r=$s->prepare("select * from site_info where name = 'changelogNotice' limit 1");
$r->execute();
$r=$r->fetch(PDO::FETCH_ASSOC);
if(!empty($r['value'])){
    echo "\n".$r['value'];
}

?>