

<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milthm 查分器（原Reality计算器）</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="new_UI.css">

    <link href="./layui/css/layui.css" rel="stylesheet">

    <input type="file" id="fileupLoad" style="display:none;" />
    <style>
    #settingsModal { 
        display: none; 
        position: fixed; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        background: #2a2a2a; 
        color: #fff; 
        padding: 30px; 
        border-radius: 15px; 
        box-shadow: 0 4px 15px rgba(0,0,0,0.7); 
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
        border-radius: 10px;
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
    #settingsModal .cancel-btn {
        background-color: #777;
    }
    #settingsModal .apply-btn {
        background-color: #5cb85c;
    }
    #overlay { 
        display: none; 
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
        background-color: rgba(0,0,0,0.7); 
        z-index: 9999; 
    }
  </style>
    <!-- Chunk: sql_wasm -->
    <script src="./js/plistjs/plist.js"></script>
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
            <h1 style="color:turquoise;">MilthmCalc <span style="font-size: medium;color:gold;">Ultra</span></h1>
        </div>
    </div>

    <div style="padding: 30px; text-align:center;display:flex;">
        <div class="" style="text-align: left;max-width:1200px;margin:auto;">

            <!-- <div class="layui-card layui-bg-black" style="background-color: rgba(84, 105, 0, 0.34) !important;border-radius: 10px;border: 1px solid rgba(122, 122, 122, 0.42);">
                <div class="layui-card-header">测试版新UI说明</div>
                <div class="layui-card-body">
                    <h3>本网站的新UI仍然处于测试阶段！如有BUG请反馈！</h3>
                </div>
            </div> -->
            <div class="layui-card rccc">
                <div class="layui-card-header"><h2>Welcome</h2></div>
                <div class="layui-card-body">
                    欢迎来到MilthmCalc！(Reality计算器) (http://k9.lv/c)<br>
                    这是一个用于计算Milthm Reality分数的网站，你可以在这里导入存档并解析。<br><hr>
                    使用说明：<span class="superlink" onclick="javascript:show_usage();">查看使用说明</span><hr>
                    <b>QQ交流群：</b><a href="https://qm.qq.com/q/Utb6sNDvki" target="_blank"><span class="superlink">Milthm#-1洨巟羣</span></a>
                </div>
            </div>
            <div class="layui-card rccc">
                <div class="layui-card-header">网站信息</div>
                <div class="layui-card-body">
                    <!-- 网站作者：<button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:show_author_info();">查看</button><br> -->
                    其他地址: <a href="https://mkzi-nya.github.io/milthm-calculator-web/index.html" target="_blank"><span class="superlink">Mkzi Nya's Fork</span></a><br>
                    网站作者：<span onclick="javascript:show_author_info();" class="superlink">查看</span><br>
                    本站访问数量：<span id="accessCount"></span><br>
                    <div class="layui-collapse">
                        <div class="layui-colla-item">
                            <div class="layui-colla-title rccc">服务器信息</div>
                            <div class="layui-colla-content">
                                <?php
                                    echo '运行在 '.shell_exec('uname -p')." 的 ".shell_exec('uname -s')." 上，";
                                    echo 'PHP版本：'.phpversion().'<br>';
                                    echo '距离上次页面更新：'.(time()-filemtime(__FILE__)).'秒<br>';
                                    echo '服务器负载：'.implode(' ', sys_getloadavg()).'<br>';
                                    echo '服务器CPU核心数：'.shell_exec('nproc').'<br>';
                                    echo '服务器CPU型号：'.shell_exec('cat /proc/cpuinfo | grep "model name" | uniq | awk -F : \'{print $2}\' | sed \'s/^[ \t]*//\'').'<br>';
                                    // echo '服务器内存剩余：'.shell_exec('free -m | grep 内存 | awk \'{print $7}\'').'MB<br>';
                                ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <script>
                if (accessCount != null){
                    document.getElementById("accessCount").innerHTML = accessCount;
                }else{
                    document.getElementById("accessCount").innerHTML = "DevMode";
                }
            </script>

            <div class="layui-card rccc">
                <div class="layui-card-header">数据处理</div>
                <div class="layui-card-body">
                    <textarea id="inputData" placeholder="粘贴数据在此处..." class="layui-textarea"></textarea>
                    <hr/>
                    <!-- chunk: data processing operations -->
                    <button class="layui-btn layui-btn-primary layui-btn-disabled layui-btn-sm" onclick="javascript:qqbot_ua();" disabled>QQ Bot选项 (不可用)</button>
                    <hr/>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:processData();">解析</button>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:upl();">上传文件</button>
                    <button class="layui-btn layui-btn-primary" onclick="javascript:downloadImage();">生成图像</button>
                    <button class="layui-btn layui-btn-primary" onclick="showSettings();" >查分图设置</button>
                    <br>
                    <div id="picgen" style="display: none";>
                        <br>
                        <span class="layui-badge layui-bg-black">正在生成图片，由于需要下载图片资源，可能需要一些时间。若一直没有反应，可以多次尝试。</span>
                    </div>
                    
                    <!-- end chunk: data processing operations -->
                </div>
            </div>

            <!-- chunk result show -->
            <div class="layui-card rccc" id="usercontainer" style="display: none;">
                <!-- usercontainer 默认隐藏，在数据处理完成后会有js调起显示 -->
                <div class="layui-card-header">数据处理结果</div>
                <div class="layui-card-body">
                    <h3>用户信息：</h3>
                    <!-- chunk: userinfo -->
                     <h4 id="userInfo"></h3>
                    <!-- end chunk: userinfo -->
                    <hr/>
                    <h3>图表：</h3>
                    <button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:changeColumns(1);">增加列</button>
                    <button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:changeColumns(-1);">减少列</button>
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
  <div id="settingsModal">
    <h3 data-i18n="settingsTitle">查分图设置</h3>
    <label for="cardCount" data-i18n="cardCountLabel" style="font-size: 18px;">卡片数量:</label>
    <input type="number" id="cardCount" value="22" min="1" data-i18n-placeholder="cardCountPlaceholder"><br>
    <label for="bgImage" data-i18n="bgImageLabel" style="font-size: 18px;">更换背景图:</label>
    <input type="file" id="bgImage" accept="image/*"><br>
    <label for="excludeReality" data-i18n="excludeRealityLabel" style="font-size: 18px;">绘制不记入Reality的曲目:</label>    
    <select id="excludeReality" style="font-size: 16px;">
      <option value="false">false</option>
      <option value="true" >true</option>
    </select><br>
    <label for="yrjds" data-i18n="yrjds" style="font-size: 18px;">展示愚人节定数:</label>    
    <select id="yrjds" style="font-size: 16px;">
      <option value="true" >true</option>
      <option value="false">false</option>
    </select><br>
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
    </script>
    <script src="./js/cha_newui.js"></script>
</body>
</html>