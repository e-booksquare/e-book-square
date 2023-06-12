<?php

require_once "_conexao/conexao.php";
require_once 'class-log.php';

$classLog = new log();

function getDados($classLog){
    $dados = $classLog->count("IDFav", "favorito", [" obra_FK = ".$_GET['obra']." and user_FK =".$_SESSION['ID_user']]);
    return $dados;
}

function renderDados($classLog){
    $idobr = $_GET['obra'];
    $dados = getDados($classLog);
    if($dados > 0){
        return  "<i style='color: #d40743;' class='bi bi-bookmark-star-fill icon obr$idobr'></i>";
    } else{
        return  "<i style='color: #d40743;' class='bi bi-bookmark-star icon obr$idobr'></i>";
    }
}

function clickFav($classLog){
    $dados = getDados($classLog);
    global $pdo;
    if($dados > 0){

        $ComandoSQL = "DELETE FROM favorito WHERE user_FK = :user and obra_FK = :obr limit 1";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":user",$_SESSION['ID_user']);
        $conn->bindValue(":obr", $_GET['obra']);
        $conn->execute();
        return;

    } else{

        $ComandoSQL = "INSERT INTO favorito (user_FK, obra_FK) VALUES (:user, :obr) limit 1";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":user", $_SESSION['ID_user']);
        $conn->bindValue(":obr", $_GET['obra']);
        $conn->execute();
        return;
    }
}

if(isset($_GET['favclick']) && $_GET['favclick'] == 'on'){
    clickFav($classLog);
    echo renderDados($classLog); exit;
}

if(isset($_GET['action']) && $_GET['action'] == 'renderFav'){
  echo renderDados($classLog); exit;
} 




