function show_author_info() {
    layer.open({
        type: 1, 
        area: ['80%', '90%'],
        title: 'About the author',
        shade: 0.6, // 遮罩透明度
        shadeClose: true, // 点击遮罩区域，关闭弹层
        maxmin: false,
        anim: 0, // 0-6 的动画形式，-1 不开启
        content: `<div style="width:100%;text-align:center;"><div style="min-width:50%;padding: 32px;white-space: pre;"><h2>贡献名单</h3>
<h3>作者：</h3>
 - mkzi_nya(归梦)
 - Chara
 - Amorimagus
 - Autumn

<h3>UI&脚本：</h3>
 - mkzi_nya(归梦)
 - Amorimagus

<h3>QQBot API:</h3>
 - Autumn

<h3>后端：</h3>
 - Amorimagus
 - Chara

<h3>特别鸣谢：</h3>
 - mkzi_nya(归梦)
 - Amorimagus
 - Chara
 - Autumn
 - Panyi
 - Eric_Lian

<h3>感谢所有参与贡献的人！</h3>
Copyleft 2024~2025. Reality Calculator Project.
        </div></div>`
      });
}
function show_usage() {
  layer.open({
      type: 1, 
      area: ['80%', '90%'],
      title: '使用说明',
      shade: 0.6, // 遮罩透明度
      shadeClose: true, // 点击遮罩区域，关闭弹层
      maxmin: false,
      anim: 0, // 0-6 的动画形式，-1 不开启
      content: `<div style="width:100%;text-align:left;"><div style="min-width:50%;padding: 32px;white-space: pre;"><h2>使用说明</h3>

可以提取存档上传或手动输入
手输说明见最后

点击上传文件可以直接上传存档
上传文件时请不要修改后缀
关于存档说明详见https://milthm.fandom.com/wiki/Configuration_File

<h3>各平台存档路径:</h3>
<h4>Android(taptap)</h4>
/sdcard/Android/data/game.taptap.morizero.milthm/files/data/saves.db

<h4>Android(Google)</h4>
/storage/emulated/(userid)/Android/data/com.morizero.milthm/files/

<h4>Windows</h4>
%AppData%\\..\\LocalLow\\Morizero\\Milthm\\

<h4>macos</h4>
~/Library/Application Support/Morizero/Milthm/

<h4>ios</h4>
使用系统的"文件"应用查看找milthm的数据

<h4>Linux</h4>
~/.config/unity3d/Morizero/Milthm/

<h3>教程见375882310  
欢迎进群讨论</h3>
<hr/>
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


<h3>手输格式如下</h3>
Manual input format is as follows

<code>
[name],{
  [Contrasty Angeles,CL,12.3,1010000,1.0000,0],
  [name,Difficulty, constant, score,acc,leavel]
}
</code>

leavel:0=R,1=AP,2=FC,3=S,4=A ……

<h3>存档模板/Save file template</h3>

<code>
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
  </code>
Copyleft 2024~2025. Reality Calculator Project.
      </div></div>`
    });
}

function qqbot_ua(){
  layer.open({

    type: 1,
    title: '提示',
    shadeClose: true,
    shade: 0.8,
    area: ['40%', '20%'],
    content: '<h3 style="padding:6px;">QQBot 不可用</h3>'

  });
}