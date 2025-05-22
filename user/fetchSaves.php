<?php
// function generateUUID() {
//     $bytes = random_bytes(16);
//     $uuid = bin2hex($bytes);
//     return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
// }
// $loginName = $_POST["username"];
// $loginKey  = $_POST["token"];
// $from = $_POST["from"];
// $from = trim($from);
// $to = $_POST["to"];
// $to = trim($to);
// $from = intval($from);
// $to = intval($to);
// if ($from < 0 || $to < 0) {
//     echo json_encode(["msg" => "Invalid range / 无效范围", "code" => -7]);
//     exit;
// }

// $loginName = trim($loginName);
// $loginKey = trim($loginKey);

// if (empty($loginName) || empty($loginKey)) {
//     echo json_encode(["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
//     exit;
// }


// include "../fc.php";
// $server = dbc();
// $st = "select * from user_users where loginName = :lN";
// $ps = $server->prepare($st);
// $ps->bindParam(":lN", $loginName);
// $ps->execute();
// $loginInfo = $ps->fetch(PDO::FETCH_ASSOC);
// if (empty($loginInfo)) {
//     echo json_encode(["msg" => "User not found / 用户不存在", "code" => -3]);
//     exit;
// }
// if (($loginKey == $loginInfo["loginToken"])) {
//     // echo json_encode(["msg" => "Success / 会话有效", "code" => 0]);
//     $st = "select selfid,title,description,datetime,score from user_saves where owner = :lN ORDER BY datetime desc limit :f, :t";
//     $ps = $server->prepare($st);
//     $ps->bindParam(":lN", $loginInfo['id']);
//     $ps->bindParam(":f", $from,PDO::PARAM_INT);
//     $ps->bindParam(":t", $to,PDO::PARAM_INT);
//     $ps->execute();
//     $ps2 = "select count(uid) from user_saves where owner = :lN";
//     $ps2 = $server->prepare($ps2);
//     $ps2->bindParam(":lN", $loginInfo['id']);
//     $ps2->execute();
//     $count = $ps2->fetch(PDO::FETCH_NUM)[0];
//     $saves = $ps->fetchAll(PDO::FETCH_ASSOC);
//     // $ps->debugDumpParams();
//     echo json_encode(["msg" => "Success / 获取成功", "code" => 0, "data" => $saves, "count" => $count]);
// } else {
//     echo json_encode(["msg" => "Key is incorrect, re-login and try again / 校验错误，请重新登录后重试", "code" => -4]);
// }



?>
<?php
include "auth.php";

$loginName = $_POST["username"];
$loginKey = $_POST["token"];
$from = $_POST["from"];
$to = $_POST["to"];

$from = trim($from);
$to = trim($to);
$from = intval($from);
$to = intval($to);

if ($from < 0 || $to < 0) {
    echo json_encode(["msg" => "Invalid range / 无效范围", "code" => -7]);
    exit;
}

function onSuccess($loginInfo) {
    global $from, $to;
    $server = dbc();
    $st = "select selfid,title,description,datetime,score from user_saves where owner = :lN ORDER BY datetime desc limit :f, :t";
    $ps = $server->prepare($st);
    $ps->bindParam(":lN", $loginInfo['id']);
    $ps->bindParam(":f", $from, PDO::PARAM_INT);
    $ps->bindParam(":t", $to, PDO::PARAM_INT);
    $ps->execute();
    $ps2 = "select count(uid) from user_saves where owner = :lN";
    $ps2 = $server->prepare($ps2);
    $ps2->bindParam(":lN", $loginInfo['id']);
    $ps2->execute();
    $count = $ps2->fetch(PDO::FETCH_NUM)[0];
    $saves = $ps->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["msg" => "Success / 获取成功", "code" => 0, "data" => $saves, "count" => $count]);
}

function onFailure($error) {
    echo json_encode($error);
}

authenticate($loginName, $loginKey, 'onSuccess', 'onFailure');
?>