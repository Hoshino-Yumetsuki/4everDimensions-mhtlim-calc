<!DOCTYPE html>
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

        #settingsModal {
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
            width: 300px;
        }

        #settingsModal h3 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        #settingsModal input,
        #settingsModal button {
            margin-bottom: 15px;
            padding: 8px;
            width: 100%;
            background-color: #444;
            color: #fff;
            border: 1px solid #555;
            border-radius: 12px;
            font-size: 16px;
        }

        #settingsModal input:focus,
        #settingsModal button:focus {
            outline: none;
            border-color: #888;
        }

        #settingsModal button {
            width: 48%;
            display: inline-block;
            cursor: pointer;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.45);
            z-index: 9999;
        }
    </style>
    <!-- Chunk: sql_wasm -->
    <script src="./js/sql-wasm.js"></script>
    <script>
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
                    <h2 data-i18n="welcome">Welcome</h2>
                </div>
                <div class="layui-card-body">
                    <p data-i18n="greeting">欢迎来到MilthmCalc！(Reality计算器) (http://k9.lv/c)</p>
                    <p data-i18n="description">这是一个用于计算Milthm Reality分数的网站，你可以在这里导入并解析存档。</p>
                    <hr>
                    <span data-i18n="usage">使用说明：</span><a href="./usage/usage.html" target="_blank"><span class="superlink" data-i18n="viewUsage">查看帮助信息</span></a>
                    <hr>
                    <span data-i18n="qqGroup">QQ交流群：</span><a href="https://qm.qq.com/q/Utb6sNDvki" target="_blank"><span class="superlink" data-i18n="viewQQGroup">Milthm#√-1洨巟羣</span></a>
                </div>
            </div>
            <div class="layui-card rccc">
                <div class="layui-card-header" data-i18n="siteInfo">网站信息</div>
                <div class="layui-card-body">
                    <!-- 网站作者：<button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:show_author_info();">查看</button><br> -->
                    <span data-i18n="OtherAddress">其他地址: </span><a href="https://mkzi-nya.github.io/milthm-calculator-web/index.html" target="_blank"><span class="superlink">Mkzi Nya's Fork</span></a><br>
                    <span data-i18n="siteAuthor">网站作者：</span><a href="javascript:void(0);" onclick="show_author_info();" style="color:lightblue;text-decoration:none;" data-i18n="viewAuthor">查看</a><br>
                    <span data-i18n="donationText">赞助：</span><a href="javascript:void(0);" onclick="show_donation();" style="color:lightblue;text-decoration:none;" data-i18n="donation">捐赠</a><br>
                    <span data-i18n="visit">本站访问数量：</span><span id="accessCount"></span><br>
                    <!-- <div class="layui-collapse">
                        <div class="layui-colla-item">
                            <div class="layui-colla-title rccc">服务器信息</div>
                            <div class="layui-colla-content">
                                <?php
                                // echo '运行在 '.shell_exec('uname -p')." 的 ".shell_exec('uname -s')." 上，";
                                // echo 'PHP版本：'.phpversion().'<br>';
                                // echo '距离上次页面更新：'.(time()-filemtime(__FILE__)).'秒<br>';
                                // echo '服务器负载：'.implode(' ', sys_getloadavg()).'<br>';
                                // echo '服务器CPU核心数：'.shell_exec('nproc').'<br>';
                                // echo '服务器CPU型号：'.shell_exec('cat /proc/cpuinfo | grep "model name" | uniq | awk -F : \'{print $2}\' | sed \'s/^[ \t]*//\'').'<br>';
                                // echo '服务器内存剩余：'.shell_exec('free -m | grep 内存 | awk \'{print $7}\'').'MB<br>';
                                ?>
                            </div>
                        </div>
                    </div> -->

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
                    <h3 data-i18n="charts">图表：</h3>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:changeColumns(1);" data-i18n="increaseColumn">增加列</button>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:changeColumns(-1);" data-i18n="decreaseColumn">减少列</button>
                    <br>
                    <hr>
                    <!-- chunk: res container -->
                    <div class="container" id="output"></div>
                    <!-- end chunk: res container -->
                </div>
            </div>
            <!-- end chunk result show-->
        </div>
    </div>
    <div id="overlay" onclick="closeSettings()"></div>
    <div id="settingsModal" style="border: 1px solid #eeeeee;">
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
</body>

</html>