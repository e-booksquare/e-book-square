<?php
header('Content-type: application/json; charset=utf-8');

include_once '_conexao/conexao.php';
include_once 'class-log.php';

$classLog = new log();

if (isset($_POST['IDUserChat']) && !empty($_POST['IDUserChat'])) {

    unset($_SESSION['IDUserChat']);

    
    $_SESSION['IDUserChat'] = $_POST['IDUserChat'];
    $IDUserChat = $_POST['IDUserChat'];
    $IDUserSession = $_SESSION['ID_user'];
    
    $userData = $classLog->findUser([" ID_user = $IDUserChat"]);
    $fotoUser = $classLog->ifProfileImgExist($userData['foto'], null);

    $dataUserChat = array();
    $dataUserChat['id_usuario'] = $IDUserChat;
    $dataUserChat['foto'] = $fotoUser->imgUser;
    $dataUserChat['nome'] = $userData['nome'];

    echo json_encode($dataUserChat);

    exit;
}

