<?php

require_once "_conexao/conexao.php";
require_once 'class-log.php';

$classLog = new log();

function getDados($classLog){
    $dados = $classLog->count("IDView", "view", [" capitulo_FK = ".$_GET['cap']." and user_FK =".$_SESSION['ID_user']]);
    return $dados;
}

function activeView($classLog){
    $dados = getDados($classLog);
    global $pdo;
    if($dados > 0){
        return;
    } else{

        $ComandoSQL = "INSERT INTO view (user_FK, capitulo_FK) VALUES (:user, :cap) limit 1";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":user", $_SESSION['ID_user']);
        $conn->bindValue(":cap", $_GET['cap']);
        $conn->execute();
        return;
    }
}

if(isset($_GET['viewclick']) && $_GET['viewclick'] == 'on'){
    activeView($classLog);
}





