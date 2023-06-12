<?php

require_once "_conexao/conexao.php";
require_once 'class-log.php';

$classLog = new log();

function getLikes($classLog){
    $tipo = $_GET['tipo']; // 3
    $IDtipo = $_GET['idtipo'];
    $IDUser = $_SESSION['ID_user'];
  
    $like = $classLog->count("ID_like", "likes", 
    [" feedback = 1 and tipo = $tipo and ID_tipo = $IDtipo and user_FK = $IDUser"]);

    $dislike = $classLog->count("ID_like", "likes", 
    [" feedback = 0 and tipo = $tipo and ID_tipo = $IDtipo and user_FK = $IDUser"]);

    return [$like, $dislike];
}

function getLikesAll($classLog){
    $tipo = $_GET['tipo']; // 3
    $IDtipo = $_GET['idtipo'];
  
    $likeAll = $classLog->count("ID_like", "likes", 
    ["feedback = 1 and tipo = $tipo and ID_tipo = $IDtipo"]);

    $dislikeAll = $classLog->count("ID_like", "likes", 
    ["feedback = 0 and tipo = $tipo and ID_tipo = $IDtipo"]);

    return [$likeAll, $dislikeAll];
}

function renderDados($classLog){

  $dados = getLikesAll($classLog);
  $likeAll = $dados[0];
  $dislikeAll = $dados[1];

  $dados = getLikes($classLog);
  $like = $dados[0];
  $dislike = $dados[1];

  $dislikeDown = "<i class='bi bi-hand-thumbs-down icon' onclick='setDislikeCap()'>$dislikeAll</i>";
  $dislikeDownFill = "<i class='bi bi-hand-thumbs-down-fill icon' onclick='setDislikeCap()'>$dislikeAll</i>";
  $likeUp = "<i class='bi bi-hand-thumbs-up icon' onclick='setLikeCap()'>$likeAll</i>";
  $likeUpFill = "<i class='bi bi-hand-thumbs-up-fill icon' onclick='setLikeCap()'>$likeAll</i>";
  
  if($like > 0){
      return $likeUpFill." ".$dislikeDown;
  } 
  if($dislike > 0){
      return  $likeUp." ".$dislikeDownFill;
  }
  return $likeUp." ".$dislikeDown;
}


function setFeedback($classLog){
  $dados = getLikes($classLog);
  $like = $dados[0];
  $dislike = $dados[1];
  
  global $pdo;
  $tipo = $_GET['tipo']; 
  $IDtipo = $_GET['idtipo'];
  $IDUser = $_SESSION['ID_user'];
  $IDUserObra = $_GET['userobra'];

  $UserLog = $classLog->findUser([" ID_user =".$_SESSION['ID_user']]);
  $capitulo = $classLog->find(['titulo_cap, obra_FK'], 'capitulo', ["WHERE ID_capitulo = $IDtipo "]);
  $ObraUserVisit = $classLog->Obra($capitulo['obra_FK']);
  $conteudoNOT = " curtiu o capítulo '".$classLog->CharsLimit($capitulo['titulo_cap'], 25)."' na obra '".$classLog->CharsLimit($ObraUserVisit['nome_obra'], 25)."'";
  $URLNOT = "perfil.php?user=$IDUser";
        

  if($_GET['method'] == 'like'){
    if($dislike > 0){
      //  Alter dislike to like
      $ComandoSQL = "UPDATE likes SET feedback = 1 WHERE ID_tipo = $IDtipo and tipo = $tipo and user_FK = $IDUser";
    }
    if($like > 0){
      // delete like from table
      $ComandoSQL = "DELETE FROM likes WHERE user_FK = $IDUser and tipo = $tipo and ID_tipo = $IDtipo limit 1";
    } 
    if($dislike == 0 && $like == 0){
      //  insert like from table
      $ComandoSQL = "INSERT INTO likes (user_FK, destinatario_FK, tipo, ID_tipo, feedback) VALUE ($IDUser, $IDUserObra, $tipo, $IDtipo, 1) LIMIT 1";
    }
    if($dislike == 0 && $like == 0 || $dislike > 0){
      $classLog->insertNot(
        1,
        10, 
        $UserLog['nome'], 
        $UserLog['foto'], 
        $conteudoNOT,
        $URLNOT, 
        $classLog->getTimeNow(), 
        $IDUserObra, 
        $_SESSION['ID_user']
      );
    }
    $conn = $pdo->query($ComandoSQL);
    return;
  }

  if($_GET['method'] == 'dislike'){
    if($like > 0){
      //  Alter like to dislike
      $ComandoSQL = "UPDATE likes SET feedback = 0 WHERE ID_tipo = $IDtipo and tipo = $tipo and user_FK = $IDUser";
    }
    if($dislike > 0){
      //  delete dislike from table
      $ComandoSQL = "DELETE FROM likes WHERE user_FK = $IDUser and tipo = $tipo and ID_tipo = $IDtipo limit 1";
    }
    if($dislike == 0 && $like == 0){
      // insert dislike from table
      $ComandoSQL = "INSERT INTO likes (user_FK, destinatario_FK, tipo, ID_tipo, feedback) VALUE ($IDUser, $IDUserObra, $tipo, $IDtipo, 0) LIMIT 1";  
    }

    $conn = $pdo->query($ComandoSQL);
    return;
  }

  return "Error";
}

if(isset($_GET['feedbackclick']) && $_GET['feedbackclick'] == 'on'){
    setFeedback($classLog);
    echo renderDados($classLog); exit;
}

if(isset($_GET['action']) && $_GET['action'] == 'renderLike'){
  echo renderDados($classLog); exit;
} 




   




