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
    echo json_encode(["msg" => "用户名或令牌不能为空", "code" => -1]);
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
    echo json_encode(["msg" => "用户不存在", "code" => -3]);
    exit;
}
if (($loginKey == $loginInfo["loginToken"])) {
    $st = "update user_users set loginToken = :lT where loginName = :lN";
    $ps = $server->prepare($st);
    $ps->bindParam(":lT", generateUUID());
    $ps->bindParam(":lN", $loginName);
    $ps->execute();
    echo json_encode(["msg" => "成功", "code" => 0]);
} else {
    echo json_encode(["msg" => "密码错误", "code" => -4]);
}



?>