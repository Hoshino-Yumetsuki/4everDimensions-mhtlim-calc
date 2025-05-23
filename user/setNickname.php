<?php
include "auth.php"; // 引入封装好的验证逻辑文件

$loginName = $_POST["username"];
$loginKey = $_POST["token"];
$sd = $_POST["nickname"];
if (empty($loginName) || empty($loginKey)) {
    echo json_encode(["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
    exit;
}
if(strlen($sd) > 60) {
    echo json_encode(["msg" => "Security description is too long / 过长", "code" => -13]);
    exit;
}
// echo json_encode(["msg" => "Success / 成功", "code" => 0, "authInfo" => $sd]);
function onSuccess($loginInfo) {
    global $sd;
    // echo json_encode(["msg" => "Success / 获取成功", "code" => 0, "authInfo" => $loginInfo['authInfo']]);
    $server = dbc();
    $sql = "UPDATE `user_users` SET `nickName` = :i WHERE id = :r";
    $stmt = $server->prepare($sql);
    $stmt->bindParam(":i", htmlspecialchars($sd));
    $stmt->bindParam(":r", $loginInfo['id']);
    $stmt->execute();
    echo json_encode(["msg" => "Success / 成功", "code" => 0]);
}

function onFailure($error) {
    echo json_encode($error);
}

authenticate($loginName, $loginKey, 'onSuccess', 'onFailure');
?>

<?php
// UUID 生成函数
function generateUUID() {
    $bytes = random_bytes(16);
    $uuid = bin2hex($bytes);
    return sprintf('%08s-%04s-%04s-%04s-%012s', substr($uuid, 0, 8), substr($uuid, 8, 4), substr($uuid, 12, 4), substr($uuid, 16, 4), substr($uuid, 20, 12));
}
?>