<?php
include "../fc.php";
$start_time = microtime(true);
header('Content-Type: application/json');
$rf = json_encode([]);
try {
    $pdo = dbc();
    $firstDayOfMonth = strtotime(date('Y-m-01 00:00:00'));
    $lastDayOfMonth = strtotime(date('Y-m-t 23:59:59'));
    $sql = "
        SELECT 
            DATE(FROM_UNIXTIME(FLOOR(ms))) AS date, 
            COUNT(*) AS visits 
        FROM 
            cha_stat 
        WHERE 
            FLOOR(ms) BETWEEN :firstDay AND :lastDay 
        GROUP BY 
            DATE(FROM_UNIXTIME(FLOOR(ms)))
        ORDER BY 
            date ASC
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':firstDay', $firstDayOfMonth, PDO::PARAM_INT);
    $stmt->bindParam(':lastDay', $lastDayOfMonth, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($results) > 0) {
        $rf = (["code" => 0, "msg" => "success", "data" => $results]);
    } else {
        $rf = (["code" => -1, "msg" => "没有数据"]);
    }
} catch (PDOException $e) {
    $rf = (["code" => 500, "msg" => $e->getMessage()]);
}
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo json_encode(array("data" => $rf, "time" => $execution_time));
?>