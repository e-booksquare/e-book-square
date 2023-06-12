<?php

include_once "_conexao/conexao.php";
include_once "class-log.php";
$classLog = new log();

   // DATA DE MODIFICAÇÃO
   date_default_timezone_set('America/Sao_Paulo');
   $data_cap = date('Y-m-d H:i:s');

if($_POST['submit'] == 'atualizar'){

    $titulo_cap = filter_input(INPUT_POST, 'titulo_historias', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $conteudo = $_POST['conteudo'];
    $obra_FK = filter_input(INPUT_POST, 'obra_FK', FILTER_SANITIZE_NUMBER_INT);

    $SQL = "UPDATE capitulo SET titulo_cap = :titulo, conteudo = :conteudo, updated_at = :data_cap WHERE ID_capitulo = :id";
    $conn = $pdo->prepare($SQL);
    $conn->bindValue(":id", $_POST['IDCap']);
    $conn->bindValue(":titulo", $titulo_cap );
    $conn->bindValue(":conteudo", $conteudo);
    $conn->bindValue(":data_cap", $data_cap);
    if($conn->execute()){
        $classLog->obraModifyDate($obra_FK, $data_cap);
        header("location: ../View/pages/capa_da_obra.php?obra=".$obra_FK);
        die();
    }  
}

if($_GET['method'] == 'remove'){

    $SQL = "DELETE FROM capitulo WHERE ID_capitulo = :cap LIMIT 1";
    $conn = $pdo->prepare($SQL);
    $conn->bindValue(":cap", $_GET['cap']);
    if($conn->execute()){
        $classLog->obraModifyDate($_GET['obra'], $data_cap);
        header("location: ../View/pages/capa_da_obra.php?obra=".$_GET['obra']);
        die();
    }     
}



if (
    $_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['titulo_historias']) && !empty($_POST['titulo_historias'])
    && isset($_POST['conteudo']) && !empty($_POST['conteudo'])
) {
    // INFORMAÇÕES VINDAS DO CADASTRO
    $titulo_cap = filter_input(INPUT_POST, 'titulo_historias', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $conteudo = $_POST['conteudo'];
    $obra_FK = filter_input(INPUT_POST, 'obra_FK', FILTER_SANITIZE_NUMBER_INT);


    if ($cadastrar_cap = $classLog->cadastrar_Cap($titulo_cap, $conteudo, $obra_FK, $data_cap) == true) {
        
        $len_Content = str_word_count($conteudo);
        if($len_Content >= 200){
            $classLog->ADDPointRank();
        }
        $classLog->obraModifyDate($obra_FK, $data_cap);
        header("location: ../View/pages/capa_da_obra.php?obra=".$obra_FK);
        die();
    } else {
        echo "erro etapa 2";
        // header("location: ../View/pages/cadastro.php");
        exit();
    }
} else {
    echo "erro etapa 1";
        // header("location: ../View/pages/cadastro.php");
        exit();
}