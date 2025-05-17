<?php
function generateUUID() {
    $bytes = random_bytes(16);
    $uuid = bin2hex($bytes);
    return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
}
$loginName = $_POST["username"];
$loginKey  = $_POST["token"];
$id = $_POST["id"];

$loginName = trim($loginName);
$loginKey = trim($loginKey);

if (empty($loginName) || empty($loginKey) || empty($id)) {
    echo json_encode(["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
    exit;
}
$id = htmlspecialchars($id);

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
    // echo json_encode(["msg" => "Success / 会话有效", "code" => 0]);
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
    
} else {
    echo json_encode(["msg" => "Key is incorrect, re-login and try again / 校验错误，请重新登录后重试", "code" => -4]);
}



?>