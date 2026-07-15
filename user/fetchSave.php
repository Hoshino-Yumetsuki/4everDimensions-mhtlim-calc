<?php
require __DIR__ . '/archived.php';
include "auth.php";

$loginName = $_POST["username"];
$loginKey = $_POST["token"];
$id = $_POST["id"];
//if empty
if (empty($loginName) || empty($loginKey) || empty($id)) {
    echo json_encode(["msg" => "Invalid request / 请求无效", "code" => -1]);
    exit();
}
//if all to long > 48, ret 403
if (strlen($loginName) > 48 || strlen($loginKey) > 48 || strlen($id) > 48) {
    echo json_encode(["msg" => "Invalid request / 请求无效", "code" => 403]);
    exit();
}
function onSuccess($loginInfo) {
    global $id;
    $server = dbc();
    $st = "select selfid,content from user_saves where owner = :lN and selfid = :lS limit 1";
    $ps = $server->prepare($st);
    $ps->bindParam(":lS", ($id));
    $ps->bindParam(":lN", $loginInfo['id']);
    $ps->execute();
    $saves = $ps->fetchAll(PDO::FETCH_ASSOC);
    if (empty($saves)) {
        echo json_encode(["msg" => "No such save / 没有这个存档", "code" => -2]);
    } else {
        echo json_encode(["msg" => "Success / 获取成功", "code" => 0, "data" => $saves]);
    }
}

function onFailure($error) {
    echo json_encode($error);
}

authenticate($loginName, $loginKey, 'onSuccess', 'onFailure');
?>