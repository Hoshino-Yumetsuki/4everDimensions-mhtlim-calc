function doSavesUpload() {
    if (!isLogged()) {
        var loginUI = document.getElementById("loginModal");
        var o2l = document.getElementById("over2lay");
        var x2l = document.getElementById("loginPanel-t");
        x2l.style.display = "none";
        loginUI.style.display = "block";
        o2l.style.display = "block";
        return;
    }else{
        layer.msg("此功能还未完善，请等待后续更新。")
    }
}
function logout() {
    localStorage.removeItem("username");
    localStorage.removeItem("token");
    localStorage.removeItem("nickname");
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
        userInfoDraw.innerHTML = "欢迎，" + getStorage("nickname") + "！<a onclick='javascript:logout();initLogging();'>登出</a>";
    } else {
        userInfoDraw.innerHTML = "未登陆 / Not logged in.";
        localStorage.removeItem("username");
        localStorage.removeItem("token");
        localStorage.removeItem("nickname");
    }
}
initLogging();