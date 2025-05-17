<?php
function generateUUID() {
    $bytes = random_bytes(16);
    $uuid = bin2hex($bytes);
    return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
}
$loginName = $_POST["username"];
$password  = $_POST["password"];

if (strlen($loginName) > 48) {
    echo json_encode(["msg" => "Username too long / 用户名过长", "code" => -22]);
    exit;
}
if (strlen($password) > 128) {
    echo json_encode(["msg" => "Password too long / 密码过长", "code" => -23]);
    exit;
}
if (strlen($password) < 8) {
    echo json_encode(["msg" => "Password too short / 密码过短", "code" => -24]);
    exit;
}
if (strlen($loginName) < 6) {
    echo json_encode(["msg" => "Username too short / 用户名过短", "code" => -25]);
    exit;
}

$loginName = (trim($loginName));
$password = (trim($password));

if (empty($loginName) || empty($password)) {
    echo json_encode(["msg" => "Empty username or password is not allowed / 用户名或密码不能为空", "code" => -1]);
    exit;
}

$ip="";
if (isset($_SERVER['HTTP_X_REAL_IP'])) {
    $ip = "O:" . $_SERVER['REMOTE_ADDR'] . ' X:' . $_SERVER['HTTP_X_REAL_IP'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
include "../fc.php";
$server = dbc();
$st = "select * from user_users where loginName = :lN";
$ps = $server->prepare($st);
$ps->bindParam(":lN", $loginName);
$ps->execute();
$loginInfo = $ps->fetch(PDO::FETCH_ASSOC);
if (empty($loginInfo)) {
    $uuid = generateUUID();
    $st = "insert into user_users (id, regDate, password, nickName, status, loginName,loginToken,regIP) values (:id, :rD, :pW, :nN, 'NORMAL', :lN, :u, :i)";
    $ps = $server->prepare($st);
    $ps->bindParam(":id", generateUUID());
    $ps->bindParam(":rD", date("Y-m-d H:i:s"));
    $ps->bindParam(":pW", password_hash($password, PASSWORD_DEFAULT));
    $ps->bindParam(":nN", $loginName);
    $ps->bindParam(":lN", $loginName);
    $ps->bindParam(":u", $uuid);
    $ps->bindParam(":i", $ip);
    $ps->execute();
    echo json_encode(["msg" => "Registration successful / 注册成功", "code" => 0, "token"=>$uuid,"username"=>$loginName, "nickname"=>$loginName]);
    exit;
}else{
    echo json_encode(["msg" => "Username already exists / 用户名已存在", "code" => -9]);
    exit;
}




?>