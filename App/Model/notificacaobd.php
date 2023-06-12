<?php 
require_once "_conexao/conexao.php";
require_once 'class-log.php';

$classLog = new log();

function getNumberOfNot($classLog){
    $quantityNot = $classLog->Count('IDNOT', 'notificacao', [" activeNOT = 1 AND destinatario_FKNOT = ".$_SESSION['ID_user']]);
    if($quantityNot == 0) {return;}
    echo "<span>$quantityNot</span>";
}
function deactivateNot($classLog){
    global $pdo;
    $ComandoSQL = "UPDATE notificacao SET activeNOT = 0 WHERE destinatario_FKNOT = ".$_SESSION['ID_user'];
    $pdo->query($ComandoSQL);
    return;
}

function DeleteNot($classLog){
    global $pdo;
        $IDsNot = $_POST['IDNOT_CHK'];
        foreach ($IDsNot as $value) {
            $IDNOT_EXC = (int)$value;
            $ComandoSQL = "DELETE FROM notificacao WHERE IDNOT = $IDNOT_EXC";
            $pdo->query($ComandoSQL);
        } 
       

    return;
}

if(isset($_POST['renderNot']) && $_POST['renderNot'] == 7){
    getNumberOfNot($classLog);
    exit;
}

if(isset($_POST['renderNot']) && $_POST['renderNot'] == 8){
    deactivateNot($classLog);
    exit;
}

if(isset($_POST['renderNot']) && $_POST['renderNot'] == 'renderNotList'){
    $classLog->findNotAll($_POST['conta_obra']);
    exit;
}

if(isset($_POST['delNot']) && $_POST['delNot'] == TRUE){
    DeleteNot($classLog);
    exit;
}



