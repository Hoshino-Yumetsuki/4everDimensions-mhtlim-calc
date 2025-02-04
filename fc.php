<?php
function dbc(){
    return new PDO("mysql:host=localhost;dbname=k9lv", "k9lv", "kMPnhPYT4R6bheXW");
}

function query($pdo, $sql){
    return $pdo->query($sql);
}

function fetch($pdo, $sql){
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function execute($pdo, $sql){
    return $pdo->exec($sql);
}

function redirect($url){
    header("Location: $url");
    exit();
}
function  uuid()  
{  
    $chars = md5(uniqid(mt_rand(), true));  
    $uuid = substr ( $chars, 0, 8 ) . '-'
            . substr ( $chars, 8, 4 ) . '-' 
            . substr ( $chars, 12, 4 ) . '-'
            . substr ( $chars, 16, 4 ) . '-'
            . substr ( $chars, 20, 12 );  
    return $uuid ;  
}  
?>