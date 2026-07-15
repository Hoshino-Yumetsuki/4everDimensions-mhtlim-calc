<?php
require __DIR__ . '/archived.php';

$saveid = $_GET["id"];
if (strlen($saveid) > 48) {
    echo json_encode(["msg" => "id过大", "code" => -114]);
    exit;
}
include "../fc.php";
$server = dbc();
$st = "select id,code,url from quick_fetch where code = :lN limit 1";
$ps = $server->prepare($st);
$ps->bindParam(":lN", ($saveid));
$ps->execute();
$saves = $ps->fetch(PDO::FETCH_ASSOC);
if (empty($saves)) {
    echo json_encode(["msg" => "No such save / 没有这个存档", "code" => -2]);
} else {
    echo json_encode(["msg" => "Success / 获取成功", "code" => 0, "data" => $saves["url"]]);
}