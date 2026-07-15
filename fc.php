<?php
if (
    ($_SERVER['REMOTE_ADDR'] ?? '') === '127.0.0.1'
    && getenv('MHTLIM_ALLOW_LOCALHOST') !== '1'
) {
    die("Fuck you!");
}

function dbc()
{
    $host = getenv('MYSQL_HOST') ?: 'klms.local';
    $dbname = getenv('MYSQL_DATABASE') ?: 'k9lv';
    $user = getenv('MYSQL_USER') ?: 'k9lv';
    $pass = getenv('MYSQL_PASSWORD') ?: 'kMPnhPYT4R6bheXW';
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $host, $dbname);
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function query($pdo, $sql)
{
    return $pdo->query($sql);
}

function fetch($pdo, $sql)
{
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function execute($pdo, $sql)
{
    return $pdo->exec($sql);
}

function redirect($url)
{
    header("Location: $url");
    exit();
}
function  uuid()
{
    $chars = md5(uniqid(mt_rand(), true));
    $uuid = substr($chars, 0, 8) . '-'
        . substr($chars, 8, 4) . '-'
        . substr($chars, 12, 4) . '-'
        . substr($chars, 16, 4) . '-'
        . substr($chars, 20, 12);
    return $uuid;
}
