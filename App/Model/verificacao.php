<?php

require_once "_conexao/conexao.php";
require_once 'class-log.php';

if(isset($_SESSION['ID_user']) && !empty($_SESSION['ID_user'])){
    
    $classLog = new log();
    $Obra_Usuario = $classLog->Obra_Usuario($_SESSION['ID_user']);
    $dados_usuario = $classLog->findUser([" ID_user = ".$_SESSION['ID_user']]);
    $categorias = $classLog->categorias();
    $Obras = $classLog->Obras();
    $CapFeed = $classLog->CapFeed();
    $pointsRankUser = $classLog->pointsRankUser($_SESSION['ID_user']);
    $pointsRankAll = $classLog->pointsRankAll();
  
    
    
    if(isset($_GET['user'])){
        $pointsRankUser = $classLog->pointsRankUser($_GET['user']);
        $RankUser = $classLog->RankUser($_GET['user']);
        $ObraUserPerfil = $classLog->Obra_Usuario($_GET['user']);
        $SeguidorUsuarioCount = $classLog->Count('user_FK', 'seguir', ['user_FK = '.$_GET['user']]);
        $ObraCount = $classLog->Count('ID_obra', 'obra', ["user_FK = ".$_GET['user']]);
        $dadosUserPerfil = $classLog->findUser([" ID_user = ".$_GET['user']]);
        $Seguidor = $classLog->Count('user_FK', 'seguir', ["user_FK = ".$_GET['user']." and seguidor_FK =".$_SESSION['ID_user']]);
    }
    
    $url = $_SERVER ["REQUEST_URI"];
} 
// else {
//     header("location: login.php");
//     exit();
// }


