<?php
include_once '../../Model/verificacao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/feed.css">
    <link rel="stylesheet" href="../assets/CSS/categoria-color.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Pagina Inicial</title>
</head>

<body>


    <?php include_once 'header.php'; ?>




    <main>
        <section class="rank">
            <br>
            <p class="titulo_rank">Ranking</p>
            <p>____________</p>

            <section class="container_user_rank">
                <?php
                foreach ($pointsRankAll as $indice => $value) {
                    $dadosUserRank = $classLog->findUser([" ID_user = " . $value['user_FKRAN']]);
                    ?>

                    <!-- cada usuario começa aqui -->
                    <div class='user_rank'>
                        <div class='posicao'>
                            <p class='<?php
                            if ($indice == 0) {
                                echo 'primeiro_user_rank';
                            } else {
                                echo 'demais_user_rank';
                            }
                            ?>'><?= $indice + 1; ?>°</p>
                        </div>
                        <div class='codigo_numero_img'>
                            <a href="perfil.php?user=<?= $dadosUserRank['ID_user']; ?>">
                                <img class='imagem_rank_user' src='
                            <?php if (isset($dadosUserRank['foto']) && !empty($dadosUserRank['foto'])) { ?>
                                                    ../assets/IMAGEM_USUARIO/<?= $dadosUserRank['foto']; ?>
                                                <?php } else { ?>
                                                    ../assets/IMAGENS/blank.jpg
                                                    
                                                <?php } ?> 
                                ' alt=''>
                            </a>
                            <p>
                                <?php
                                if (strlen($dadosUserRank['codigo']) > 12) {
                                    echo substr($dadosUserRank['codigo'], 0, 12) . "...";
                                }
                                // senão exibi o texto completo
                                else {
                                    echo $dadosUserRank['codigo'];
                                }
                                ?>
                            </p>

                            <p class='numero_seguidores'>
                                <?= $value['rankPontosRAN']; ?>
                            </p>
                        </div>
                    </div>
                    <!-- Fecha aqui -->

                <?php } ?>
            </section>
            <div class="barra_horizontal"></div>


        </section>
        <section class="feed">
            <section class="pubs">
                <p class="welcome">Bem vindo ao feed <strong>
                        <?= $dados_usuario['nome']; ?>
                    </strong> !! \(^-^)/</p>
                <?php
                foreach ($CapFeed as $indice => $value) {

                    $capitulo_Count = $classLog->Count('ID_capitulo', 'capitulo', ["obra_FK =" . $value['obra_FK']]);
                    $capPrimary = $classLog->MINCap($value['obra_FK']);
                    $ObraCap = $classLog->Obra($value['obra_FK']);
                    if ($capitulo_Count > 0) {
                        $fotoUserObra = $ObraCap['foto_obra'];
                        ?>
                        <div class="pubNovaObra">
                            <div class="container">
                                <div class="headerPub">
                                    <div class="tempo-config">
                                        <span>
                                            <?php
                                            echo $classLog->getTempoPassados($value['created_at']);
                             
                                            ?>
                                        </span>
                                        <p style="font-size: 24px;">
                                            <strong>
                                                ...
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="enuPub">
                                        <a href="perfil.php?user=<?= $ObraCap['user_FK']; ?>">
                                            <img class="editar_img" src="
                                <?php if (isset($ObraCap['foto']) && !empty($ObraCap['foto'])) { ?>
                                ../assets/IMAGEM_USUARIO/<?= $ObraCap['foto']; ?>
                            <?php } else { ?>
                                ../assets/IMAGENS/blank.jpg
                            <?php } ?>    
                                " alt="Foto de perfil" name="perfil" id="perfil" width="50" height="50"
                                                style="border-radius: 25px;">
                                        </a>


                                        <div class="tituloPub">
                                            <p>
                                                <a href="perfil.php?user=<?= $ObraCap['user_FK']; ?>">
                                                    <span>
                                                        <?= $ObraCap['nome']; ?>
                                                    </span>
                                                </a>
                                                <?php
                                                if ($capPrimary == $value['ID_capitulo']) {
                                                    echo "publicou uma nova obra, seja uma das primeiras pessoas a lerem o primeiro capítulo !!";
                                                } else {
                                                    echo "publicou um novo capítulo em sua obra !!";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="capa_da_obra.php?obra=<?= $ObraCap['ID_obra']; ?>">
                                    <div class="bodyPub">
                                        <div class="obraPub">
                                            <img class="fotoUserObra" src="<?php if (isset($fotoUserObra) && !empty($fotoUserObra)) { ?>
                        ../assets/IMAGEM_USUARIO/<?= $fotoUserObra; ?>
                    <?php } else { ?>
                        ../assets/IMAGENS/sem imagem.gif
                    <?php } ?>" alt="" width="150" height="230" style="border-radius: 5px;">
                                            <div class="infoObraPub">
                                                <h2>
                                                    <?= $ObraCap['nome_obra']; ?>
                                                </h2>
                                                <div class="categoriasObraPub">
                                                    <?php
                                                    $categoria_obra = $classLog->categoria_obra($ObraCap['ID_obra']);
                                                    for ($i = 0; $i < count($categoria_obra); $i++) {

                                                        $nomeCat = $categoria_obra[$i]['categoriaCat'];
                                                        $nomeCatRplc = str_replace(" ", "", $nomeCat);
                                                        $nomeCatRplc = str_replace("+", "", $nomeCatRplc);
                                                        echo "<div class='$nomeCatRplc classe_categoria'>$nomeCat</div>";
                                                    }
                                                    ?>
                                                </div>
                                                <p class="descPub">
                                                    <?= $ObraCap['descricao']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="footerPub"
                                    style="display: flex; justify-content: center; align-items: center; padding: 10px 0 0;">
                                    <a href="capa_da_obra.php?obra=<?= $ObraCap['ID_obra']; ?>"
                                        style="text-decoration: underline;">Ver obra</a>
                                </div>
                            </div>
                        </div>


                        <?php if ($indice == 2) {
                            getRecomendados();
                        }
                    }
                } ?>

            </section>
        </section>
    </main>

    <?php include_once 'footer.php'; ?>
    <script src="../assets/JAVASCRIPT/header.js"></script>
</body>

</html>












<?php

function getRecomendados()
{
    echo '            
                <div class="container_tipo branco">
                    <h1 class="titulo_pag_ini">Recomendados</h1>
                    <hr>
                    <div class="container_historias">
            
                    <a class="historias" href="#">
                        <div class="container_historia">
                            <div class="imagem_historia">
                                <img src="https://i.pinimg.com/originals/ef/2e/27/ef2e271bff31c9591bbf27ba1a4db543.jpg" alt="" srcset="" name="imagem_historia" id="imagem_historia">
                            </div>   
                            <div class="informacoes_historia">
                                <p class="titulo_historia" name="titulo_historia_pag_ini" id="titulo_historia_pag_ini" >Escarlate</p>
                                <p>Avaliação positivas: <span id="avaliacoes_historia_pag_ini" name="avaliacoes_historia_pag_ini"> 00% </span></p>
                            </div>           
                        </div>
                        </a>
            
                        <a class="historias" href="#">
                        <div class="container_historia">
                            <div class="imagem_historia">
                                <img src="https://th.bing.com/th/id/OIP.kXuQzwmowpKSMLhsDpA6ZwAAAA?pid=ImgDet&w=474&h=711&rs=1" alt="" srcset="" name="imagem_historia" id="imagem_historia">
                            </div>   
                            <div class="informacoes_historia">
                                <p class="titulo_historia" name="titulo_historia_pag_ini" id="titulo_historia_pag_ini" >Delirium</p>
                                <p>Avaliação positivas: <span id="avaliacoes_historia_pag_ini" name="avaliacoes_historia_pag_ini"> 00% </span></p>
                            </div>           
                        </div>
                        </a>
            
                        <a class="historias" href="#">
                        <div class="container_historia">
                            <div class="imagem_historia">
                                <img src="https://i.pinimg.com/236x/db/92/e9/db92e9fd22a740c4fb92f760540c3e7d.jpg" alt="" srcset="" name="imagem_historia" id="imagem_historia">
                            </div>   
                            <div class="informacoes_historia">
                                <p class="titulo_historia" name="titulo_historia_pag_ini" id="titulo_historia_pag_ini" >Assassino das sombras</p>
                                <p>Avaliação positivas: <span id="avaliacoes_historia_pag_ini" name="avaliacoes_historia_pag_ini"> 00% </span></p>
                            </div>           
                        </div>
                        </a>
            
                        <a class="historias" href="#">
                        <div class="container_historia">
                            <div class="imagem_historia">
                                <img src="https://i.pinimg.com/236x/a3/70/84/a37084f412ef1230271eec94513aaf06.jpg" alt="" srcset="" name="imagem_historia" id="imagem_historia">
                            </div>   
                            <div class="informacoes_historia">
                                <p class="titulo_historia" name="titulo_historia_pag_ini" id="titulo_historia_pag_ini" >Investigação divina</p>
                                <p>Avaliação positivas: <span id="avaliacoes_historia_pag_ini" name="avaliacoes_historia_pag_ini"> 00% </span></p>
                            </div>           
                        </div>
                        </a>
            
                        <a class="historias" href="#">
                        <div class="container_historia">
                            <div class="imagem_historia">
                                <img src="https://th.bing.com/th/id/R.899f3191bc00788d98d4fd8dd87eb88b?rik=sNg14cBIkwaCrg&riu=http%3a%2f%2f2.bp.blogspot.com%2f-EAwB_L3m8mc%2fTpOIULi3u6I%2fAAAAAAAAJO4%2fgTvc7EfoNYo%2fw1200-h630-p-k-no-nu%2ffeliz%2boutono.gif&ehk=RjATvkBOz2Zn6mdV2il4LUiWB7RCXnnLVtViQTvDgJw%3d&risl=&pid=ImgRaw&r=0" alt="" srcset="" name="imagem_historia" id="imagem_historia">
                            </div>   
                            <div class="informacoes_historia">
                                <p class="titulo_historia" name="titulo_historia_pag_ini" id="titulo_historia_pag_ini" >Outono dimensional</p>
                                <p>Avaliação positivas: <span id="avaliacoes_historia_pag_ini" name="avaliacoes_historia_pag_ini"> 00% </span></p>
                            </div>           
                        </div>
                        </a>
                    </div>
                </div>';
}
?>