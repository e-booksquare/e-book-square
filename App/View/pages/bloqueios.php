<?php
include_once '../../Model/verificacao.php';
$blockedUsers = $classLog->findAll(["B_user_FK"], "bloqueio", [" WHERE user_FK = ".$_SESSION['ID_user']]);
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
    <link rel="stylesheet" href="../assets/CSS/bloqueios.css">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Configuração | E-BOOK SQUARE</title>
</head>
<body>
    <?php include_once 'header.php'; ?>
        <main>
            <nav class="navegacao">
                <ul>
                    <a href="conta.php"><li class="opcao">Conta</li></a>
                    <a href="notificacao.php"><li class="opcao ">Notificações</li></a>
                    <a href="bloqueios.php"><li class="opcao selecionado">Lista de bloqueados</li></a>
                </ul>
            </nav>

            <section class="config">
                <div class="container_icon">
                    <a href="notificacao.php"><img class="icone_not" src="../assets/IMAGENS/Imgem_notificacao.svg"></a>
                </div>
                <div class="informacoes">
                   <p class="titulo_block">Usuários bloqueados</p>
                   <p class="letras_miudas_block">(Usuários bloqueados não poderão interagir com você)</p>
                   <table class="lista_blocks">
                    <?php  
                       if(! empty($blockedUsers)){
                       foreach($blockedUsers as $value){  
                        $blockedUser = $classLog->find(["codigo, foto"], "usuario", [" WHERE ID_user = ".$value['B_user_FK']]);
                        ?>
                            

                        <tr>
                            <td>
                                <div class="container_usuario_block">
                                    <img src="../assets/IMAGENS/icone_usuario.svg">
                                    <span><?=$blockedUser['codigo'];?></span>
                                    <span class="tirar_block"> <img src="../assets/IMAGENS/tirar_block.svg" alt=""> </span>
                                </div>
                            </td>
                        </tr>
                        <?php  }} else{ echo "Não existem usuários bloqueados em sua conta"; }  ?>
                        <tr>
                            <td>
                                <div class="container_usuario_block">
                                    <img src="../assets/IMAGENS/icone_usuario.svg">
                                    <span>@sifudiasnomore</span>
                                    <span class="tirar_block"> <img src="../assets/IMAGENS/tirar_block.svg" alt=""> </span>
                                </div>
                            </td>
                        </tr>
                   </table>
                </div>
                <div class="botao_salvar_div">
                    <button class="botao_salvar" type="submit">SALVAR</button>
                </div>
            </section>
        </main>
        <?php include_once 'footer.php'; ?>
        <script src="../assets/JAVASCRIPT/header.js"></script>
</body>
</html>