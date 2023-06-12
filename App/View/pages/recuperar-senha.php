<?php
session_start();
include_once "../../Model/class-log.php";
// if(isset($_SESSION['ID_user']) || !empty($_SESSION['ID_user']))
//     {header("location: home.php"); exit();}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de senha | E-Book Square</title>
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/login.css">
    <link rel="stylesheet" href="../assets/CSS/responsividade_cadastrar_e_login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>

<body>
    <main>

        
        <form action="../../Model/recuperar-senhabd.php" method="post">
            <div class="container" style="padding: 70px 0">
                <h1 class="titulo">Recuperação de senha</h1>
                <p style="text-align: center; font-size: 13px; margin: -50px 0 40px">(Digite seu email para trocar a senha)</p>
                <div class="conteudo">
                    <div>
                        <div class="entrada entrada_email">
                            <input type="email'" name="email" placeholder="Digite seu email" autofocus>
                        </div>

                        <div class="botao_login">
                            <button type="submit">Recuperar</button>
                        </div>
                    </div>
                            <p style="text-align:center; font-size: 13px; margin: 30px 0">
                                Lembrou a senha? 
                                <a href="login.php">Clique aqui</a>
                            </p>
                    </div>
                </div>
            </div>
        </form>

        <?php if (!empty($_SESSION['msg'])) { ?>

        <div class="login_error">
            <?= $_SESSION['msg']; unset($_SESSION['msg']);?>
        </div>
        <?php } ?>

        <?php if (!empty($_SESSION['recuperar'])) { ?>

        <div class="login_error">
            <?= $_SESSION['recuperar']; unset($_SESSION['recuperar']);?>
        </div>
        <?php } ?>
        

        <div class="ao_Lado">
            <img class="imagem_lado" src="../assets/IMAGENS/livros.jpg" alt="">
            <div class="marca_texto">
                <div class="barra"></div>
                <div class="triangulos">
                    <div class="triangulo-para-direita"></div>
                    <div class="triangulo-para-esquerda"></div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>