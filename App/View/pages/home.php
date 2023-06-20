<?php
include_once '../../Model/verificacao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="..\assets\IMAGENS\logo-removebg-preview.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../assets/CSS/index.css">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">

    <title>Home | E-Book Square</title>


    

</head>

<body>
    <main>
        <?php include_once 'header.php'; ?>
        <section class="hero">
            <div class="container">
                <div class="content-box">
                    <h1>Olá, somos a E-book <br> Square.</h1>
                    <h2>Uma nova plataforma de histórias indies</h2>
                    <p>
                        A E-book Square tem o objetivo de criar e motivar escritores para que possam explorar suas
                        habilidades e criarem novos mundos de pura imaginação e realismo.
                    </p>

                    <div class="buttons-iniciar">
                        <a href="feed.php">
                            <button id="iniciar-leitura" class="iniciar">
                                Iniciar leitura
                            </button>
                        </a>
                        <a href="pre-criacao.php" id="iniciar-secundário">
                            <button id="iniciar-escrita" class="iniciar">
                                Começar a escrever
                            </button>
                        </a>
                    </div>
                </div>
                <div class="img-hero-box">
                    <img src="../assets/IMAGENS/img-index.png" alt="" id="img-hero">
                </div>
            </div>
        </section>
    </main>
    <?php include_once 'footer.php'; ?>
    <script src="../assets/JAVASCRIPT/header.js"></script>
</body>

</html>