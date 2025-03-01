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
      type: 2, 
      area: ['80%', '90%'],
      title: '使用说明',
      shade: 0.6, // 遮罩透明度
      shadeClose: true, // 点击遮罩区域，关闭弹层
      maxmin: false,
      anim: 0, // 0-6 的动画形式，-1 不开启
      content: `./usage.html`
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


function alert_invalid(){
  layer.open({
    type: 1,
    title: '提示',
    shadeClose: true,
    shade: 0.8,
    area: ['40%', '20%'],
    content: '<h3 style="padding:12px;">存档数据无效或无法解析。</h3>'
  });
}