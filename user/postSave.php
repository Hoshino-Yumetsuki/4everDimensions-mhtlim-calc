<?php
include "auth.php"; // 引入封装好的验证逻辑文件

$loginName = $_POST["username"];
$loginPass = $_POST["token"];
$save = $_POST["data"];
$title = $_POST["title"];
$score = $_POST["score"];
$description = $_POST["description"];

if (strlen($save) > 15000000) {
    echo json_encode(["msg" => "Save is too large / 保存内容过大", "code" => -114]);
    exit;
}
if (strlen($title) > 1024) {
    echo json_encode(["msg" => "Title is too long / 标题过长", "code" => -115]);
    exit;
}

if (strlen($description) > 131072) {
    echo json_encode(["msg" => "Description is too long / 描述过长", "code" => -116]);
    exit;
}

if (strlen($score) > 1024) {
    echo json_encode(["msg" => "Score is too long / Score字段过长", "code" => -117]);
    exit;
}

if (empty($loginName) || empty($loginPass) || empty($save) || empty($title) || empty($score) || empty($description)) {
    echo json_encode(["msg" => "Empty is not allowed / 任何内容都不能为空", "code" => -1]);
    exit;
}

function onSuccess($loginInfo) {
    global $title,$score,$description,$save;
    $server = dbc();
    $uuid = generateUUID();
    $selfid = generateUUID();
    $datetime = date("Y-m-d H:i:s");
    $st = "insert into user_saves (uid, selfid, title, score, description, content, owner, datetime) values (:uid, :suid, :title, :score, :description, :save, :user_id, :time)";
    $ps = $server->prepare($st);
    $ps->bindParam(":uid", $uuid);
    $ps->bindParam(":suid", $selfid);
    $ps->bindParam(":title", htmlspecialchars($title));
    $ps->bindParam(":score", htmlspecialchars($score));
    $ps->bindParam(":description", htmlspecialchars($description));
    $ps->bindParam(":save", htmlspecialchars($save));
    $ps->bindParam(":user_id", $loginInfo['id']);
    $ps->bindParam(":time", $datetime);
    $ps->execute();

    echo json_encode(["msg" => "Saved / 保存成功", "code" => 0]);
}

function onFailure($error) {
    echo json_encode($error);
}

authenticate($loginName, $loginPass, 'onSuccess', 'onFailure');

// UUID 生成函数
function generateUUID() {
    $bytes = random_bytes(16);
    $uuid = bin2hex($bytes);
    return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
}
?>