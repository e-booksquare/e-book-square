<?php
include_once '../../Model/verificacao.php';
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
    <link rel="stylesheet" href="../assets/CSS/conta.css">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Configuração | E-BOOK SQUARE</title>
</head>
<body>
<?php include_once 'header.php'; ?>

        <main id="main main_conta">
       

            <nav class="navegacao">
                <ul>
                    <a href="conta.php"><li class="opcao selecionado">Conta</li></a>
                </ul>
            </nav>

            <section class="config">
            <form action="" method="post">
                <div class="informacoes">
                    <p><span class="texto_topicos">Nome de usuário: </span><input type="text" name="nome_usuario" id="nome_usuario" value="<?= $dados_usuario['nome'];?>"></p>
                    <p><span class="texto_topicos">Chave pix: </span><input type="text" name="chave_pix" id="chave_pix" value="<?= $dados_usuario['chavePix'];?>"></p>
                    <p><span class="texto_topicos">E-mail: </span><input type="email" name="email_usuario" id="email_usuario" value="<?= $dados_usuario['email'];?>"></p>
                    <p><span class="texto_topicos">Senha: </span><input type="password" name="senha_usuario" id="senha_usuario" value="**********"></p>
                    <p><span class="texto_topicos">Idioma: <span></span>
                        <select class="idioma" name="idioma" id="idioma">
                            <option value="Portugues">Português</option>
                        </select>
                    </p>
                </div>
                <div class="botao_salvar_div">
                    <button class="botao_salvar" type="submit">SALVAR</button>
                </div>
                </form>
            </section>
            <a href="#" onclick="AbrirModalExcluir()" class="excluir">Excluir conta</a>
        </main>

        <div class="ModalExcluir" id="ModalExcluir">
            <div class="ContainerModal">
                <p>Realmente deseja excluir a sua conta, sua conta e todas as suas obras serão apagadas permanentemente</p>
                <div id="btnsAction">
                    <button onclick="CancelarModalExcluir()"class="BotaoCancelar" >Cancelar</button>
                    <form action="../../Model/deletar-usuariobd.php?deluser=1" method="post">
                        <button class="BotaoExcluir" type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        </div>


        <?php include_once 'footer.php'; ?>
        <script src="../assets/JAVASCRIPT/header.js"></script>
</body>

<script>
    function AbrirModalExcluir(){
        document.querySelector("#ModalExcluir").style.display = "inline-block";
        document.querySelector("#header").classList.add("filtro");
        document.querySelector("#footer").classList.add("filtro");
        document.querySelector("#main").classList.add("filtro");
    }
    function CancelarModalExcluir(){
        document.querySelector("#ModalExcluir").style.display = "none";
        document.querySelector("#header").classList.remove("filtro");
        document.querySelector("#footer").classList.remove("filtro");
        document.querySelector("#main").classList.remove("filtro");
    }
</script>
</html>