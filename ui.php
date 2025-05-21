<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="title">Milthm 查分器（原Reality计算器）</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="new_UI.css">
    <script src="js/constant.js"></script>
    <link href="./layui/css/layui.css" rel="stylesheet">
    <script>
        // function isdef
        function oiiaioooooiai(v) {
            try{
                return eval(v);
            }catch(e){
                return -1;
            }
        }
        var latest_versions = {
            "cha_newui.js":1,
            "new_ui.js":1,
            "upload4index.js":1
        }
        function checkVersions(){
            var ruOK = true;
            // cha newui.js
            if (oiiaioooooiai('cha_newui_js_ver') !== latest_versions["cha_newui.js"]){
                ruOK = false;
            }
            // new_ui.js
            if (oiiaioooooiai('new_ui_js_ver') !== latest_versions["new_ui.js"]){
                ruOK = false;
            }
            // upload4index.js
            if (oiiaioooooiai('upload4index_js_ver') !== latest_versions["upload4index.js"]){
                ruOK = false;
            }
            if(!ruOK){
                layer.open({
                    title: '版本异常',
                    content: 'JS文件版本过旧，请删除缓存并刷新页面',
                    btn: ['查看详情', '忽略并继续'],
                    yes: function(index, layero){
                        license_dialog = layer.open({
                            type: 1,
                            title: 'JS版本异常',
                            content: `<div style="padding: 20px; line-height: 22px; font-size: 16px; text-align: center;">
<h3>是什么导致了这个问题？</h3>
<p>简单地说，可能是因为本网站的js代码已经更新，但是你的浏览器仍然在使用旧版本的js缓存，导致版本和当前页面所需版本不匹配。这可能引起一些未知的问题。</p>
<br>
<h3>我要怎么做</h3>
<p>刷新你的浏览器缓存，电脑上可以尝试 Ctrl + Shift + R , Shift + F5 等快捷键，手机上可以尝试退出浏览器，长按浏览器点击应用信息，找到储存空间，点击清除缓存（注意不是清除数据！），然后重新打开即可。</p></div>`,
                            area: ['80vw', '80vh'],
                            shade: 0.6,
                            shadeClose: true
                        });
                    }
                })
            }

        }
    </script>
    <input type="file" id="fileupLoad" style="display:none;" />
    <style>
        #languageMenu {
            position: absolute;
            right: 0;
            top: 40px;
            display: none;
            background-color: #333;
            color: #eee;
            border: 1px solid #444;
            border-radius: 4px;
            padding: 5px;
            min-width: 100px;
            z-index: 9999
        }

        #languageMenu div {
            margin: 5px;
            cursor: pointer;
            padding: 3px 5px
        }

        #languageMenu div:hover {
            background-color: #444
        }

        .settingsModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            z-index: 10000;
            box-sizing: content-box !important;
            width: 300px;
        }

        .settingsModal h3 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .settingsModal input,
        .settingsModal button {
            margin-bottom: 15px;
            padding: 8px;
            width: 100%;
            background-color: #444;
            color: #fff;
            border: 1px solid #555;
            border-radius: 12px;
            font-size: 16px;
        }

        .settingsModal input {
            box-sizing: border-box !important;
            /* padding: 6px !important; */
        }

        .settingsModal input:focus,
        .settingsModal button:focus {
            outline: none;
            border-color: #888;
        }

        .settingsModal button {
            width: 48%;
            display: inline-block;
            cursor: pointer;
        }

        #overlay,
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.45);
            z-index: 9999;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            background-color: #000;
            /* 设置背景颜色为黑色 */
            overflow: auto;
        }

        .rain {
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .raindrop {
            position: absolute;
            top: -10px;
            width: 2px;
            height: 64px;
            background-color: rgb(126, 137, 207);
            border-radius: 1px;
            opacity: 0;
            animation: fall linear;
        }

        @keyframes fall {
            0% {
                transform: translateY(-20vh) scale(0.5);
                opacity: 0;
            }

            5% {
                opacity: 0.8;
            }

            50% {
                opacity: 0.6;
            }

            100% {
                transform: translateY(100vh) scale(1);
                opacity: 0;
            }
        }
    </style>
    <!-- Chunk: sql_wasm -->
    <script src="./js/sql-wasm.js"></script>
    <script>
        var rain_anim_length = 1.5;
        var rain_interval_ms = 50;
        var rain_interval;
        var rain_stop = false;
        var rain_stoped = false;
        var rain_update;
        document.addEventListener("DOMContentLoaded", function() {
            const rain = document.querySelector(".rain");

            function createRainDrop() {
                if(rain_stop){
                    clearInterval(rain_interval);
                    rain_stoped = true;
                    return;
                }
                const drop = document.createElement("div");
                drop.classList.add("raindrop");
                drop.style.left = Math.random() * window.innerWidth + "px";
                drop.style.animationDuration = 0.5 + Math.random() * rain_anim_length + "s"; // 随机动画时长
                rain.appendChild(drop);

                setTimeout(() => {
                    rain.removeChild(drop);
                }, 2000);
            }

            rain_interval = setInterval(createRainDrop, rain_interval_ms);
        });

        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('./js/sw.js')
                .then(reg => console.log("Service Worker 注册成功:", reg.scope))
                .catch(err => console.log("Service Worker 注册失败:", err));
        }
    </script>
    <script>
        function checkForUpdate() {
            if ('serviceWorker' in navigator && navigator.serviceWorker.controller) {
                navigator.serviceWorker.controller.postMessage("checkForUpdate");
            }
        }

        // 每次刷新时检查更新
        window.addEventListener("load", checkForUpdate);
    </script>
    <!-- End Chunk: sql_wasm -->
</head>

<body>
    <div class="rain"></div>
    <script src="./layui/layui.js"></script>
    <script src="./new_ui.js"></script>
    <div class="layui-header header-opa">
        <div class="layui-logo header-opa-bg2" style="padding: 16px;">
            <div class="header-opa-content">
                <h1 style="color:turquoise;">
                    <div>MilthmCalc <span style="font-size: medium;color:gold;">Pro</span><span style="font-size: small;color:lightgreen;">&nbsp;v<?php if (file_exists("version.txt")) {
                                                                                                                                                        echo file_get_contents("version.txt");
                                                                                                                                                    } else {
                                                                                                                                                        echo "_unknown";
                                                                                                                                                    } ?></span></div>
                </h1>

            </div>
        </div>
    </div>

    <div style="position:absolute;right:20px;top:20px;z-index:9999;">
        <button id="languageButton" style="background:transparent;border:none;cursor:pointer;font-size:20px;">🌐</button>
        <div id="languageMenu">
            <div id="langZh">简体中文</div>
            <div id="langZhTw">繁體中文</div>
            <div id="langEn">English</div>
            <div id="langJa">日本語</div>
            <div id="langKo">한국어</div>
            <div id="langRu">Русский</div>
            <div id="langEs">Español</div>
            <div id="langVi">Tiếng Việt</div>
        </div>
    </div>

    <div style="padding: 30px; text-align:center;display:flex;">
        <div class="" style="text-align: left;max-width:1200px;margin:auto;">
            <div class="layui-card rccc">
                <div class="layui-card-header">
                    温馨提示
                </div>
                <div class="layui-card-body">
                    使用则代表你确定：<br>我们不是 Milthm 官方，也与其无关。<br>我们会尽可能保护你的隐私，所有密码都是Hash储存。<br>但我们无法防范网络中间人窃听。请在安全的环境下使用本站。
                    <br>新地址：https://milthm.top
                </div>
            </div>
            <div class="layui-card rccc">
                <div class="layui-card-header">
                    <h2 data-i18n="welcome">Welcome</h2>
                </div>
                <div class="layui-card-body">
                    <p data-i18n="greeting">欢迎来到MilthmCalc！(Reality计算器) (https://milthm.top)</p>
                    <p data-i18n="description">这是一个用于计算Milthm Reality分数的网站，你可以在这里导入并解析存档。</p>
                    <hr>
                    <span data-i18n="usage">使用说明：</span><a href="./usage/usage.html" target="_blank"><span class="superlinkR" data-i18n="viewUsage">查看帮助信息</span></a>
                    <hr>
                    <span data-i18n="qqGroup">QQ交流群：</span><a href="https://qm.qq.com/q/Utb6sNDvki" target="_blank"><span class="superlinkR" data-i18n="viewQQGroup">Milthm#√-1洨巟羣</span></a>
                    <hr>
                    <div style="padding: 3px">
                        <span id="logInfo">正在检测登录状态...</span>
                    </div>
                </div>
            </div>
            <div class="layui-card rccc">
                <div class="layui-card-header" data-i18n="siteInfo">网站信息</div>
                <div class="layui-card-body">
                    <!-- 网站作者：<button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:show_author_info();">查看</button><br> -->
                    <span data-i18n="OtherAddress">其他地址: </span><a href="https://mkzi-nya.github.io/milthm-calculator-web/index.html" target="_blank"><span class="superlinkR">Mkzi Nya's Fork</span></a><br>
                    <span data-i18n="siteAuthor">网站作者：</span><a href="javascript:void(0);" onclick="show_author_info();" class="superlinkR" data-i18n="viewAuthor">查看</a><br>
                    <span data-i18n="donationText">赞助：</span><a href="javascript:void(0);" onclick="show_donation();" class="superlinkR" data-i18n="donation">捐赠</a><br>
                    <span data-i18n="visit">本站访问数量：</span><span id="accessCount"></span><br>
                    <a class="superlinkR" href="javascript:void(0);" onclick="openLicenseAndPrivacy();" data-i18n="seeLicenseAndPrivacy">查看隐私政策和开源协议</a>

                </div>
            </div>
            <script>
                if (accessCount != null) {
                    document.getElementById("accessCount").innerHTML = accessCount;
                } else {
                    document.getElementById("accessCount").innerHTML = "DevMode";
                }
            </script>

            <div class="layui-card rccc">
                <div class="layui-card-header" data-i18n="dataProcessing">数据处理</div>
                <div class="layui-card-body">
                    <textarea id="inputData" class="layui-textarea" placeholder="粘贴数据在此处... / Paste Data Here..."></textarea>
                    <hr />
                    <button class="layui-btn layui-btn-primary" onclick="javascript:startProcess();" data-i18n="parse">解析</button>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:upl();" data-i18n="uploadFile">上传文件</button>
                    <hr />
                    <button class="layui-btn layui-btn-primary" onclick="javascript:downloadImage();" data-i18n="generateImage">生成图像</button>
                    <button class="layui-btn layui-btn-primary" onclick="showSettings();" data-i18n="settings">查分图设置</button>





                    <br>
                    <div id="picgen" style="display: none" ;>
                        <br>
                        <span class="layui-badge layui-bg-black" data-i18n="generatingImage">正在生成图片，由于需要下载图片资源，可能需要一些时间。若一直没有反应，可以多次尝试。资源不会超过4MB</span>
                    </div>

                    <!-- end chunk: data processing operations -->
                </div>
            </div>

            <!-- chunk result show -->
            <div class="layui-card rccc" id="usercontainer" style="display: none;">
                <!-- usercontainer 默认隐藏，在数据处理完成后会有js调起显示 -->
                <div class="layui-card-header" data-i18n="dataResult">数据处理结果</div>
                <div class="layui-card-body">
                    <h3 data-i18n="userInfo">用户信息：</h3>
                    <!-- chunk: userinfo -->
                    <h4 id="userInfo"></h4>
                    <!-- end chunk: userinfo -->
                    <hr />

                    <h3 data-i18n="uploadYourSaves">上传你的存档：</h3>
                    <a href="javascript:void(0);" class="superlinkR" onclick="javascript:doSavesUpload();" data-i18n="uploadBtnText">上传</a>
                    <hr />
                    <h3 data-i18n="charts">图表：</h3>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:changeColumns(1);" data-i18n="increaseColumn">增加列</button>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:changeColumns(-1);" data-i18n="decreaseColumn">减少列</button>
                    <br>
                    <hr />
                    <!-- chunk: res container -->
                    <div class="container" id="output"></div>
                    <!-- end chunk: res container -->
                </div>
            </div>
            <!-- end chunk result show-->
        </div>
    </div>
    <div id="overlay" class="overlay" onclick="closeSettings()"></div>
    <div id="settingsModal" class="settingsModal" style="border: 1px solid #eeeeee;">
        <h3 data-i18n="settingsTitle">查分图设置</h3>
        <label for="cardCount" data-i18n="cardCountLabel" style="font-size: 18px;">卡片数量:</label>
        <input type="number" id="cardCount" value="22" min="1" data-i18n-placeholder="cardCountPlaceholder"><br>
        <label for="bgImage" data-i18n="bgImageLabel" style="font-size: 18px;">更换背景图:</label>
        <input type="file" id="bgImage" accept="image/*"><br>
        <label for="excludeReality" data-i18n="excludeRealityLabel" style="font-size: 18px;">绘制不记入Reality的曲目:</label>
        <select id="excludeReality" style="font-size: 16px;">
            <option value="false">false</option>
            <option value="true">true</option>
        </select><br>
        <label for="yrjds" data-i18n="yrjds" style="font-size: 18px;">展示愚人节定数:</label>
        <select id="yrjds" style="font-size: 16px;">
            <option value="false">false</option>
            <option value="true">true</option>
        </select><br>
        <hr />
        <button onclick="closeSettings()" class="cancel-btn" data-i18n="cancel">取消</button>
        <button onclick="applySettings()" class="apply-btn" data-i18n="apply">应用</button>
    </div>

    <!-- Chunk login -->
    <div id="over2lay" class="overlay" onclick="javascript:closeLogin();"></div>
    <div class="settingsModal" id="loginModal" style="border: 1px solid #eeeeee;display: none;">
        <div style="text-align: left;">
            <h2>Authencation (身份验证)</h2>
            <hr>
            <b>不是你的Milthm账户或TapTap账户！！！</b>
            <h1>Login / 登录：</h1><br>
            <div id="loginPanel-t" style="display: none;padding:6px;border:1px;border-style:solid;border-color: #ffffff33;color:rgb(255, 255, 255);background-color:#ffffff33;border-radius:16px">
                <b id="loginPanel-t-text">Loading...</b>
            </div>
            <div id="loginPanel-normal">
                <h4>Username / 用户名：</h4>
                <input type="text" class="layui-input inputR" id="login_username" />
                <h4>Password / 密码：</h4>
                <input type="password" class="layui-input inputR" id="login_password" />
                <hr/>
                <a class="superlinkR" href="javascript:void(0);" onclick="openLicenseAndPrivacy();" data-i18n="seeLicenseAndPrivacy">查看隐私政策和开源协议</a>
                <hr/>
                <button class="apply-btn" id="login_btn">Login / 登录</button>
                <button class="cancel-btn" onclick="closeLogin()">Cancel / 取消</button>
                <hr/>
                <p>或者，在输入用户名和密码后 <a class='superlinkR' href="javascript:void(0);" onclick="reg_user()">注册</a></p>
                <hr/>
                
            </div>



        </div>

    </div>

    <!-- Chunk upload -->
    <div id="over3lay" class="overlay" onclick="javascript:closeUploadPanel();"></div>
    <div class="settingsModal" id="uploadModal" style="border: 1px solid #eeeeee;display: none;">
        <div style="text-align: left;">
            <h2>Upload / 上传</h2>
            <hr>
            <div id="uploadPanel-t" style="display: none;padding:6px;border:1px;border-style:solid;border-color: #ffffff33;color:rgb(255, 255, 255);background-color:#ffffff33;border-radius:16px">
                <b id="uploadPanel-t-text">Loading...</b>
            </div>
            <div id="uploadPanel-normal">
                <h4>Title / 标题：</h4>
                <input type="text" class="layui-input inputR" id="upload_title" />
                <h4>Description / 描述：</h4>
                <textarea type="text" class="layui-textarea inputR" id="upload_description"></textarea>
                <br>
                <h4>Main Info / 主要信息：<span id="upload_info" style="box-sizing:border-box;padding:3px;border:1px;border-style:solid;border-color: #ffffff33;color:rgb(255, 255, 255);background-color:rgba(255, 255, 255, 0.08);border-radius:16px">Loading...</span></h4>
                <h4>Data / 数据：</h4>
                <div id="upload_data_display" style="box-sizing:border-box;padding:3px;border:1px;border-style:solid;border-color: #ffffff33;color:rgb(255, 255, 255);background-color:rgba(255, 255, 255, 0.08);border-radius:16px"></div>
                <span style="display:none;" id="upload_data"></span>
                <br><hr/>
                <a class="superlinkR" href="javascript:void(0);" onclick="openLicenseAndPrivacy();" data-i18n="seeLicenseAndPrivacy">查看隐私政策和开源协议</a>
                <br><hr/>
                <button class="apply-btn" id="upload_btn">Upload / 上传</button>
                <button class="cancel-btn" onclick="closeUploadPanel()">Cancel / 取消</button>
            </div>
        </div>
    </div>


    <!-- Saves Viewer -->
    <div id="over4lay" class="overlay" onclick="javascript:closeSavesBrowser();"></div>
    <div class="settingsModal" id="savesModal" style="border: 1px solid #eeeeee;display: none;width:auto !important;max-width:60vw !important;">
        <div style="text-align: left;">
            <h2><a href="javascript:void(0);" style="font-size:large;color:rgb(255, 255, 255);text-decoration:none;padding:6px;border:1px;border-style:solid;border-color: #ffffff33;background-color:rgba(255, 255, 255, 0.08);border-radius:16px" onclick="javascript:closeSavesBrowser();">返回</a> Saves Browser </h2>
            <br>
            <span id="saves_count" style="box-sizing:border-box;padding:3px;border:1px;border-style:solid;border-color: #ffffff33;color:rgb(255, 255, 255);border-radius:16px">总数: Loading...</span>
            <hr>
            <p>这个分页有可能有bug,由于时间原因就先不修了还要去tm上学。 --4everDimensions</p>
            <hr>
            <div style="line-height: 32px;">
                <a href="javascript:void(0);" style="white-space:nowrap;color:lightblue;text-decoration:none;box-sizing:border-box;padding:3px;border:1px;border-style:solid;border-color: #ffffff33;border-radius:16px;" onclick="javascript:fetch_saves();">Refresh / 刷新</a>
                <a href="javascript:void(0);" style="white-space:nowrap;color:lightblue;text-decoration:none;box-sizing:border-box;padding:3px;border:1px;border-style:solid;border-color: #ffffff33;border-radius:16px;" onclick="javascript:sb_prep();">Previous / 上一页</a>
                <a href="javascript:void(0);" style="white-space:nowrap;color:lightblue;text-decoration:none;box-sizing:border-box;padding:3px;border:1px;border-style:solid;border-color: #ffffff33;border-radius:16px;" onclick="javascript:sb_nexp();">Next / 下一页</a>
            </div>
            <hr>
            <div class="saves_list_container">
                <table class="layui-table" lay-skin="line">
                    <colgroup>
                        <col style="min-width:3vw;max-width:16vw">
                        <col style="max-width:32vw ">
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title / 标题</th>
                            <th>Info / 概要</th>
                            <th>Created Time / 创建时间</th>
                            <th>Operation / 操作</th>
                            <th>Desc / 备注</th>
                        </tr>
                    </thead>
                    <tbody id="savesList_sub">
                        <!-- <tr>
                            <td>title</td>
                            <td>info</td>
                            <td>time</td>
                            <td>
                                <a href="javascript:void(0);" class="action" onclick="javascript:fetch_save('id');">View / 查看</a>
                                <a href="javascript:void(0);" class="action delete" onclick="javascript:delete_save('id');">Delete / 删除</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- User Panel -->
    <div id="over5lay" class="overlay" onclick="javascript:closeUserPanel();"></div>
    <div class="settingsModal" id="userModal" style="border: 1px solid #eeeeee;display: none;">
        <div style="text-align: left;">
            <h2><a href="javascript:void(0);" style="font-size:large;color:rgb(255, 255, 255);text-decoration:none;padding:6px;border:1px;border-style:solid;border-color: #ffffff33;background-color:rgba(255, 255, 255, 0.08);border-radius:16px" onclick="javascript:closeUserPanel();">返回</a> 用户设置</h2>
            <hr/>
            <a class='nowrap superlinkR' href='javascript:void(0);' onclick='javascript:logoutAll();'>在所有设备上登出</a>
            
        </div>
    </div>



    <script>
        function showSettings() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('settingsModal').style.display = 'block';
        }

        function closeSettings() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('settingsModal').style.display = 'none';
        }

        function applySettings() {
            const cardCount = document.getElementById('cardCount').value;
            const bgImage = document.getElementById('bgImage').files[0];

            closeSettings();
        }

        let translations = {},
            currentLang = 'zh',
            menuVisible = false;

        function loadTranslations() {
            fetch('lang.json').then(response => response.json()).then(data => {
                translations = data;
                let detected = (navigator.language || navigator.userLanguage).toLowerCase();
                if (detected.startsWith('zh')) {
                    detected = detected.includes('tw') || detected.includes('hk') || detected.includes('mo') ? 'zh-tw' : 'zh';
                }
                currentLang = translations[detected] ? detected : 'en';
                setLanguage(currentLang);
            }).catch(error => {
                console.error('加载翻译文件失败:', error);
                setLanguage('en');
            });
        }

        function setLanguage(lang) {
            currentLang = lang;
            document.documentElement.lang = lang;
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[lang] && translations[lang][key]) {
                    el.innerHTML = translations[lang][key];
                }
            });
            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                if (translations[lang] && translations[lang][key]) {
                    el.placeholder = translations[lang][key];
                }
            });
            menuVisible = false;
            document.getElementById('languageMenu').style.display = 'none';
        }

        function toggleLangMenu() {
            menuVisible = !menuVisible;
            document.getElementById('languageMenu').style.display = menuVisible ? 'block' : 'none';
        }
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('languageButton').addEventListener('click', toggleLangMenu);
            document.getElementById('langZh').addEventListener('click', () => setLanguage('zh'));
            document.getElementById('langZhTw').addEventListener('click', () => setLanguage('zh-tw'));
            document.getElementById('langEn').addEventListener('click', () => setLanguage('en'));
            document.getElementById('langJa').addEventListener('click', () => setLanguage('ja'));
            document.getElementById('langKo').addEventListener('click', () => setLanguage('ko'));
            document.getElementById('langRu').addEventListener('click', () => setLanguage('ru'));
            document.getElementById('langEs').addEventListener('click', () => setLanguage('es'));
            document.getElementById('langVi').addEventListener('click', () => setLanguage('vi'));
            loadTranslations();
        });
    </script>
    <script src="./js/cha_newui.js"></script>
    <script src="./js/user/upload4index.js"></script>
    <!-- Autoparse -->
    <script>
        function autoParse() {
            let url = new URL(window.location.href);
            let data = url.searchParams.get("data");
            if (data != null) {
                try {
                    document.getElementById('inputData').value = atob(data);
                    startProcess();
                } catch (e) {
                    console.log(e);
                }

            } else {
                console.log("no data found");
            }
        }
        autoParse();
    </script>


    <!-- Login -->
    <script>
        var lplt = document.getElementById("loginPanel-t-text");
        var pr = document.getElementById("loginPanel-normal");
        var pr2 = document.getElementById("loginPanel-t");
        var login_username = document.getElementById("login_username");
        var login_password = document.getElementById("login_password");
        var login_btn = document.getElementById("login_btn");
        var reg_username = document.getElementById("reg_username");
        var reg_nick = document.getElementById("reg_nick");
        var reg_password = document.getElementById("reg_password");
        var reg_repassword = document.getElementById("reg_repassword");
        var reg_btn = document.getElementById("reg_btn");

        login_btn.onclick = function() {
            login();
        }

        function login() {
            var username = login_username.value;
            var password = login_password.value;
            if (username == "" || password == "") {
                // Pass
            } else {
                pr.style.display = "none";
                var loading = layer.load(1)

                try {
                    pr2.style.display = "block";
                    lplt.innerHTML = "Logging in... / 正在登入...";

                    fetch("user/requestLogin.php", {
                        method: "POST",
                        body: new URLSearchParams({
                            username: username,
                            password: password
                        })
                    }).then(response => response.json()).then(data => {
                        lplt.innerHTML = data.msg
                        layer.msg(data.msg);
                        pr.style.display = "block";
                        layer.close(loading);
                        if (data.code !== 0) {
                            return;
                        } else {
                            setStorage("username", data.data.username);
                            setStorage("nickname", data.data.nickName);
                            setStorage("token", data.token);
                            closeLogin();
                            initLogging();
                            return;
                        }
                    })
                } catch (e) {
                    lplt.innerHTML = ("An error occurred / 发生错误");
                    pr.style.display = "block";
                    layer.close(loading);
                }
            }
        }

        // for upload
        function initUpload() {
            var dt = ((document.getElementById("inputData").value))

            document.getElementById("upload_data").innerHTML = dt
            document.getElementById("upload_info").innerHTML = document.getElementById("userInfo").innerHTML
            document.getElementById("upload_data_display").innerHTML = dt.substr(0, (dt.length < 32 ? dt.length : 32)) + "...";
        }

        document.getElementById("upload_btn").onclick = function() {
            var dt = document.getElementById("upload_data").innerHTML;
            var title = document.getElementById("upload_title").value;
            var desc = document.getElementById("upload_description").value;
            var info = document.getElementById("upload_info").innerHTML;
            var token = getStorage("token");
            var username = getStorage("username");
            var loadingDiv = document.getElementById("uploadPanel-t");
            var normalDiv = document.getElementById("uploadPanel-normal");
            var lplt = document.getElementById("uploadPanel-t-text");
            if( dt == "" || title == "" || desc == "" || info == "") {
                layer.msg("Please fill in all the fields / 请填写所有字段: data(Auto/自动获取), title, description, info(Auto/自动获取)");
                return;
            }
            var loading = layer.load(1)
            try {
                loadingDiv.style.display = "block";
                normalDiv.style.display = "none";
                lplt.innerHTML = "Uploading... / 正在上传...";
                fetch("user/postSave.php", {
                    method: "POST",
                    body: new URLSearchParams({
                        data: dt,
                        title: title,
                        description: desc,
                        score: info,
                        username: username,
                        token: token
                    })
                }).then(response => response.json()).then(data => {
                    layer.msg(data.msg);
                    if (data.code === 0) {
                        closeUploadPanel();
                    }
                    loadingDiv.style.display = "none";
                    normalDiv.style.display = "block";
                    layer.close(loading);
                });
            } catch (e) {
                layer.msg("An error occurred / 发生错误");
                console.log(e);
                loadingDiv.style.display = "none";
                layer.close(loading);
                normalDiv.style.display = "block";
            }

        }

        // for reg
        function reg_user() {
            var username = document.getElementById("login_username").value;
            var password = document.getElementById("login_password").value;
            if (username == '' || password == '') return;
            if (username.length > 48) {
                layer.msg("用户名过长");
                return;
            }
            if (password.length > 128) {
                layer.msg("密码过长");
                return;
            }
            if (password.length < 8) {
                layer.msg("密码过短");
                return;
            }
            if (username.length < 6) {
                layer.msg("用户名过短");
                return;
            }
            layer.prompt({
                title: '重复密码：',
                formType: 1,
                shade: 0.6
            }, function(text, index) {
                if (text != password) {
                    layer.msg("两次密码不一致");
                    return;
                }


                var loading = layer.load(1)
                try {
                    fetch("user/reg.php", {
                        method: "POST",
                        body: new URLSearchParams({
                            username: username,
                            password: password
                        })
                    }).then(response => response.json()).then(data => {
                        layer.msg(data.msg);
                        if (data.code === 0) {
                            setStorage("token", data.token);
                            setStorage("username", data.username);
                            setStorage("nickname", data.nickname);
                            initLogging();
                            
                        }
                        layer.close(loading);
                        layer.close(index);
                    })
                } catch (e) {
                    layer.msg("An error occurred / 发生未知错误");
                    console.log(e);
                    layer.close(loading);
                    layer.close(index);
                } finally {
                    closeLogin();
                }
            });
        }



        // Check version
        checkVersions();
    </script>

</body>

</html>