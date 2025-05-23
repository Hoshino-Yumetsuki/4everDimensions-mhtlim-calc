<?php
include "auth.php"; // 引入封装好的验证逻辑文件

$loginName = $_POST["username"];
$loginKey = $_POST["token"];

if (empty($loginName) || empty($loginKey)) {
    echo json_encode(["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
    exit;
}

function onSuccess($loginInfo) {
    echo json_encode(["msg" => "Success / 会话有效", "code" => 0, "nickname" => $loginInfo["nickName"]]);
}

function onFailure($error) {
    echo json_encode($error);
}

authenticate($loginName, $loginKey, 'onSuccess', 'onFailure');
?>