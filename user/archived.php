<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'msg' => '本站已处于归档状态，登录及云存档功能不可用，请访问 https://renya.mhtlim.top/',
    'code' => 503,
], JSON_UNESCAPED_UNICODE);