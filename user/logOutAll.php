<?php
function generateUUID() {
    $bytes = random_bytes(16);
    $uuid = bin2hex($bytes);
    return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
}
$loginName = $_POST["username"];
$loginKey  = $_POST["token"];

$loginName = trim($loginName);
$loginKey = trim($loginKey);

if (empty($loginName) || empty($loginKey)) {
    echo json_encode(["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
    exit;
}


include "../fc.php";
$server = dbc();
$st = "select * from user_users where loginName = :lN";
$ps = $server->prepare($st);
$ps->bindParam(":lN", $loginName);
$ps->execute();
$loginInfo = $ps->fetch(PDO::FETCH_ASSOC);
if (empty($loginInfo)) {
    echo json_encode(["msg" => "User not found / 用户不存在", "code" => -3]);
    exit;
}
if (($loginKey == $loginInfo["loginToken"])) {
    $st = "update user_users set loginToken = :lT where loginName = :lN";
    $ps = $server->prepare($st);
    $ps->bindParam(":lT", generateUUID());
    $ps->bindParam(":lN", $loginName);
    $ps->execute();
    echo json_encode(["msg" => "Success / 操作成功", "code" => 0]);
} else {
    echo json_encode(["msg" => "Key is incorrect, re-login and try again / 校验错误，请重新登录后重试", "code" => -4]);
}



?>