<?php
require __DIR__ . '../../../vendor/autoload.php';

use \App\Model\Comunicacao_email\Email;


if (
    $_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['nome']) && !empty($_POST['nome'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['titulo']) && !empty($_POST['titulo'])
    && isset($_POST['conteudo']) && !empty($_POST['conteudo'])
) {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    // $email = 'ratsel00h@gmail.com';
// $subject = "Vaga de developer";
// $body = "<b>Hello my master developed</b> <br><br> hi";

    $obEmail = new Email;
    $sucesso = $obEmail->sendEmail($email, $titulo, $conteudo, $nome);

    header("location: ../View/pages/contato.php?email-enviado");
    exit;

} else{
    header("location: ../View/pages/contato.php?email-falha");
    exit;
}
    
 


// if (isset($_GET['email'])) {

//     $nome = $_GET['nome'];
//     $email = $_GET['email'];
//     $titulo = $_GET['titulo'];
//     $conteudo = $_GET['conteudo'];

    

//     $obEmail = new Email;
//     $sucesso = $obEmail->sendEmail($email, $titulo, $conteudo, $nome);

//     $_SESSION['msg'] = 'link para recuperação de senha foi enviado para seu E-mail';
//     header("location: ../View/pages/recuperar-senha.php");
//     exit;


// } else {
//     $_SESSION['msg'] = 'Erro: Não foi possível enviar o email de recuperação, tente novamente';
//     header("location: ../View/pages/recuperar-senha.php");
//     exit;
// }



