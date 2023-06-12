<?php
 session_start();

$host = "localhost";
$dbname = "e-book_square";
$root = "root";
$senha = "";
$pdo;

try{
    $pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$root, $senha);
}catch(PDOException $e){
    echo "Error database".$e->getMessage().$e->getCode();
}catch(Exception $e){
    echo "Error generic".$e->getMessage().$e->getCode();
}