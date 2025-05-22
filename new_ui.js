
var new_ui_js_ver = 2
var authors_dialog;
function show_author_info() {
  // layer.open({
  //   type: 2,
  //   area: ['90%', '90%'],
  //   title: '作者信息',
  //   shade: 0.6, // 遮罩透明度
  //   shadeClose: true, // 点击遮罩区域，关闭弹层
  //   maxmin: false,
  //   anim: 0, // 0-6 的动画形式，-1 不开启
  //   content: `./authors.html`,
  //   offset: ['32px']
  // });
  authors_dialog = layer.open({
    type: 1,
    title: '作者信息',
    content: '<div id="Authors_content" style="padding:32px"></div>',
    area: ['80vw', '80vh'],
    shade: 0.6
  });
  var loading = layer.load(1);
  try {
    fetch('authors.txt').then(res => res.text()).then(data => {
      layer.close(loading);
      document.getElementById("Authors_content").innerHTML = `<pre>${data}</pre><hr><button class="layui-btn layui-btn-normal" onclick="layer.close(authors_dialog)">关闭</button>`
    })
  } catch (e) {
    layer.close(loading);
    layer.msg("Error / 出现错误，请检查网络连接。");
  }
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
function show_alertInfo() {
  layer.open({
    type: 1,
    title: '使用须知',
    content: `<div id="show_alertInfo_content_" style="padding:32px"><pre>使用本项目（MilthmCalc）的在线服务（https://mhtlim.top），则表示你已知晓：

1、我们不是Milthm官方，也和Milthm官方无关。
2、我们致力于提供一个安全、便捷的工具来帮助用户计算Milthm Reality，但用户需自行承担使用本服务过程中可能面临的风险。（针对云存档而言，例如账号密码过于简单而被盗，或忘记密码但没设置密保内容导致的损失等。）
3、我们非常重视用户的隐私保护，所有用户输入的密码均会通过Hash算法进行加密存储，以确保数据的安全性。然而，由于网络环境的复杂性，我们无法排除网络中间人攻击的可能性。因此，用户在使用本服务时，应确保网络连接的安全性，避免在公共Wi-Fi等不安全的网络环境下操作。（密码虽然会加密储存，但仍然采用明文传输。）
4、用户在使用本服务过程中，应确保上传的数据（如游戏存档等）均为合法获取且拥有使用权限，不得上传任何侵犯他人版权或包含非法内容的文件。
5、本服务可能会因技术维护、服务器故障或其他不可抗力因素而暂时中断或无法使用。我们会在第一时间努力恢复服务，但不对由此给用户带来的不便或损失承担法律责任。
6、用户在使用本服务时，应遵守相关法律法规以及本服务的使用条款。若用户违反上述规定，我们有权终止其使用权限，并保留追究相关责任的权利。
7、本服务可能会根据用户反馈和技术发展进行更新和改进。我们会在网站上及时发布更新信息，用户应关注并及时了解相关变化。</pre>
<hr>
<button class="layui-btn layui-btn-normal" onclick="layer.closeAll()">关闭</button></div>
</div>`,
    area: ['80vw', '80vh'],
    shade: 0.6,
    shadeClose: true
  })
}

// for API
function apiAuth(path, username, token, customParams, afterLoginFailed, afterOpFailed, afterSuccess, afterError, final) {
  var loading = layer.load(1);
  try {
    fetch(path, {
      method: "POST",
      body: new URLSearchParams({
        username: username,
        token: token,
        ...customParams
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

function updateSD() {
  apiAuth('user/getSecurityDesc.php', getStorage("username"), getStorage("token"), {}, () => { }, (e) => { layer.msg(e.msg); }, (e) => {

    if (e.authInfo === null) {
      layer.msg("未设置安全验证信息。")
    }
    document.getElementById("_securityDesc_content").innerHTML = `<a class="superlinkR" onclick="layer.closeAll()" href='javascript:void(0);'>关闭</a>&nbsp;&nbsp;&nbsp;<a class="superlinkR" href='javascript:void(0);' onclick="securityDesc_edit()">修改</a><hr>你可以填写用于重置密码的安全验证方案，例如写你的qq号、邮箱、微信号，甚至是简单的密保问题。后续需要找回时找站点管理员处理即可。<hr>密保信息:<hr><pre id="_securityDesc_content_pre">${e.authInfo}</pre>`

  }, (e) => { layer.msg(e.msg); });
}
function securityDesc() {
  layer.open({
    type: 1,
    title: '账号安全验证信息',
    content: `<div id="_securityDesc_content" style="padding:32px">请稍等...</div>`,
    area: ['80vw', '80vh'],
    shade: 0.6,
    shadeClose: true
  })
  updateSD();
}
var securityDesc_edit_dialog;
function securityDesc_edit() {
  securityDesc_edit_dialog = layer.open({
    type: 1,
    title: '修改账号安全验证信息',
    content: `<div id="_securityDesc_edit_content" style="padding:32px">请稍等...</div>`,
    area: ['80vw', '80vh'],
    shade: 0.6,
    shadeClose: true
  })
  document.getElementById("_securityDesc_edit_content").innerHTML = `你可以填写用于重置密码的安全验证方案，例如写你的qq号、邮箱、微信号，甚至是简单的密保问题。后续需要找回时找站点管理员处理即可。<hr><textarea id="securityDesc_edit_textarea" style="width:100%;height:40vh" class="layui-textarea textareaR"></textarea><hr><button class="layui-btn layui-btn-normal" onclick="securityDesc_edit_save()">覆盖并保存</button><button class="layui-btn layui-btn-normal" onclick="layer.close(securityDesc_edit_dialog)">取消修改</button>`
  document.getElementById("securityDesc_edit_textarea").value = document.getElementById("_securityDesc_content_pre").innerHTML
}
function securityDesc_edit_save() {
  if (document.getElementById("securityDesc_edit_textarea").value.length > 2000) {
    layer.msg("内容过长，请限制在2000字以内。");
    return;
  }

  apiAuth('user/setSecurityDesc.php', getStorage("username"), getStorage("token"), { securityDesc: document.getElementById("securityDesc_edit_textarea").value }, () => { }, (e) => { layer.msg(e.msg); }, (e) => {
    layer.msg(e.msg);
    layer.close(securityDesc_edit_dialog);
    updateSD()
  }, (e) => { layer.msg(e.msg); });
}

function open_changelog() {
  layer.open({
    type: 1,
    title: 'ChangeLog / 更新日志',
    content: '<div id="cl_content" style="padding:32px"></div>',
    area: ['80vw', '80vh'],
    shade: 0.6
  });
  var loading = layer.load(1);
  try {
    fetch('changelog.txt').then(res => res.text()).then(data => {
      layer.close(loading);
      document.getElementById("cl_content").innerHTML = `<pre>${data}</pre><hr><button class="layui-btn layui-btn-normal" onclick="layer.closeAll()">关闭</button>`
    })
  } catch (e) {
    layer.close(loading);
    layer.msg("Error / 出现错误，请检查网络连接。");
  }

}