<?php
function generateUUID() {
    $bytes = random_bytes(16);
    $uuid = bin2hex($bytes);
    return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
}
$loginName = $_POST["username"];
$loginPass  = $_POST["password"];

$loginName = trim($loginName);
$loginPass = trim($loginPass);

if (empty($loginName) || empty($loginPass)) {
    echo json_encode(["msg" => "用户名或密码不能为空", "code" => -1]);
    exit;
}
if($loginName == "admin" && $loginPass == "admin"){
    echo json_encode(["msg" => "未知错误", "code" => -2]);
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
if (password_verify($loginPass, $loginInfo["password"])) {
    echo json_encode(["msg" => "验证成功", "code" => 0, "data" => ["nickName" => $loginInfo['nickName'], "username" => 
    $loginInfo['loginName'], "status" => $loginInfo['status']], "token" => $loginInfo['loginToken']]);
} else {
    echo json_encode(["msg" => "密码错误", "code" => -4]);
}



?>