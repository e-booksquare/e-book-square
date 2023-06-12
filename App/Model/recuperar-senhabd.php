<?php
require __DIR__ . '../../../vendor/autoload.php';

use \App\Model\Comunicacao_emai\Email;


if( $_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['email']) && !empty($_POST['email']))
{
    
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
  
 
    include_once "_conexao/conexao.php";
    include_once "class-log.php";

    $classLog = new log();

    if($classLog->recuperar_senha($email) == true){
        $dadosUser = $classLog->select_user($email);
        $token = $dadosUser['recuperar_senha'];

        $_SESSION['msg'] = "http://localhost/e_book_square/App/View/pages/atualizar-senha.php?token=$token";
        

            // $titulo = "Recuperação de senha";
            // $email = $dadosUser['email'];
            // $nome = $dadosUser['nome'];
            // $conteudo = "Aqui está seu link de recuperação de senha: <br> $linkRecuperacao <br>";

            // header("location: enviar-email.php?email=$email&nome=$nome&titulo=$titulo&conteudo=$conteudo");

            header("location: ../View/pages/recuperar-senha.php");
            exit();
        } else{
            $_SESSION['msg'] = "<p>Error: Email não encontrado</p>";
            header("location: ../View/pages/recuperar-senha.php");
            exit();
        }

    }          
else
{
    header("location: ../View/pages/recuperar-senha.php");
    exit();
}

