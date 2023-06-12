<?php
include_once '../../Model/verificacao.php';

if ($_GET['obra']) {
    $idObra = $_GET['obra'];
    $capNumberURL = $_GET['cap'];
    $obrasCapa = $classLog->Obra($idObra);
    $capitulos = $classLog->Capitulo($idObra);
    $views = $classLog->Count("IDView", "view", ["capitulo_FK = " . $capitulos[$capNumberURL - 1]['ID_capitulo']]);
    $url = $_SERVER["REQUEST_URI"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/capa_da_obra.css">
    <link rel="stylesheet" href="../assets/CSS/preview.css">
    <link rel="stylesheet" href="../assets/CSS/comentarios.css">
    <link rel="stylesheet" href="../assets/CSS/btn-seguir.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>
        <?= $obrasCapa['nome_obra']; ?> | E-BOOK SQUARE
    </title>
</head>

<body>
    <?php include_once 'header.php'; ?>


    <main>
        <section class="titulo_capitulos">
            <div class="userObra" style="display: flex; align-items: center; gap: 10px;">
                <div class="userOwn">
                    <p style="font-size: 20px;">Autor:</p>
                    <a href="perfil.php?user=<?= $obrasCapa['user_FK']; ?>">
                        <img class="editar_img" src="
                                    <?php if (isset($obrasCapa['foto']) && !empty($obrasCapa['foto'])) { ?>
                                    ../assets/IMAGEM_USUARIO/<?= $obrasCapa['foto']; ?>
                                <?php } else { ?>
                                    ../assets/IMAGENS/blank.jpg
                                <?php } ?>    
                                    " alt="Foto de perfil" name="perfil" id="perfil" width="50" height="50"
                            style="border-radius: 25px;">
                    </a>
                    <a href="perfil.php?user=<?= $obrasCapa['user_FK']; ?>" class="Nome_autor"
                        style="font-size: 20px; color: black;"><?= $obrasCapa['nome']; ?></a>


                    <div class="botao_opcoes Seguir" id="btn_seg_user"></div>
                    <input type="hidden" value="<?= $obrasCapa['user_FK']; ?>" id="idseguir">
                </div>

                <div class="titulo" style="display: flex; align-items: center; gap: 5px">
                    <a href="capa_da_obra.php?obra=<?= $obrasCapa['ID_obra']; ?>">
                        <?= $obrasCapa['nome_obra']; ?> - Capitulo <span name="capitulo" id="capitulo">
                            <?= $capNumberURL; ?>
                        </span></a> |
                    <p> Escrito por: <span>
                            <?= $obrasCapa['nome']; ?>
                        </span></p>
                </div>
                <select class="selecionar_capitulo" id="selecionar_capitulo" onchange="select_cap()">
                    <?php foreach ($capitulos as $indice => $value) {
                        $capNumber = $indice + 1;
                        $tituloCap = $value['titulo_cap'];
                        ?>
                        <option value='<?= $capNumber; ?>' <?php if ($capNumber == $capNumberURL) {
                            echo "selected";
                        } ?>>
                            <?= $capNumber . '- ' . $tituloCap; ?>
                        </option>
                    <?php } ?>
                </select>
                <script>
                    function select_cap() {
                        var select = document.querySelector('#selecionar_capitulo');
                        var valor = select.options[select.selectedIndex].value;

                        redirect(valor)
                    }

                    function redirect(capNumberJS) {
                        window.location.href = `http://localhost/e_book_square/App/View/pages/preview.php?obra=<?= $idObra; ?>&cap=${capNumberJS}`;
                    }
                </script>
                <div class="container_idade_opcoes">
                    <div class="add_favo_denun">

                        <div class="likecap"></div>

                        <div class="views" style="display: flex; align-items: center;">
                            <i class="bi bi-eye-fill icon"></i>
                            (
                            <?= $views; ?>)
                        </div>
                        <a href="#">
                            <i class="bi bi-exclamation-triangle icon"></i>
                        </a>
                    </div>
                </div>
        </section>
        <div class="titulo_cap">
            <p>
                <?= $capitulos[$capNumberURL - 1]['titulo_cap']; ?>
            </p>
        </div>
        <section class="Capitulo">

            <p class="leitura">
                <?= $capitulos[$capNumberURL - 1]['conteudo']; ?> <br><br><br> |
                <?php $len = str_word_count($capitulos[$capNumberURL - 1]['conteudo']);
                echo $len . " palavras"; ?>
            </p>
        </section>
        <div class="pular_cap_Mais_historias">
            <?php if ($capNumber > 1) { ?>
                <div class="pular">
                    <?php if ($capNumberURL > 1) { ?>
                        <a href="preview.php?obra=<?= $idObra; ?>&cap=<?= $capNumberURL - 1; ?>" class="cap"><img
                                src="../assets/IMAGENS/Rectangle 33.png" alt="" onclick="setView()">Anterior</a>
                    <?php } ?>

                    <?php if ($capNumberURL < $capNumber) { ?>
                        <a href="preview.php?obra=<?= $idObra; ?>&cap=<?= $capNumberURL + 1; ?>" class="cap"
                            onclick="setView()">Proximo<img src="../assets/IMAGENS/Rectangle 33 (1).png" alt=""></a>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <p style="text-align: center; color: rgba(0,0,0,0.7);">CAPÍTULO ÚNICO</p>
            <?php } ?>
        </div>

        <section class="comentario">
            <div class="container_escrever_comentario">
                <div class="imagem_nome_span">
                    <div>
                        <img class="ImagemUser_escrever_comentario" src="
                    <?php if (isset($dados_usuario['foto']) && !empty($dados_usuario['foto'])) { ?>
                                    ../assets/IMAGEM_USUARIO/<?= $dados_usuario['foto']; ?>
                                <?php } else { ?>
                                    ../assets/IMAGENS/blank.jpg
                                <?php } ?>  
                    " alt="">
                        <span class="NomeUser_escrever_comentario">
                            <?= $dados_usuario['nome']; ?>
                        </span>
                    </div>
                    <div>
                        <span>Contém spoiler</span>
                        <input type="checkbox" id="chk_spoiler_mega">
                    </div>
                </div>
                <div class="escrever_comentario">
                    <textarea placeholder="Escreva algo sobre o capítulo..." a id="conteudoComentario" cols="30"
                        rows="4"></textarea>
                </div>
                <div class="enviar">
                    <button type="submit" class="enviarCom" id="enviarCom" data-tipo="5">Enviar</button>
                </div>
            </div>

            <div class="resultComentario"></div>
        </section>



        <!-- <section class="botoes_finais">
            <button type="submit" class="botoes_final">Publicar</button>
            <a href="escrever-obra.php"><button class="botoes_final">Editar</button></a>
        </section> -->
    </main>

    <input type="hidden" id="IDCapHidden" value="<?= $capitulos[$capNumberURL - 1]['ID_capitulo']; ?>">
    <input type="hidden" id="IDUserObra" value="<?= $obrasCapa['user_FK']; ?>">

    <?php include_once 'footer.php'; ?>
    <script src="../assets/JAVASCRIPT/header.js"></script>
    <script>


        function tirar_filtro(id) {
            document.querySelector(`#texto${id}`).classList.remove("spoiler");
            document.querySelector(`.ver_comentario_spoiler${id}`).style.display = "none";
        }

        $(".resultComentario, .comentarioCaixa").on("click", ".responder", function () {
            var codeUser = $(this).data('code');
            alert(codeUser)
        })



        // Contabilizar View
        function setView() {
            var IDview = $("#IDCapHidden").val();
            var viewclick = "on";

            $.ajax({
                url: `../../Model/viewbd.php?cap=${IDview}&viewclick=${viewclick}`
            })
        }

        setTimeout(() => {
            var IDview = $("#IDCapHidden").val();
            var viewclick = "on";

            $.ajax({
                url: `../../Model/viewbd.php?cap=${IDview}&viewclick=${viewclick}`
            })
        }, 5000);


        $("#btn_seg_user").on("click", function () {

            var IDSeg = $("#idseguir").val();
            var segclick = "on";

            $.ajax({
                url: `../../Model/seguidor_bd.php?action=renderSeg&userPerfil=${IDSeg}&segclick=${segclick}`,
                success: (btn_seg_user) => $("#btn_seg_user").html(btn_seg_user)
            })
        })

        var IDSeg = $("#idseguir").val();

        // RENDERIZAR DADOS E HTML DO NÍVEL APÓS O CARREGAMENTO DA PÁGINA
        $.ajax({
            url: `../../Model/seguidor_bd.php?action=renderSeg&userPerfil=${IDSeg}`,
            success: (btn_seg_user) => $("#btn_seg_user").html(btn_seg_user)
        })

        // -----------------



        function getLikeCap() {
            var IDcap = $("#IDCapHidden").val();
            var IDUser = $("#IDUserObra").val();
            $.ajax({
                url: `../../Model/likebd.php?action=renderLike&tipo=3&idtipo=${IDcap}&userobra=${IDUser}`,
                success: (caplike) => $(".likecap").html(caplike)
            })
        }
        getLikeCap()

        function setLikeCap() {
            var IDcap = $("#IDCapHidden").val();
            var IDUser = $("#IDUserObra").val();
            $.ajax({
                url: `../../Model/likebd.php?feedbackclick=on&method=like&tipo=3&idtipo=${IDcap}&userobra=${IDUser}`
            })
            getLikeCap()
        }

        function setDislikeCap() {
            var IDcap = $("#IDCapHidden").val();
            var IDUser = $("#IDUserObra").val();
            $.ajax({
                url: `../../Model/likebd.php?feedbackclick=on&method=dislike&tipo=3&idtipo=${IDcap}&userobra=${IDUser}`
            })
            getLikeCap()
        }

        // -------------------

        function getComentario() {
            var ID_tipo = $("#IDCapHidden").val();

            $.ajax({
                url: `../../Model/comentariobd.php?action=renderCmt&tipo=${5}&idtipo=${ID_tipo}`,
                success: (caplike) => $(".resultComentario").html(caplike)
            })
        }
        getComentario()

        $(".resultComentario, .enviar").on("click", ".enviarCom", function () {
            var tipoCom = $(this).data('tipo');
            var IDUser = $("#IDUserObra").val();
            var spoiler = 0;


            if (tipoCom == 5 || tipoCom == 6) {
                if (tipoCom == 5) {

                    var ContentCom = $("#conteudoComentario").val();
                    var ID_tipo = $("#IDCapHidden").val();

                    if ($("#chk_spoiler_mega").is(":checked")) {
                        spoiler = 1
                    }
                }
                if (tipoCom == 6) {
                    var ContentCom = $("#conteudoResp").val();
                    var ID_tipo = $(this).data('idtipo');

                    if ($("#chk_spoiler").is(":checked")) {
                        spoiler = 1
                    }

                }
            } else {
                return;
            }

            var cmtclick = "on";

            $.ajax({
                url: "../../Model/comentariobd.php",
                type: "post",
                data: {
                    IDUserObra: IDUser,
                    conteudoCom: ContentCom,
                    ID_tipo: ID_tipo,
                    tipoCom: tipoCom,
                    cmtclick: cmtclick,
                    chk_spoiler: spoiler,
                }
            })

            getComentario();
            $("#conteudoComentario").val("");
            $("#conteudoResp").val("");
        })
    </script>

</body>

</html>