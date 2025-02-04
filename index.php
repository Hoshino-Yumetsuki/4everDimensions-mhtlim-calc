<?php
include "fc.php";
// 统计信息
// $time_now = date("Y-m-d H:i:s");
$dbc=dbc();
$ms_time = microtime(true);
// $gen_uuid=uuid(); //生成唯一id
if(isset($_SERVER['HTTP_X_REAL_IP'])){
    $ip="O:".$_SERVER['REMOTE_ADDR'].' X:'.$_SERVER['HTTP_X_REAL_IP'];
}else{
    $ip=$_SERVER['REMOTE_ADDR'];
}
execute($dbc,"INSERT INTO `cha_stat` (`ip`,`ms`) VALUES ('$ip','$ms_time')");


?>





<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Milthm 查分器（原Reality计算器）</title>
            <link rel="icon" type="image/x-icon" href="./favicon.ico">
            <link rel="stylesheet" href="css/cha.css">
            <script src="js/mdui.min.js"></script>
            <link rel="stylesheet" href="css/mdui.min.css">
    <script src="./js/plistjs/dist/plist.js"></script>
    <script src="./js/sql-wasm.js"></script>
    <!-- <script src="http://cdn.jsdelivr.net/npm/plist@3.0.1/dist/plist.min.js"></script> -->
        </head>
        <body class="mdui-theme-layout-dark">
            <!-- <h1>Reality计算器v1.01</h1> -->
            <div class="mdui-appbar">
                <div class="mdui-toolbar mdui-color-theme">
            <a onclick="javascript:openContributionDialog();" class="mdui-hoverable mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-purple">
                <i class="mdui-icon material-icons">info_outline</i></a>
            <a href="javascript:;" class="mdui-typo-headline">Reality计算器v3.2</a>
                <div class="mdui-toolbar-spacer"></div>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon">
                    <a href="https://qm.qq.com/q/Utb6sNDvki" target="_blank">交流群：375882310</a>
                </a>
                </div>
            </div>
            <!-- <textarea id="inputData" placeholder="粘贴playerfile的内容"></textarea> -->
<div class="fullcenter">
<div style="display:none;">
        <input type="file" id="fileupLoad" style="display:none;" />
    </div>
        <div class="aaa-panel jjjjj">
                <div class="aa1container">
                    <div class="aa1textarea-container">
                        <div class="mdui-panel mdui-panel-gapless" mdui-panel>
                            <div class="mdui-panel-item mdui-panel-item-open">
                                <div class="mdui-panel-item-header">
                                    <div class="mdui-panel-item-title">本站统计数据</div>
                                </div>
                                <div class="mdui-panel-item-body">
                                    <p>本站总访问量：<?php
                                    $r=fetch($dbc, "select count(*) from cha_stat;");
                                    print_r($r[0]['count(*)']);
                                    echo "次";
                                    ?></p> 
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mdui-panel mdui-panel-gapless" mdui-panel>
                            <div class="mdui-panel-item mdui-panel-item-open">
                                <div class="mdui-panel-item-header">
                                    <div class="mdui-panel-item-title">输入数据</div>
                                    <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                                </div>
                                <div class="mdui-panel-item-body">
                                    <textarea id="inputData" class="mdui-textarea aTe" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mdui-panel mdui-panel-gapless" mdui-panel>
                    <div class="mdui-panel-item">
                        <div class="mdui-panel-item-header">
                            <div class="mdui-panel-item-title">QQ Bot</div>
                            <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                        </div>
                        <div class="mdui-panel-item-body">
                            <div class="mdui-textfield mdui-textfield-floating-label" style="width: 100%; text-align: left;">
                                <label class="mdui-textfield-label">QQ号：</label>
                                <input class="mdui-textfield-input" type="text" id="qqEntry"/>
                              </div>
                              <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-800" style="width: 100%; text-align: center;" onclick="javascript:upload();">上传</button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mdui-card" style="background-color: #333; padding: 12px;">


        <div class="button-container">
            <!-- <button id="toggleInput" onclick="toggleInput()">展开/收起</button> -->
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-800" onclick="processData()">查分</button>
            <button type='file' class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-800" onclick="upl()">上传文件</button>
        </div>
            <br>
        <div class="button-container">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-800" onclick="changeColumns(1)">增加列</button>
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-800" onclick="changeColumns(-1)">减少列</button>
        </div>
        </div>
        <br>
        <div class="mdui-card" style="background-color: #333; padding: 12px;">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-800" onclick="javascript:showAbout();">说明</button>
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-deep-purple-800" onclick="javascript:downloadImage();">生成图像</button>
        </div>



<div class="mdui-dialog" id="aboutDialog">
    <div class="mdui-dialog-title">说明</div>
    <div class="mdui-dialog-content">
                    <textarea id="aboutText" class="aTe"class=" mdui-textfield-input" rows="10" readonly>

        说明
可以提取存档上传或手动输入
手输说明见最后

点击上传文件可以直接上传存档
上传文件时请不要修改后缀
关于存档说明详见https://milthm.fandom.com/wiki/Configuration_File
各平台存档路径:
Android(taptap)
/sdcard/Android/data/game.taptap.morizero.milthm/files/data/saves.db
Android(Google)
/storage/emulated/<userid>/Android/data/com.morizero.milthm/files/
Windows
%AppData%\..\LocalLow\Morizero\Milthm\

macos
~/Library/Application Support/Morizero/Milthm/
ios
使用系统的"文件"应用查看找milthm的数据

Linux
~/.config/unity3d/Morizero/Milthm/

教程见375882310  
欢迎进群讨论

---English---

You can click to upload files directly (iOS/macOS can be copied directly).  
Please do not modify the file extension when uploading.  
Save file paths for each platform:  

https://milthm.fandom.com/wiki/Configuration_File
Android(taptap)
/sdcard/Android/data/game.taptap.morizero.milthm/files/data/saves.db
Android(Google)
/storage/emulated/<userid>/Android/data/com.morizero.milthm/files/
Windows
%AppData%\..\LocalLow\Morizero\Milthm\

macos
~/Library/Application Support/Morizero/Milthm/
ios
Use system builtin Files app and find Milthm in the app


Some button translations:  
"查分" – Check Score  
"上传文件" – Upload File  
"增加列" – Add Column  
"减少列" – Remove Column

手输格式如下
Manual input format is as follows

[name],{
    [Contrasty Angeles,CL,12.3,1010000,1.0000,0],
    [name,Difficulty, constant, score,acc,leavel]
  }

leavel:0=R,1=AP,2=FC,3=S,4=A ……

---存档模板/Save file template---

[Player],{
    [Contrasty Angeles,CL,12.3,0,0,0],
    [命日,CL,12.2,0,0,0],
    [Regnaissance,CL,12.1,0,0,0],
    [Innocent white,CB,12.1,0,0,0],
    [Moonflutter,CL,11.7,0,0,0],
    [Fly To Meteor feat.兔柒,CL,11.7,0,0,0],
    [HYPER MEMORIES,CB,11.7,0,0,0],
    [Contrasty Angeles,CB,11.5,0,0,0],
    [Moonflutter,CB,11.4,0,0,0],
    [Algebra,CB,11.4,0,0,0],
    [slic.hertz #GdbG,CB,11.4,0,0,0],
    [Fragment of Memories,CB,11.3,0,0,0],
    [イコラト,CB,11.2,0,0,0],
    [参宿四~Betelgeuse~,CB,11.2,0,0,0],
    [命日,CB,11.1,0,0,0],
    [Regnaissance,CB,11.1,0,0,0],
    [樱落繁花,CB,10.9,0,0,0],
    [Moving on,CB,10.8,0,0,0],
    [Hikari,CB,10.7,0,0,0],
    [WATER,CB,10.6,0,0,0],
    [Threat - Sky Islands,CB,10.6,0,0,0],
    [雨女,CL,10.5,0,0,0],
    [Fly To Meteor (Milthm Edit),CB,10.5,0,0,0],
    [Future Unbound (Game Edit),CB,10.5,0,0,0],
    [Threat - Superstructure,CB,10.3,0,0,0],
    [Dogbite,CB,10.3,0,0,0],
    [cybernetic blazar,CB,10.2,0,0,0],
    [Agnostic,CB,10.2,0,0,0],
    [夜風,CB,10.1,0,0,0],
    [☹️Blueface,CB,10.1,0,0,0],
    [仮想明日,CB,10.0,0,0,0],
    [Psyched Fevereiro,CB,10.0,0,0,0],
    [OverRain,CB,10.0,0,0,0],
    [Oniichan,CB,9.8,0,0,0],
    [ネオン色のまち feat.Mai,CB,9.7,0,0,0],
    [Jump out,CB,9.7,0,0,0],
    [Bio-Engineering,CB,9.6,0,0,0],
    [白虎蓮華,CB,9.6,0,0,0],
    [雨女,CB,9.5,0,0,0],
    [烁雨,CB,9.4,0,0,0],
    [Aconsma,CB,9.3,0,0,0],
    [花月,CB,9.3,0,0,0],
    [INFP.mp3,CB,9.2,0,0,0],
    [暮予星光,CB,9.1,0,0,0],
    [サイクルの欠片,CB,8.6,0,0,0],
    [时落之雨,CB,8.5,0,0,0],
    [粗线条的雨,CB,8.3,0,0,0],
    [Words,CB,8.3,0,0,0],
    [雨之城,CB,7.5,0,0,0]
  }
</textarea>

    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</button>
    </div>

</div>

<div class="mdui-dialog" id="contributionDialog" >
    <div class="mdui-dialog-title">贡献</div>
    <div class="mdui-dialog-content">
        <textarea class='aTe' id="contributionText" class="mdui-textfield-input" rows="10" readonly>
贡献名单

作者：
 - 归梦
 - Chara
 - Amorimagus
 - Autumn
 - 名字

UI&脚本:
 - 归梦
 - Amorimagus

QQBot API:
 - Autumn

后端统计&托管：
 - Amorimagus
 - Chara

特别感谢：
 - 归梦
 - Amorimagus
 - Chara
 - 名字
 - Autumn

感谢所有参与贡献的人！
Copyleft 2024~2025. Reality Calculator Project.
        </textarea>

    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</button>
    </div>

</div>

<div class="mdui-dialog" id="qqBotResultDialog">
    <div class="mdui-dialog-title">QQ Bot结果</div>
    <div class="mdui-dialog-content">
        <b id="qqBotResultText"></b>
        <textarea class='aTe' id="qqBotResultContent" class="mdui-textfield-input" rows="10" readonly></textarea>
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" id="qqBotResultCloseBtn" mdui-dialog-close disabled>关闭</button>
    </div>
</div>

<div id="usercontainer" style="display: none;">
<br>
<div class="mdui-card" style="background-color: #333; padding: 12px;">
    
    <h2><div class="user-info" id="userInfo"></div></h2>
</div>
<br>
</div>
        

            <div class="container" id="output"></div>
            <script src="js/cha.js"></script>
            <br>
            <div class="mdui-panel mdui-panel-gapless" mdui-panel>
                <div class="mdui-panel-item mdui-panel-item-open">
                    <div class="mdui-panel-item-header">
                        <div class="mdui-panel-item-title">那我就喵一句</div>
                        <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-panel-item-body">
                        <textarea id="TakanashiHoshinoILoveYou" class="mdui-textarea aTe" rows="10" disabled style="width:80%">假设命题存在于一个足够强大的形式系统（如算术系统）中喵～根据哥德尔第一不完备定理喵～，若系统一致喵～（无矛盾喵～），则存在一个命题G喵～，声称“G在本系统中不可证”喵～。  
   - 若G可证喵～，则系统不一致喵～（因为G声称自身不可证喵～）。  
   - 若G不可证喵～，则G为真喵～（因其确实无法被证明喵～）。  
   因此，在一致的系统内，G为真但不可证喵喵～。</textarea>
                        <!--<div class="audio-links"></div>-->
                        <!--    <audio controls>-->
                        <!--        <source src="./Camellia-δ_for_the_DELTA.ogg" type="audio/ogg">-->
                        <!--        喵啊，放不了，你还是<a href="./Camellia-δ_for_the_DELTA.ogg" download>下吧</a>。-->
                        <!--    </audio>-->
                        <!--    <p>かめりあ - δ：for the DELTA (かめりあ's 'PLANETARY  DUBSTEP' Remix)</p>-->
            
                        <!--    <audio controls>-->
                        <!--        <source src="./Camellia-FM_Synthesis_Experiment.ogg" type="audio/ogg">-->
                        <!--        喵啊，放不了，你还是<a href="./Camellia-FM_Synthesis_Experiment.ogg" download>下吧</a>。-->
                        <!--    </audio>-->
                        <!--    <p>かめりあ - FM Synthesis Experiment</p>-->
                            
                        <!-- 你搁这瞅啥呢，没见过HTML吗？ -->
                        </div>

                        

                </div>
            </div>


<br>


            <div class="mdui-panel mdui-panel-gapless" mdui-panel>
                <div class="mdui-panel-item mdui-panel-item-open">
                    <div class="mdui-panel-item-header">
                        <div class="mdui-panel-item-title">赞助&广告</div>
                        <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-panel-item-body">
                        <textarea id="ILoveYouTakanashiHoshino" class="mdui-textarea aTe" rows="10" disabled style="width:80%">
                        哪来的广告？
                        </textarea>
                        </div>

                        

                </div>
            </div>



            
        </div>
            
        </div>
    </div>


        </body>
        </html>
