<?php

require_once "_conexao/conexao.php";
require_once 'class-log.php';

if(isset($_GET['deluser']) && isset($_SESSION['ID_user']) && $_GET['deluser'] == 1)
{
    
    $classLog = new log();

    $dados_usuario = $classLog->findUser([" ID_user = ".$_SESSION['ID_user']]);
    $obras = $classLog->findAll(['ID_obra'], 'obra', ["WHERE user_FK = ".$_SESSION['ID_user']]);

    $pasta = "../View/assets/IMAGEM_USUARIO/";

    foreach ($obras as $indice => $value){

        $obrasCapa = $classLog->Obra($value['ID_obra']);
        
        if(isset($obrasCapa['foto_obra']) && !empty($obrasCapa['foto_obra']))
        {
            $fotoDeleteFromBD = $obrasCapa['foto_obra'];
            unlink($pasta.$fotoDeleteFromBD);
        }
    } 

    if(isset($dados_usuario['banner']) && !empty($dados_usuario['banner']))
    {
        $fotoDeleteFromBD = $dados_usuario['banner'];
        unlink($pasta.$fotoDeleteFromBD);
    }

    if(isset($dados_usuario['foto']) && !empty($dados_usuario['foto']))
    {
        $fotoDeleteFromBD = $dados_usuario['foto'];
        unlink($pasta.$fotoDeleteFromBD);
    }

    $SQL =  "DELETE FROM usuario WHERE ID_user = :id LIMIT 1";
    $conn = $pdo->prepare($SQL);
    $conn->bindValue(":id", $_SESSION['ID_user']);
    $conn->execute();

    unset($_SESSION['ID_user']);
    session_destroy();

    header("location: ../View/pages/home.php");
    die();
}




echo "Não entrou na primeira condição IF";



