<?php
include "auth.php";

$loginName = $_POST["username"];
$loginKey = $_POST["token"];
$id = $_POST["id"];

function onSuccess($loginInfo) {
    global $id;
    $server = dbc();
    $st = "select selfid,content from user_saves where owner = :lN and selfid = :lS limit 1";
    $ps = $server->prepare($st);
    $ps->bindParam(":lS", htmlspecialchars($id));
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