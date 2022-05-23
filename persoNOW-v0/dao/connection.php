<?php

$host = 'localhost';
$bd = 'personow';
$user = 'postgres';
$pass = 'bella1011';

try{
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$bd",$user,$pass,[PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION]);
}
catch(PDOException $e){
    die($e->getMessage());
}

?>