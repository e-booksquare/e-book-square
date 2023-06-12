<?php

if (
    $_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['senha']) && !empty($_POST['senha'])
) {
    // INFORMAÇÕES VINDAS DO CADASTRO
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // DATA CADASTRO
    date_default_timezone_set('America/Sao_Paulo');
    $data_cad = date('Y-m-d');

    include_once "_conexao/conexao.php";
    include_once "class-log.php";

    $classLog = new log();

    if ($cadastrar = $classLog->cadastrar_Usuario($nome, $email, $senhaHash, $data_cad) == true) {

        header("location: ../View/pages/login.php");
        exit();
    } else {
        header("location: ../View/pages/cadastro.php");
        exit();
    }
} else {
    header("location: ../View/pages/cadastro.php");
    exit();
}