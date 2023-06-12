<?php

include_once "_conexao/conexao.php";
include_once "class-log.php";

$classLog = new log();

$IDUserSession = $_SESSION['ID_user'];
$usersDataList = $classLog->chatItemDataList();


foreach ($usersDataList as $key => $value) {

    if($value['outgoing_msg_id'] != $_SESSION['ID_user']){
        $IDUserFromDataList = $value['outgoing_msg_id'];
        $whoseMessageIsIt = "";
    }

    if($value['incoming_msg_id'] != $_SESSION['ID_user']){
        $IDUserFromDataList = $value['incoming_msg_id'];
        $whoseMessageIsIt = "Você: ";
    }

    $msg = $classLog->CharsLimit($value['msg'], 37);
    $recentMsg = $whoseMessageIsIt.$msg;
    $IDUserChat = $value['outgoing_msg_id'];

    $userData = $classLog->findUser([" ID_user = $IDUserFromDataList"]);
    $fotoUser = $classLog->ifProfileImgExist($userData['foto'], null);
    $dataTime = $classLog->getTempoPassados($value['created_at']);
    $unSeen = $classLog->Count(
        'msg_id',
        'messages',
        [" view = 0 AND outgoing_msg_id = {$IDUserChat} AND incoming_msg_id = {$IDUserSession}"]
    );

    echo getChatListStructure($IDUserFromDataList, $userData, $fotoUser->imgUser, $recentMsg, $dataTime, $unSeen);
}
exit;


function getChatListStructure($IDUserFromDataList, $userData, $fotoUser, $recentMsg, $dataTime, $unSeen){

    $nome = $userData['nome'];
    $aspa = '"';
    $notChat = "";
    if($unSeen != 0){
        $notChat = "<div class='divNotify'>
                        <span class='numberNotify'>$unSeen</span>
                    </div>";
    }

    $result = "<div class='itemChatList' data-id='$IDUserFromDataList'>
                    <div class='profileImageBoxItem'>
                        <img src='$fotoUser' alt=''>
                    </div>
                    <div class='contentItem'>
                        $notChat
                        <span class='nameUserItem'>$nome</span>
                        <p class='messageUserItem'>$aspa $recentMsg $aspa</p>
                        <span class='dateTimeUserItem'>$dataTime</span>
                    </div>
                </div>";

    return $result;
}