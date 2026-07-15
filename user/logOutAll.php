<?php
require __DIR__ . '/archived.php';
include "auth.php"; // 引入封装好的验证逻辑文件

$loginName = $_POST["username"];
$loginKey = $_POST["token"];

if (empty($loginName) || empty($loginKey)) {
    echo json_encode(["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
    exit;
}

function onSuccess($loginInfo) {
    $server = dbc();
    $newToken = generateUUID(); // 生成新的 UUID 作为新的登录令牌
    $st = "update user_users set loginToken = :lT where id = :lN";
    $ps = $server->prepare($st);
    $ps->bindParam(":lT", $newToken);
    $ps->bindParam(":lN", $loginInfo['id']);
    $ps->execute();
    echo json_encode(["msg" => "Success / 操作成功", "code" => 0, "newToken" => $newToken]);
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