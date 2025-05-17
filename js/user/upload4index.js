function goLogin() {
    var loginUI = document.getElementById("loginModal");
        var o2l = document.getElementById("over2lay");
        var x2l = document.getElementById("loginPanel-t");
        x2l.style.display = "none";
        loginUI.style.display = "block";
        o2l.style.display = "block";
}
function doSavesUpload() {
    if (!isLogged()) {
        goLogin();
        return;
    } else {
        showUploadPanel();
    }
}
function showUploadPanel() {
    var pn = document.getElementById("uploadModal");
    var o2l = document.getElementById("over3lay");
    pn.style.display = "block";
    o2l.style.display = "block";
}
function closeUploadPanel() {
    var pn = document.getElementById("uploadModal");
    var o2l = document.getElementById("over3lay");
    pn.style.display = "none";
    o2l.style.display = "none";
}
function logout() {
    localStorage.removeItem("username");
    localStorage.removeItem("token");
    localStorage.removeItem("nickname");
}
function logoutAll() {
    var username = getStorage("username");
    var token = getStorage("token");
    try {
        fetch("user/logOutAll.php", {
            method: "POST",
            body: new URLSearchParams({
                username: username,
                token: token
            })
        }).then(res => res.json()).then(data => {
            layer.msg(data.msg);
            if (data.code === 0) {
                logout();
                initLogging();
            }
        });
    } catch (e) {
        layer.msg("发生错误。");
        console.log(e);
    }

}
function closeLogin() {
    var loginUI = document.getElementById("loginModal");
    var o2l = document.getElementById("over2lay");
    loginUI.style.display = "none";
    o2l.style.display = "none";
}
function isLogged() { return isStorageExist("username") & isStorageExist("token") & isStorageExist("nickname"); }
function isStorageExist(name) {
    if (localStorage.getItem(name) !== null & localStorage.getItem(name) !== 'undefined') {
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
function initLogging() {
    //init
    var userInfoDraw = document.getElementById("logInfo");
    if (isLogged()) {
        userInfoDraw.innerHTML = "欢迎，" + getStorage("nickname") + "！<a href='javascript:void(0);' style='color:lightblue;text-decoration:none;' onclick='javascript:logout();initLogging();'>登出</a> / " +
            "<a style='color:lightblue;text-decoration:none;' href='javascript:void(0);' onclick='javascript:logoutAll();'>在所有设备上登出</a>";
    } else {
        userInfoDraw.innerHTML = "未登陆 / Not logged in. <a href='javascript:void(0);' style='color:lightblue;text-decoration:none;' onclick='javascript:logout();goLogin();'>登录</a>";
        localStorage.removeItem("username");
        localStorage.removeItem("token");
        localStorage.removeItem("nickname");
    }
}

//on page load
window.onload = function () {
    //check login
    if (isLogged()) {
        try {
            fetch("user/check.php", {
                method: "POST",
                body: new URLSearchParams({
                    username: getStorage("username"),
                    token: getStorage("token")
                })
            }).then(res => res.json()).then(data => {
                if (data.code === 0) {
                    initLogging();
                } else {
                    logout();
                    initLogging();
                    layer.msg("登录已过期，请重新登录。");

                }
            })
        } catch (e) {
            layer.msg("登陆校验发生错误。");
            console.log("登陆校验发生错误。", e);
        }
    }else{
        initLogging();
    }

}