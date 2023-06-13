<?php
include_once '../../Model/verificacao.php';
$activeNotMsg = $classLog->find(["NOTmsg"], "usuario", [" WHERE ID_user = " . $_SESSION['ID_user']]);
$activeNotAtdp = $classLog->find(["NOTatdp"], "usuario", [" WHERE ID_user = " . $_SESSION['ID_user']]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/configuracao.css">
    <link rel="stylesheet" href="../assets/CSS/notificacao.css">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Configuração | E-BOOK SQUARE</title>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <main>

        <nav class="navegacao">
            <ul>
                <a href="conta.php">
                    <li class="opcao">Conta</li>
                </a>
                <a href="notificacao.php">
                    <li class="opcao selecionado ">Notificações</li>
                </a>
                <a href="bloqueios.php">
                    <li class="opcao">Lista de bloqueados</li>
                </a>
            </ul>
        </nav>

        <section class="config">
            <div class="container_icon">
                <a href="bloqueios.php"><img class="icone_not" src="../assets/IMAGENS/Imagem_bloqueio.svg"></a>
            </div>
            <div class="container_icon1">
                <a href="conta.php"><img class="icone_not" src="../assets/IMAGENS/Imagem_conta.svg"></a>
            </div>
            <div class="informacoes">
                <p class="texto_um">Permitir notificações via e-mail</p>
                <input type="checkbox" name="mensagens" id="mensagens"  <?php if($activeNotMsg['NOTmsg']){echo "checked";} ?>><span class="texto_checkbox">Mensagens</span>
                <nav class="lista_notificacao">
                    <ul>
                        <li>Um novo usuário começou a seguir você</li>
                        <li>O usuário que você segue atualizou ou add uma nova história</li>
                        <li>Um usuário curtiu sua história</li>
                    </ul>
                </nav>
                <input type="checkbox" name="atualizar" id="atualizar"  <?php if($activeNotAtdp['NOTatdp']){echo "checked";} ?>><span class="texto_checkbox">Atualizações da
                    plataforma</span>
                <p class="lista_notificacao">Receba novidades da plataforma da EBQ </p>
            </div>
            <div class="botao_salvar_div">
                <button class="botao_salvar" type="submit">SALVAR</button>
            </div>
        </section>
    </main>


    <script src="../assets/JAVASCRIPT/header.js"></script>
    <?php include_once 'footer.php'; ?>
</body>

</html>