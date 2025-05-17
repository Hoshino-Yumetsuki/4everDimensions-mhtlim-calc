<?php
function generateUUID() {
    $bytes = random_bytes(16);
    $uuid = bin2hex($bytes);
    return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
}
$loginName = $_POST["username"];
$loginPass  = $_POST["token"];
$save = $_POST["data"];
$title = $_POST["title"];
$score = $_POST["score"];
$description = $_POST["description"];

$loginName = trim($loginName);
$loginPass = trim($loginPass);

if (strlen($save) > 15000000){
    echo json_encode(["msg" => "Save is too large / 保存内容过大", "code" => -114]);
    exit;
}

if (empty($loginName) || empty($loginPass) || empty($save) || empty($title) || empty($score) || empty($description)){
    echo json_encode(["msg" => "Empty is not allowed / 任何内容都不能为空", "code" => -1]);
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
if (($loginPass == $loginInfo["loginToken"])) {
    // echo json_encode(["msg" => "Logged in / 登录成功", "code" => 0, "data" => ["nickName" => $loginInfo['nickName'], "username" => 
    // $loginInfo['loginName'], "status" => $loginInfo['status']], "token" => $loginInfo['loginToken']]);
    $uid = generateUUID();
    $suid = generateUUID();
    $datetime = date("Y-m-d H:i:s");
    $st = "insert into user_saves (uid, selfid, title, score, description, content, owner, datetime) values (:uid, :suid, :title, :score, :description, :save, :user_id, :time)";
    $ps = $server->prepare($st);
    $ps->bindParam(":uid", $uid);
    $ps->bindParam(":suid", $suid);
    $ps->bindParam(":title", htmlspecialchars($title));
    $ps->bindParam(":score", htmlspecialchars($score));
    $ps->bindParam(":description", htmlspecialchars($description));
    $ps->bindParam(":save", htmlspecialchars($save));
    $ps->bindParam(":user_id", $loginInfo['id']);
    $ps->bindParam(":time", $datetime);
    $ps->execute();

    echo json_encode(["msg" => "Saved / 保存成功", "code" => 0]);
} else {
    echo json_encode(["msg" => "Token is invalid, please re-login / 令牌错误，请重新登录", "code" => -4]);
}



?>