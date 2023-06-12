<?php
include_once '../../Model/verificacao.php';
if ($_GET['obra']) {
    $idObra = $_GET['obra'];
    $obrasCapa = $classLog->Obra($idObra);

    $capitulos = $classLog->Capitulo($idObra);
    $obrasUserVisitado = $classLog->Obra_Usuario($obrasCapa['user_FK'], [$idObra]);
    $url = $_SERVER["REQUEST_URI"];

    $Seguidor = $classLog->Count('user_FK', 'seguir', ["user_FK = " . $obrasCapa['user_FK'] . " and seguidor_FK =" . $_SESSION['ID_user']]);

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $obrasCapa['nome_obra']; ?> | E-BOOK SQUARE
    </title>
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/categoria-color.css">
    <link rel="stylesheet" href="../assets/CSS/capa_da_obra.css">
    <link rel="stylesheet" href="../assets/CSS/btn-seguir.css">
    <link rel="stylesheet" href="../assets/CSS/comentarios.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <?php include_once 'header.php' ?>

    <?php if ($obrasCapa['etaria'] == 'Adulto') { ?>
        <div class="container_historia_adulta">
            <i class="bi bi-info-circle text_historia_adulta"></i>
            <p class="text_historia_adulta">Está historia tem uma classificao adulta
        </div>
    <?php } ?>
    <main>

        <section class="informacoes_da_obra">
            <div class="container_titulo_da_obra">
                <h1 class="Titulo_obra">Historia: <span style="font-family: cursive ; font-style: italic">
                        <?= $obrasCapa['nome_obra']; ?>
                    </span> </h1>
                <div class="nome_autor_denuncia" style="margin-bottom: 20px;">

                    <div class="userObra" style="display: flex; align-items: center; gap: 10px;">
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


                        <div class="container_idade_opcoes">
                            <div class="add_favo_denun">

                                <span id="obrafav" style="user-select: none;"></span>

                                <span id="obraamei" style="user-select: none; color: red;" data-id="<?= $idObra; ?>"></span>

                                <p data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                    <i class="bi bi-exclamation-triangle icon"></i> 
                                </p>
                                    
                            </div>
                        </div>

                    </div>
                </div>
        </section>

        <section class="info_obra">
            <div class="imagem_historia">
                <img class="imagem_pe" src="
                <?php if (isset($obrasCapa['foto_obra']) && !empty($obrasCapa['foto_obra'])) { ?>
                                    ../assets/IMAGEM_USUARIO/<?= $obrasCapa['foto_obra']; ?>
                                <?php } else { ?>
                                    ../assets/IMAGENS/sem imagem.gif
                                <?php } ?>  
                " alt="" srcset="">
            </div>
            <div class="sobre_obra">
                <div class="sinopse">
                    <p class="titulo_info" style="margin-bottom: 5px;">Sinopse:</p>
                    <p>
                        <?= $obrasCapa['descricao']; ?>
                    </p>
                </div>
                <div class="categoriaBox">
                    <p class="titulo_info">Categorias:</p>
                    <div class="categoria">
                        <?php
                            $categoria_obra = $classLog->categoria_obra($obrasCapa['ID_obra']);
                            for ($i = 0; $i < count($categoria_obra); $i++) {

                                $nomeCat = $categoria_obra[$i]['categoriaCat'];
                                $nomeCatRplc = str_replace(" ", "", $nomeCat);
                                $nomeCatRplc = str_replace("+", "", $nomeCatRplc);
                                echo "<div class='$nomeCatRplc classe_categoria'>$nomeCat</div>";
                             } 
                        ?>
                    </div>
                </div>
                <div class="caracteristicas">
                    <p><span class="titulo_info">Criada: </span><span>
                            <?=$classLog->getTempoPassados($obrasCapa['created_at']);?>
                        </span></p>
                    <p><span class="titulo_info">Atualizada: </span><span>
                            <?=$classLog->getTempoPassados($obrasCapa['updated_at']);?>
                        </span></p>
                    <!-- <p><span class="titulo_info">Idioma: </span><span>-</span></p> -->

                    <p><span class="titulo_info">Visualizações: </span>
                    <span><?= $classLog->quatityViewByObra($idObra); ?></span></p>
                    
                    <p><span class="titulo_info">Palavras: </span><span>
                            <?= $classLog->quatityCapWord($idObra); ?>
                        </span></p>
                    <p><span class="titulo_info">Finalizada: </span>
                        <span>
                            <?php if ($obrasCapa['Finalizado'] == 0) {
                                echo "Não";
                            } else {
                                echo "Sim";
                            } ?>
                        </span>
                    </p>
                </div>
            </div>
        </section>

        <section class="capitulos">
            <div class="global_cap">
                <div>
                    <p class="total_cap">Total de capitulo(s): <span>
                            <?php
                            $capitulo_Count = $classLog->Count('ID_capitulo', 'capitulo', ["obra_FK = $idObra"]);
                            echo $capitulo_Count;
                            ?>
                        </span></p>
                </div>
                <?php foreach ($capitulos as $indice => $value) { ?>
                    <div class="container_capitulo">
                        <a href="preview.php?obra=<?= $idObra; ?>&cap=<?= $indice + 1; ?>">
                            <p class="titulo_capitulo">
                                <?= $value['titulo_cap']; ?>
                            </p>
                            <p>Capitulo <span>
                                    <?= $indice + 1; ?>
                                </span></p>
                            <span>
                                <?= $value['created_at']; ?>
                            </span>
                        </a>
                        <?php if ($_SESSION['ID_user'] == $obrasCapa['user_FK']) { ?>
                            <div class="opcoes_ExcluirEditar">
                                <a href="escrever-obra.php?obra=<?= $idObra ?>&cap=<?= $value['ID_capitulo']; ?>&action=atualizar">
                                    <button>
                                        <i class="bi bi-pencil-square icon_cap"></i>
                                    </button>
                                </a>
                                <form
                                    action="../../Model/valida_cap.php?obra=<?= $idObra ?>&method=remove&cap=<?= $value['ID_capitulo']; ?>"
                                    method="post">
                                    <button type="submit">
                                        <i class="bi bi-trash-fill icon_cap"></i>
                                    </button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>

                    <?php
                } ?>
                <?php if ($_SESSION['ID_user'] == $obrasCapa['user_FK']) { ?>
                <div class="add_novo_cap">
                    <a href="escrever-obra.php?obra=<?= $idObra ?>">Adicionar novo capitulo</a>
                </div>
                <?php } ?>
            </div>
            
        </section>

        <hr>
        <section class="obras_recent_autor">
            <div class="container_obras_recent_autor">
                <?php
                    $maisHistorias = "";
                    // $maisHistorias = "As mais recomendadas da categoria"; 
                    if(!empty($obrasUserVisitado)){ 
                       $maisHistorias = "Mais historias de <strong>".$obrasCapa['nome']."</strong>"; 
                    }
                 ?>
                <p class="titulo_obras_recen">
                    <?=$maisHistorias;?>
                </p>
                <div class="container_historias">
                    <?php foreach ($obrasUserVisitado as $indice => $value) { ?>
                        <div class='obra'>
                            <a href="capa_da_obra.php?obra=<?= $value['ID_obra']; ?>">
                                <img src='
                            <?php if (isset($value['foto_obra']) && !empty($value['foto_obra'])) { ?>
                                                ../assets/IMAGEM_USUARIO/<?= $value['foto_obra']; ?>
                                            <?php } else { ?>
                                                ../assets/IMAGENS/sem imagem.gif
                                            <?php } ?>    
                            ' alt='' style="border: 1px solid black;">
                            </a>
                            <p class='nome_historia_recente'>
                                <?= $value['nome_obra'] ?>
                            </p>
                            <div class="ameis_da_obra ameiOutras obrasOutras" id="obraameioutra<?= $indice; ?>"
                                data-id="<?= $value['ID_obra'] ?>">

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        
        <!-- <section class="obras_recent_autor">
            <p class="titulo_obras_recen">Mais historias de <strong><?= $obrasCapa['nome']; ?></strong></p>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"> 
                <div class='obra'>
                    <a href="capa_da_obra.php?obra=<?= $value['ID_obra']; ?>">
                        <img src='
                        <?php if (isset($value['foto_obra']) && !empty($value['foto_obra'])) { ?>
                            ../assets/IMAGEM_USUARIO/<?= $value['foto_obra']; ?>
                            <?php } else { ?>
                            ../assets/IMAGENS/sem imagem.gif
                            <?php } ?>    
                        '' style="border: 1px solid black;">
                    </a>
                    <p class='nome_historia_recente'>
                        <?= $value['nome_obra'] ?>
                    </p>
                    <div class="ameis_da_obra ameiOutras obrasOutras" id="obraameioutra<?= $indice; ?>"
                        data-id="<?= $value['ID_obra'] ?>">
                    </div>
                </div>  

                    </div>
                   
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            </div>
        </section> -->


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
                        <input type="checkbox" name="" id="">
                    </div>
                </div>
                <div class="escrever_comentario">
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="enviar">
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </section>
    </main>




    <!-- modal denunciar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="fs-5">Denunciar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <div>
                    <p id="title_denuncia">Denunciar a obra: <strong><?= $obrasCapa['nome_obra']; ?></strong> do autor(a) <em><?= $dados_usuario['nome']; ?></em></p>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">
                        Motivo:
                    </label>
                    <textarea class="form-control" id="message-text" placeholder="Digite aqui o motivo da denúncia..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>

            </div>
        </div>
    </div>

    <input type="hidden" value="<?= $idObra; ?>" id="IDObra">

    <?php include_once 'footer.php' ?>
</body>

<script src="../assets/JAVASCRIPT/capa_da_obra.js"></script>
 <script src="../assets/JAVASCRIPT/header.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    


    const elements = document.querySelectorAll ('.nome_historia_recente')
    const LIMIT = 29
for (let p of elements){
    const aboveLimit = p.innerText.length > LIMIT
    const dotsOrEmpty = aboveLimit ? '...' : ''
    p.innerText = p.innerText.substring(0, LIMIT) + dotsOrEmpty
}




const elementsCap = document.querySelectorAll ('.container_capitulo p')
const LIMITCapi = 28
for (let p of elementsCap){
    const aboveLimit = p.innerText.length > LIMITCapi
    const dotsOrEmpty = aboveLimit ? '...' : ''
    p.innerText = p.innerText.substring(0, LIMITCapi) + dotsOrEmpty
}



const exampleModal = document.getElementById('exampleModal')
if (exampleModal) {
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')
  })
}
</script>

</html>