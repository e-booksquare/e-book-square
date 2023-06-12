<?php

require_once "_conexao/conexao.php";
require_once 'class-log.php';

$classLog = new log();

function getAmei($classLog){
    $dados = $classLog->count("ID_amei", "amei", [" obra_FK = ".$_GET['obra']." and user_FK =".$_SESSION['ID_user']]);
    return $dados;
}
function getAmeiAll($classLog){
    $dados = $classLog->count("ID_amei", "amei", [" obra_FK = ".$_GET['obra']]);
    return $dados;
}

function renderDados($classLog){
    // $idobr = $_GET['obra'];
    $dados = getAmei($classLog);
    $dadosAllUsers = getAmeiAll($classLog);
    if($dados > 0){
        return  "<i style='color: black;' class='bi bi-heart-fill icon'>$dadosAllUsers</i> ";
    } else{
        return  "<i style='color: black;' class='bi bi-heart  icon'>$dadosAllUsers</i> ";
    }
}

function clickamei($classLog){

    $UserLog = $classLog->findUser([" ID_user =".$_SESSION['ID_user']]);
    $ObraUserVisit = $classLog->Obra($_GET['obra']);
    $conteudoNOT = " amou sua obra em '".$classLog->CharsLimit($ObraUserVisit['nome_obra'], 25)."'";
    $URLNOT = "perfil.php?user=".$_SESSION['ID_user'];

    $dados = getAmei($classLog);
    global $pdo;
    if($dados > 0){

        $ComandoSQL = "DELETE FROM amei WHERE user_FK = :user and obra_FK = :obr limit 1";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":user", $_SESSION['ID_user']);
        $conn->bindValue(":obr", $_GET['obra']);
        $conn->execute();
        return;

    } else{

        $ComandoSQL = "INSERT INTO amei (user_FK, obra_FK) VALUES (:user, :obr) limit 1";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":user", $_SESSION['ID_user']);
        $conn->bindValue(":obr", $_GET['obra']);
        $conn->execute();
        $classLog->insertNot(
            1,
            9, 
            $UserLog['nome'], 
            $UserLog['foto'], 
            $conteudoNOT,
            $URLNOT, 
            $classLog->getTimeNow(), 
            $ObraUserVisit['user_FK'], 
            $_SESSION['ID_user']
        );
        return;
    }
}

if(isset($_GET['ameiclick']) && $_GET['ameiclick'] == 'on'){
    clickamei($classLog);
    echo renderDados($classLog); exit;
}

if(isset($_GET['action']) && $_GET['action'] == 'renderamei'){
  echo renderDados($classLog); exit;
} 





