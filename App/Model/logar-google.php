<?php

    //AUTOLOAD DO COMPOSER
    require __DIR__.'..\..\..\vendor\autoload.php';

    //DEPENDENCIAS
    use Google\Client as GoogleClient;

    // var_dump($_POST); exit;

    // VERIFICA OS CAMPOS OBRIGATORIOS 
    if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token']))
    {
        header('location: ../View/pages/login.php');
        exit;
    }

    // COOKIE CSRF
    $cookie = $_COOKIE['g_csrf_token'] ?? '';

    // VERIFICA O VALOR DO COOKIE E DO POST PARA O CSRF
    if($_POST['g_csrf_token'] != $cookie)
    {
        header('location: ../View/pages/login.php');
        exit;
    }

    // VALIDACAO SECUNDARIA DO TOKEN
    $client = new GoogleClient(['client_id' =>'291074043209-ptprkeu8hh2ptmknjlgqoojh5q09r81m.apps.googleusercontent.com']);  
    $payload = $client->verifyIdToken($_POST['credential']);
    if (isset($payload['email'])) {

        include_once "_conexao/conexao.php";
        include_once "class-log.php";
    
        $classLog = new log();

        $emailGoogle = $payload['email'];
        
        if ($logarGoogle = $classLog->logar_Usuario_Google($emailGoogle) == true) {
            if(isset($_SESSION['ID_user']))
            {
                header("location: ../View/pages/Perfil.php");
                exit();
            }
            else
            {
                header("location: ../View/pages/login.php");
                exit();
            }
        } 
        else 
        {
            header("location: ../View/pages/login.php");
            exit();
        } 

}