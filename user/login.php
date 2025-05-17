<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="title">MilthmCalc - Login</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="../new_UI.css">
    <link href="..//layui/css/layui.css" rel="stylesheet">
    <style>
        body{
            background:rgb(25, 26, 56) !important;
        }
    </style>
</head>

<body>
    <script src="../layui/layui.js"></script>
    <div class="layui-header header-opa">
        <div class="layui-logo header-opa-bg2" style="padding: 16px;">
            <div class="header-opa-content">
                <h1 style="color:turquoise;">
                    <div>MilthmCalc <span style="font-size: medium;color:gold;">Login</span></div>
                </h1>

            </div>
        </div>
    </div>

    <div style="padding: 30px; text-align:center;display:flex;">
        <div class="" style="text-align: left;max-width:1200px;margin:auto;">
            <div class="layui-card rccc" id="successContainer" style="background-color:rgba(49, 92, 9, 0.55) !important;display:none;">
                <div class="layui-card-header">
                    <h2>Prompt / 提示</h2>
                </div>
                <div class="layui-card-body">
                    <h3 id="success">(text)</h3>
                </div>
            </div>
            <div class="layui-card rccc" id="failContainer" style="background-color:rgba(92, 34, 9, 0.55) !important;display:none;">
                <div class="layui-card-header">
                    <h2>Prompt / 提示</h2>
                </div>
                <div class="layui-card-body">
                    <h3 id="fail">(text)</h3>
                </div>
            </div>
            <div class="layui-card rccc" id="pr">
                <div class="layui-card-header">
                    <h2>Authencation (身份验证)</h2>
                </div>
                <div class="layui-card-body">
                    <h1>Login / 登录：</h1><br>
                    <h3>Username / 用户名：</h3>
                    <input type="text" class="layui-input inputR" id="login_username" />
                    <h3>Password / 密码：</h3>
                    <input type="password" class="layui-input inputR" id="login_password" />
                    <br>
                    <button class="layui-btn layui-btn-normal" id="login_btn">Login / 登录</button>
                    <hr>或
                    <hr>
                    <h1>Register / 注册：</h1><br>
                    <h3>Login Username / 登陆用户名：</h3>
                    <input type="text" class="layui-input inputR" id="reg_username" />
                    <h3>Nickname / 昵称：</h3>
                    <input type="text" class="layui-input inputR" id="reg_nick" />
                    <h3>Password / 密码：</h3>
                    <input type="password" class="layui-input inputR" id="reg_password" />
                    <h3>Retype Password / 重复密码：</h3>
                    <input type="password" class="layui-input inputR" id="reg_repassword" />
                    <br>
                    <button class="layui-btn layui-btn-normal" id="reg_btn">Register / 注册</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function isStorageExist(name) {
            if (localStorage.getItem(name) !== null) {
                return true;
            } else {
                return false;
            }
        }

        function getStorage(name) {
            return localStorage.getItem(name);
        }

        function setStorage(name, value) {
            localStorage.setItem(name, value);
        }
        var pr = document.getElementById("pr");
        var login_username = document.getElementById("login_username");
        var login_password = document.getElementById("login_password");
        var login_btn = document.getElementById("login_btn");
        var reg_username = document.getElementById("reg_username");
        var reg_nick = document.getElementById("reg_nick");
        var reg_password = document.getElementById("reg_password");
        var reg_repassword = document.getElementById("reg_repassword");
        var reg_btn = document.getElementById("reg_btn");

        login_btn.onclick = function() {
            var username = login_username.value;
            var password = login_password.value;
            if (username == "" || password == "") {
                layer.msg("Please enter username and password / 请输入用户名和密码");
            } else {
                var loading = layer.load(1)
                try {
                    fetch("requestLogin.php", {
                        method: "POST",
                        body: new URLSearchParams({
                            username: username,
                            password: password
                        })
                    }).then(response => response.json()).then(data => {
                        layer.msg(data.msg);
                        if (data.code !== 0) {
                            return;
                        } else {
                            setStorage("username", data.data.username);
                            setStorage("nickname", data.data.nickName);
                            setStorage("token", data.token);
                            pr.style.display = "none";
                            document.getElementById("success").innerHTML = "<h2>Login successful / 登录成功<br>Please refresh page manually / 请手动刷新页面</h2>";
                            document.getElementById("successContainer").style.display = "block";
                            return;
                        }
                    })
                } catch (e) {
                    layer.msg("An error occurred / 发生错误");
                } finally {
                    layer.close(loading);
                }
            }
        }
    </script>
</body>

</html>