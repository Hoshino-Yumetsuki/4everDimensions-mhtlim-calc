<?php
function authenticate($loginName, $loginKey, $afterSuccess, $afterFailed) {
    $loginName = trim($loginName);
    $loginKey = trim($loginKey);

    if (empty($loginName) || empty($loginKey)) {
        call_user_func($afterFailed, ["msg" => "Empty username or token is not allowed / 用户名或令牌不能为空", "code" => -1]);
        return;
    }
    // a过长
    if (strlen($loginName) > 48 || strlen($loginKey) > 48) {
        call_user_func($afterFailed, ["msg" => "Username or token is too long / 用户名或令牌过长", "code" => 403]);
        return;
    }

    include "../fc.php";
    $server = dbc();
    $st = "select * from user_users where loginName = :lN";
    $ps = $server->prepare($st);
    $ps->bindParam(":lN", $loginName);
    $ps->execute();
    $loginInfo = $ps->fetch(PDO::FETCH_ASSOC);

    if (empty($loginInfo)) {
        call_user_func($afterFailed, ["msg" => "User not found / 用户不存在", "code" => -3]);
        return;
    }

    if ($loginKey == $loginInfo["loginToken"]) {
        call_user_func($afterSuccess, $loginInfo);
    } else {
        call_user_func($afterFailed, ["msg" => "Key is incorrect, re-login and try again / 校验错误，请重新登录后重试", "code" => -4]);
    }
}
?>