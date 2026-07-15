<?php
/**
 * Site is archived — no MySQL connection.
 * Login, cloud saves, and visit statistics are disabled.
 */
if (
    ($_SERVER['REMOTE_ADDR'] ?? '') === '127.0.0.1'
    && getenv('MHTLIM_ALLOW_LOCALHOST') !== '1'
) {
    die("Fuck you!");
}

function dbc()
{
    throw new RuntimeException('Database disabled: site archived.');
}

function query($pdo, $sql)
{
    throw new RuntimeException('Database disabled: site archived.');
}

function fetch($pdo, $sql)
{
    throw new RuntimeException('Database disabled: site archived.');
}

function execute($pdo, $sql)
{
    throw new RuntimeException('Database disabled: site archived.');
}

function redirect($url)
{
    header("Location: $url");
    exit();
}

function uuid()
{
    $chars = md5(uniqid(mt_rand(), true));
    $uuid = substr($chars, 0, 8) . '-'
        . substr($chars, 8, 4) . '-'
        . substr($chars, 12, 4) . '-'
        . substr($chars, 16, 4) . '-'
        . substr($chars, 20, 12);
    return $uuid;
}