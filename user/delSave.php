<?php
require __DIR__ . '/archived.php';
include "auth.php"; // 引入封装好的验证逻辑文件

$loginName = $_POST["username"];
$loginKey = $_POST["token"];
$id = $_POST["id"];

if (empty($loginName) || empty($loginKey) || empty($id)) {
    echo json_encode(["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
    exit;
}
//if all too long > 48, ret 403
if (strlen($loginName) > 48 || strlen($loginKey) > 48 || strlen($id) > 48) {
    echo json_encode(["msg" => "Too long / 长度过长", "code" => -3]);
    exit;
}
$id = htmlspecialchars($id);

function onSuccess($loginInfo) {
    global $id;
    $server = dbc();
    $st = "delete from user_saves where owner = :lN and selfid = :lS limit 1";
    $ps = $server->prepare($st);
    $ps->bindParam(":lS", $id);
    $ps->bindParam(":lN", $loginInfo['id']);
    $ps->execute();
    if (($ps->rowCount() == 0)) {
        echo json_encode(["msg" => "No such save / 没有这个存档", "code" => -2]);
    } else {
        echo json_encode(["msg" => "Deleted / 删除成功", "code" => 0]);
    }
}

function onFailure($error) {
    echo json_encode($error);
}

authenticate($loginName, $loginKey, 'onSuccess', 'onFailure');
?>