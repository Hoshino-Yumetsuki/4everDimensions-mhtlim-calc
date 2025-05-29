<?php
include "fc.php";
$s=dbc();
$r=$s->prepare("select * from site_info where name = 'changelogNotice' limit 1");
$r->execute();
$r=$r->fetch(PDO::FETCH_ASSOC);
if(!empty($r['value'])){
    echo $r['value'];
}
echo "\n最后更新信息：\n\n";
exec("git log -1 --stat", $output);
foreach ($output as $line) {
    if (strpos($line, 'bitbucket.org') === false) {
        echo $line . "\n";
    }
}

?>