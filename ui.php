

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
    <script src="./js/cha_newui.js"></script>
    <!-- Chunk: sql_wasm -->
    <script src="./js/plistjs/dist/plist.js"></script>
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
    <div class="layui-header">
        <div class="layui-logo layui-bg-black" style="padding: 16px;">
            <h1>MilthmCalc</h1>
        </div>
    </div>

    <div style="padding: 30px; text-align:center;display:flex;">
        <div class="" style="text-align: left;max-width:1200px;margin:auto;">
            <div class="layui-card">
                <div class="layui-card-header">Welcome</div>
                <div class="layui-card-body">
                    你好，欢迎来到MilthmCalc！(Reality计算器) (http://k9.lv/c)<br>
                    这是一个用于计算Milthm Reality分数的网站，你可以在这里导入存档并解析。<br><hr>
                    使用说明：<span class="superlink" onclick="javascript:show_usage();">查看使用说明</span>
                </div>
            </div>
            <div class="layui-card">
                <div class="layui-card-header">网站信息</div>
                <div class="layui-card-body">
                    <!-- 网站作者：<button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:show_author_info();">查看</button><br> -->
                    网站作者：<span onclick="javascript:show_author_info();" class="superlink">查看</span><br>
                    本站访问数量：<span id="accessCount"><span><br>
                </div>
            </div>
            <script>
                if (accessCount != null){
                    document.getElementById("accessCount").innerHTML = accessCount;
                }else{
                    document.getElementById("accessCount").innerHTML = "DevMode";
                }
            </script>

<div class="layui-card">
                <div class="layui-card-header">数据处理</div>
                <div class="layui-card-body">
                    <textarea id="inputData" placeholder="粘贴数据在此处..." class="layui-textarea"></textarea>
                    <hr/>
                    <!-- chunk: data processing operations -->
                    <button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:qqbot_ua();">QQ Bot选项</button>
                    <hr/>
                    <button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:processData();">解析</button>
                    <button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:upl();">上传文件</button>
                    <button class="layui-btn layui-btn-primary layui-border-green" onclick="javascript:downloadImage();">生成图像</button>
                    <!-- end chunk: data processing operations -->
                </div>
            </div>

            <!-- chunk result show -->
            <div class="layui-card" id="usercontainer" style="display: none;">
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
</body>
</html>