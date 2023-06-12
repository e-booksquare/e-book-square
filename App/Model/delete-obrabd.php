<?php
require_once "_conexao/conexao.php";
require_once 'class-log.php';

$classLog = new log();

if($_GET['obra']){
    $obrasCapa = $classLog->Obra($_GET['obra']);
}

$pasta = "../View/assets/IMAGEM_USUARIO/";

if(isset($_SESSION['ID_user']))
{

    if(isset($obrasCapa['foto_obra']) && !empty($obrasCapa['foto_obra']))
    {
        $fotoDeleteFromBD = $obrasCapa['foto_obra'];
        unlink($pasta.$fotoDeleteFromBD);
    }

    $SQL = "DELETE FROM obra WHERE ID_obra = :ob and user_FK = :user LIMIT 1";
    $conn = $pdo->prepare($SQL);
    $conn->bindValue(":user", $_SESSION['ID_user']);  
    $conn->bindValue(":ob", $_GET['obra']);
    $conn->execute();
    
    header("location: ../View/pages/biblioteca-usuario.php?user=".$_SESSION['ID_user']);
    die();
}

echo "erro1";
    
