<?php
header('Content-type: application/json; charset=utf-8');

include_once '_conexao/conexao.php';
include_once 'class-log.php';

$classLog = new log();

if (isset($_SESSION['IDUserChat']) && !empty($_SESSION['IDUserChat'])) {
    
    if(isset($_POST['msgToSend']) && !empty($_POST['msgToSend'])){

        global $pdo;
        $outgoing_msg_id = $_SESSION['ID_user'];
        $incoming_msg_id = $_SESSION['IDUserChat']; 
        $msg = filter_input(INPUT_POST, 'msgToSend', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        $ComandoSQL = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) 
        VALUES ($incoming_msg_id, $outgoing_msg_id, '$msg')";
        $pdo->query($ComandoSQL);

        exit;

    }

    $IDUserChat = $_SESSION['IDUserChat'];
    $IDUserSession = $_SESSION['ID_user'];

    $ComandoSQL = "UPDATE messages SET view = 1 WHERE outgoing_msg_id = {$IDUserChat} AND incoming_msg_id = {$IDUserSession}";
    $pdo->query($ComandoSQL);

    $userData = $classLog->findUser([" ID_user = $IDUserChat"]);
    $allMessages = $classLog->findAll(
        ['*'],
        'messages LEFT JOIN usuario ON usuario.ID_user = messages.outgoing_msg_id',
        [
            " 
        WHERE (outgoing_msg_id = {$IDUserSession} AND incoming_msg_id = {$IDUserChat})
        OR (outgoing_msg_id = {$IDUserChat} AND incoming_msg_id = {$IDUserSession}) ORDER BY msg_id
        "
        ]
    );


    $mensagens = array();

    foreach ($allMessages as $mensagem) {
        $messa = array();
        $messa['mensagem'] = $mensagem['msg'];
        $messa['data'] = $classLog->getTempoPassados($mensagem['created_at']);
        $messa['id_usuario'] = $mensagem['outgoing_msg_id'];
        $mensagens[] = $messa;
    }

    echo json_encode($mensagens);

    exit;
}