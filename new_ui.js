
var new_ui_js_ver = 1
function show_author_info() {
  layer.open({
    type: 2,
    area: ['90%', '90%'],
    title: '作者信息',
    shade: 0.6, // 遮罩透明度
    shadeClose: true, // 点击遮罩区域，关闭弹层
    maxmin: false,
    anim: 0, // 0-6 的动画形式，-1 不开启
    content: `./authors.html`,
    offset: ['32px']
  });
}

function show_donation() {
  layer.open({
    type: 2,
    area: ['90%', '90%'],
    title: '捐赠',
    shade: 0.6, // 遮罩透明度
    shadeClose: true, // 点击遮罩区域，关闭弹层
    maxmin: false,
    anim: 0, // 0-6 的动画形式，-1 不开启
    content: `./donate.html`,
    offset: ['32px']
  });
}
function show_usage() {
  console.log(window.screen.availWidth)
  layer.open({
    type: 2,
    area: ['90%', "90%"],
    title: '使用说明',
    shade: 0.6, // 遮罩透明度
    shadeClose: true, // 点击遮罩区域，关闭弹层
    maxmin: false,
    anim: 0, // 0-6 的动画形式，-1 不开启
    content: `./usage.html`,
    offset: ['32px']
  });
}

function qqbot_ua() {
  layer.open({

    type: 1,
    title: '提示',
    shadeClose: true,
    shade: 0.8,
    area: ['auto'],
    content: '<h3 style="padding:6px;">QQBot 不可用</h3>',
    offset: ['32px']
  });
}


function alert_invalid() {
  layer.msg("存档数据无效或无法解析。")
}
function genPicDialog() {
  document.getElementById('picgen').style.display = 'block';
}


// User utils
function customEscape(str) {
  return str.replace(/[\x00-\x7F]/g, function (char) {
    return char;
  }).replace(/[\x80-\uFFFF]/g, function (char) {
    const code = char.charCodeAt(0);
    if (code <= 0x7FF) {
      return `%u${code.toString(16).toUpperCase().padStart(4, '0')}`;
    } else {
      return `%u${code.toString(16).toUpperCase().padStart(4, '0')}`;
    }
  });
}

var isSavesGotOnce = false; // 是否已经获取过存档 (Disabled)
var fromIndex = 0;
var count = 0;
var split_c = 3;
function openSavesBrowser() { // 'll be called when the user clicks the button to open the file browser
  var over4lay = document.getElementById('over4lay');
  var savesModal = document.getElementById('savesModal');
  over4lay.style.display = 'block';
  savesModal.style.display = 'block';
}
function closeSavesBrowser() {
  var over4lay = document.getElementById('over4lay');
  var savesModal = document.getElementById('savesModal');
  over4lay.style.display = 'none';
  savesModal.style.display = 'none';
}
function fetch_saves() {
  var loading = layer.load(1);
  c = (count == 0 ? split_c : (count - fromIndex > split_c ? split_c : count - fromIndex));
  apiAuth('user/fetchSaves.php', getStorage("username"), getStorage("token"), { from: fromIndex, to: split_c }, () => {
    closeSavesBrowser();
    isSavesGotOnce = false;
  }, (e) => { layer.msg(e.msg) },
    (e) => {
      mountSaves(e.data);
      count = e.count;
      if (e.data.length == 0 && count > 0) {
        fromIndex = (Math.ceil(count / split_c) - 1) * split_c;
        layer.msg("当前页没有存档，已自动跳转至最后一页。");
        fetch_saves();
        return;
      }
      c = (count == 0 ? split_c : (count - fromIndex > split_c ? split_c : count - fromIndex));
         document.getElementById("saves_count").innerHTML = "Count / 总数：" + e.count + ", Current / 当前：" + fromIndex + "-" + (fromIndex + c);
    }, (e) => { layer.msg(e.msg) }, undefined)
}
function openSavesBrowser_btn() {

  openSavesBrowser();
  if (!isSavesGotOnce) {
    fetch_saves();
    // isSavesGotOnce = true;
  }
}
function decodeR(str) {
  return str
}
function mountSaves(items) {
  if (items.length === 0) {
    var tab = document.getElementById('savesList_sub');
    tab.innerHTML = '<tr><td colspan="5">No saves found / 没有找到存档</td></tr>';
    return;
  }
  var tab = document.getElementById('savesList_sub');
  tab.innerHTML = '';
  // foreach
  for (var i = 0; i < items.length; i++) {
    var item = items[i];
    var tr = document.createElement('tr');
    tr.innerHTML = `
    <td>${decodeR(item.title)}</td>
    <td>${decodeR(item.score)}</td>
    <td>${item.datetime}</td>
    <td><a href="javascript:void(0);" class="action" onclick="javascript:fetch_save('${item.selfid}');">View / 查看</a><a href="javascript:void(0);" class="action delete" onclick="javascript:delete_save('${item.selfid}');">Delete / 删除</a></td>
    <td>${decodeR(item.description)}</td>
    `
    tab.appendChild(tr);
  }
}
function fetch_save(id) {
  apiAuth('user/fetchSave.php', getStorage("username"), getStorage("token"), { id: id }, () => { closeSavesBrowser() }, (e) => { layer.msg(e.msg) }, (e) => {
    layer.msg(e.msg);
    document.getElementById("inputData").value = decodeURIComponent((e.data[0].content));
    startProcess();
  }, (e) => { layer.msg(e.msg) }, closeSavesBrowser)
}
function delete_save_r(id) {
  apiAuth('user/delSave.php', getStorage("username"), getStorage("token"), { id: id }, () => { closeSavesBrowser() }, (e) => { layer.msg(e.msg) }, (e) => {
    layer.msg(e.msg);
    fetch_saves();
  }, (e) => { layer.msg(e.msg) })
}
function delete_save(id) {
  layer.confirm('Are you sure to delete this save? / 你确定要删除这个存档吗？', {
    btn: ['Yes / 是', 'No / 否']
  }, function () {
    delete_save_r(id);
  });
}
function sb_prep() {
  if (fromIndex <= 0) { layer.msg("Already at the beginning / 已经在开头了"); return; };
  fromIndex -= split_c;
  if (fromIndex < 0) fromIndex = 0;
  fetch_saves();
}
function sb_nexp() {
  if (fromIndex + split_c >= count) { layer.msg("No more saves / 没有更多存档了"); return; };
  fromIndex = (fromIndex + split_c) % count;
  fetch_saves();
}

// license
var license_dialog;
function openLicenseAndPrivacy() {
  license_dialog = layer.open({
    type: 1,
    title: 'License & Privacy / 许可证 & 隐私政策',
    content: '<div id="LP_content" style="padding:32px"></div>',
    area: ['80vw', '80vh'],
    shade: 0.6
  });
  var loading = layer.load(1);
  try {
    fetch('licenseAndPrivacy.txt').then(res => res.text()).then(data => {
      layer.close(loading);
      document.getElementById("LP_content").innerHTML = `<pre>${data}</pre><hr><button class="layui-btn layui-btn-normal" onclick="layer.close(license_dialog)">关闭</button>`
    })
  } catch (e) {
    layer.close(loading);
    layer.msg("Error / 出现错误，请检查网络连接。");
  }

}

// for API
function apiAuth(path, username, token, custonParams, afterLoginFailed, afterOpFailed, afterSuccess, afterError, final) {
  var loading = layer.load(1);
  try {
    fetch(path, {
      method: "POST",
      body: new URLSearchParams({
        username: username,
        token: token,
        ...custonParams
      })
    }).then(res => res.json()).then(data => {
      layer.close(loading);
      if (data.code === 0) {
        if (afterSuccess) afterSuccess(data);
      } else if (data.code === -4) {
        loginExpired(function () {
          if (afterLoginFailed) afterLoginFailed(data);
        })
      } else {
        if (afterOpFailed) afterOpFailed(data);
      }
      if (final) final();
    })
  } catch (e) {
    layer.close(loading);
    if (afterError) afterError(e);
    if (final) final();
  }
}
function loginExpired(after) {
  logout();
  initLogging();
  layer.msg("登录已过期，请重新登录。");
  if (after) after();
}