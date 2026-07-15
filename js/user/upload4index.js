var upload4index_js_ver = 3
var MHTLIM_ARCHIVE_MSG = (typeof window.MHTLIM_ARCHIVE_MESSAGE === 'string')
    ? window.MHTLIM_ARCHIVE_MESSAGE
    : '本站已处于归档状态，登录及云存档功能不可用，请访问 https://renya.mhtlim.top/';

function mhtlimArchiveBlocked() {
    if (typeof layer !== 'undefined') {
        layer.alert(MHTLIM_ARCHIVE_MSG, { title: '归档提示' });
    } else {
        alert(MHTLIM_ARCHIVE_MSG);
    }
    return true;
}

function goLogin() {
    mhtlimArchiveBlocked();
}
function doSavesUpload() {
    mhtlimArchiveBlocked();
    return;
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
function logout_Btn(){
    layer.confirm('确定登出？', {
        btn: ['确定', '取消'] //按钮
    }, function (i) {
        logout();
        initLogging();
        layer.close(i);
        layer.msg("登出成功。");
    })
}
function logoutAll_impl() {

    var loading= layer.load(1);
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
                closeUserPanel();
            }
            layer.close(loading);
        });
    } catch (e) {
        layer.msg("发生错误。");
        console.log(e);
        layer.close(loading);
    }

}
function logoutAll() {
    layer.confirm('确定在所有设备上登出？', {
        btn: ['确定', '取消'] //按钮
    }, function () {
        logoutAll_impl();
    });
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
    var userInfoDraw = document.getElementById("logInfo");
    if (userInfoDraw) {
        userInfoDraw.innerHTML = '本站已归档，登录与云存档已关闭。<a href="https://renya.mhtlim.top/" target="_blank" rel="noopener" class="superlinkR">前往新站</a>';
    }
    localStorage.removeItem("username");
    localStorage.removeItem("token");
    localStorage.removeItem("nickname");
}
function checkLogin(alertNoSecret) {
    initLogging();
    return false;
}

//on page load
window.onload = function () {
    //check login
    checkLogin(true);
}

function loadUserPanel(){
    mhtlimArchiveBlocked();
}
function openUserPanel(){
    document.getElementById("over5lay").style.display = "block";
    document.getElementById("userModal").style.display = "block";
}
function closeUserPanel(){
    document.getElementById("over5lay").style.display = "none";
    document.getElementById("userModal").style.display = "none";
}

function upload4index_debug(){
    document.getElementById("debug_upload4index_js").innerHTML = "upload4index.js is running.";
}