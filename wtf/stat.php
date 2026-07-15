<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'code' => 503,
    'msg' => '本站已处于归档状态，访问统计不可用。',
    'data' => ['data' => ['code' => 503, 'msg' => '归档站点']],
], JSON_UNESCAPED_UNICODE);