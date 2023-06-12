<?php
   include_once 'verificacao.php';


function getSeguidor($classLog){
    $Seguindo = 
    $classLog->Count('ID_seguir', 'seguir', ["user_FK = ".$_GET['userPerfil']." and seguidor_FK =".$_SESSION['ID_user']]);
    return $Seguindo;
}

function renderDados($classLog){
    $dados = getSeguidor($classLog);
    if(
        isset($_SESSION['ID_user']) && !empty($_SESSION['ID_user']) && $_SESSION['ID_user'] == $_GET['userPerfil']
    ):
        return "";        
    else: 
     if($dados > 0): 
        return "<button class='botao_seguir-borda' id='seguir'>Seguindo</button>";
     else: 
        return "<button class='botao_seguir' id='seguir'>Seguir</button>";
     endif; 
 endif; 
}

function clickSeg($classLog){
    $UserLog = $classLog->findUser([" ID_user =".$_SESSION['ID_user']]);
    $conteudoNOT = " começou a te seguir";
    $URLNOT = "perfil.php?user=".$_SESSION['ID_user'];

    $dados = getSeguidor($classLog);
    global $pdo;
    if($dados > 0){

        $ComandoSQL = "DELETE FROM seguir WHERE user_FK = :user and seguidor_FK = :sgr limit 1";
            $conn = $pdo->prepare($ComandoSQL);
            $conn->bindValue(":user",$_GET['userPerfil']);
            $conn->bindValue(":sgr", $_SESSION['ID_user']);
            $conn->execute();
        return;

    } else{

        $ComandoSQL = "INSERT INTO seguir (user_FK, seguidor_FK) VALUES (:user, :sgr) limit 1";
            $conn = $pdo->prepare($ComandoSQL);
            $conn->bindValue(":user", $_GET['userPerfil']);
            $conn->bindValue(":sgr", $_SESSION['ID_user']);
            $conn->execute();

            $classLog->insertNot(
                0,
                8, 
                $UserLog['nome'], 
                $UserLog['foto'], 
                $conteudoNOT,
                $URLNOT, 
                $classLog->getTimeNow(), 
                $_GET['userPerfil'], 
                $_SESSION['ID_user']
              );
        return;
    }
}

if(isset($_GET['segclick']) && $_GET['segclick'] == 'on'){
    clickSeg($classLog);
    echo renderDados($classLog); exit;
}

if(isset($_GET['action']) && $_GET['action'] == 'renderSeg'){
  echo renderDados($classLog); exit;
} 




        