<?php
include "fc.php";
try {
    $data = json_decode(file_get_contents("php://input"), true); //获取POST数据
    $qq = $data['qq'];
    $data = $data['data'];
} catch (Exception $e) {
    http_response_code(400);
    echo "400 Bad Request Content is not json";
    exit;
}
$qq = trim($qq);
$data = trim($data);
if ($qq == "" || $data == "") {
    http_response_code(400);
    echo "400 Bad Request Content is empty";
    exit;
}
if (strlen($qq) > 15 || strlen($data) > 100000) {
    http_response_code(413);
    echo "413 Payload Too Large";
    exit;
}
if (!strpos($data, "{") === 0) {
    http_response_code(400);
    echo "400 Bad Request Content is not JSON";
    exit;
}
$qq = substr($qq, 0, 15);
$data = substr($data, 0, 100000);
// $qq=htmlspecialchars($qq);
// $data=htmlspecialchars($data);

$pdo = dbc();
$uuid = uuid();
// $ip=$_SERVER['REMOTE_ADDR'];
// try{
// $ip=getallheaders()['X-Real-Ip'];
// }catch(Exception $e){
// $ip=$_SERVER['REMOTE_ADDR'];
// }
if (isset($_SERVER['HTTP_X_REAL_IP'])) {
    $ip = "O:" . $_SERVER['REMOTE_ADDR'] . ' X:' . $_SERVER['HTTP_X_REAL_IP'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$time = date("Y-m-d H:i:s");
$sql = "insert into cha_db (uuid, qqid, ip, time, data) values (?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$uuid, $qq, $ip, $time, $data]);
http_response_code(201);
echo "201 Created";
//echo "uuid: $uuid";
//echo "qq: $qq";
//echo "ip: $ip";
//echo "time: $time";
//echo "data: $data";
