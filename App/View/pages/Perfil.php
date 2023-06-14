    <?php

    include_once '../../Model/verificacao.php';

    if (!isset($_SESSION['ID_user']) || empty($_SESSION['ID_user'])) {
        header("location: login.php");
        exit();
    }

    ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/btn-seguir.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/categoria-color.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/CSS/perfil.css">
    <link rel="stylesheet" href="../assets/CSS/comentarios.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>
        <?= $dadosUserPerfil['codigo']; ?> | E-Book Square
    </title>
</head>

<body id="topo">
    <?php include_once 'header.php'; ?>


    <div id="tela_remover" class="tela_remover desativo modal">
        <div class="container_remover">
            <div class="container_texto_remover">
                <p class="texto_remover">Deseja remover essa historia?</p>
                <p class="letras_miudas">Depois de excluido a historia e os capítulos seram apagados e não terá como
                    recupera-los</p>
            </div>
            <div class="botoes_remover">
                <button class="remover_botao" id="remover_botao" onclick="deleteObra()" value="obra">
                    Excluir
                </button>
                <button id="cancelar" onclick="cancelar()" class="cancelar_botao_remover">Cancelar</button>
            </div>
        </div>
    </div>


    <div class="modal_doacoes" id="modal_doacoesId">
        <div class="header_doacoes">
            <div class="icon_fechar_doacoes">
                <i onclick="fechar_doacoes()" class="bi bi-x-lg"></i>
            </div>
            
            <p class="titulo_header_doacoes">Contribuição</p>
            <p class="texto_doacoes">Faça uma contribuição para ajudar e motivar o autor !!<p>
        </div>
        <div class="cod_pix-user">

            <div class="cod">
                <img class="pix_icon" src="https://th.bing.com/th/id/OIP.YpTXXBQdZpq8ClD7Ok7xEQHaCv?pid=ImgDet&w=631&h=234&rs=1">
                <img class="Qrcode" src="https://www.pngall.com/wp-content/uploads/2/QR-Code-PNG-Photo.png" alt="">
                <p><span class="texto_doacoes">Chave PIX: </span><span class="texto_doacoes" name="chave_pix"><?= $dadosUserPerfil['chavePix']; ?></span></p>
            </div>
            <div class="barra_ou">
                <div class="barra_doacoes"></div> 
                <p>OU<p>
                <div class="barra_doacoes"></div>
            </div>
            <div class="user_pix">
                <p class="texto_doacoes">Entre em contato com o autor via chat</p>
                <img class="imagem_user_doacoes" src="
                <?php if (isset($dadosUserPerfil['foto']) && !empty($dadosUserPerfil['foto'])) { ?>
                        ../assets/IMAGEM_USUARIO/<?= $dadosUserPerfil['foto']; ?>
                    <?php } else { ?>
                        ../assets/IMAGENS/blank.jpg
                    <?php } ?> 
                " alt="">
                <p><?= $dadosUserPerfil['codigo']; ?></p>
                <p class="botao_char_user" >Falar com <?= $dadosUserPerfil['nome']; ?></p>
            </div>
        </div>
        <p class="fechar" onclick="fechar_doacoes()">Fechar</p>
    </div>


    <main id="main" class="">
            <div class="fundo">
                <?php if (isset($dadosUserPerfil['banner']) && !empty($dadosUserPerfil['banner'])) { ?>
                <img class="editar_img" class="pelicula"
                src="  ../assets/IMAGEM_USUARIO/<?= $dadosUserPerfil['banner']; ?>" alt="Foto de fundo do perfil">
                <?php } else { ?>
                <img class="editar_img" class="pelicula" src="../assets/IMAGENS/imagem_padrao_banner.webp">
                <?php } ?>
                <div class="icone">
                    <div class="avatar">
                        <img class="editar_img" src="
                        <?php if (isset($dadosUserPerfil['foto']) && !empty($dadosUserPerfil['foto'])) { ?>
                        ../assets/IMAGEM_USUARIO/<?= $dadosUserPerfil['foto']; ?>
                    <?php } else { ?>
                        ../assets/IMAGENS/blank.jpg
                    <?php } ?>    
                        
                        " alt="Foto de perfil" name="perfil" id="perfil">
                    </div>
                </div>
                <div class="informacoes">
                    <div class="informacoes_user">
                        <p id="nome" name="nome">
                            <?= $dadosUserPerfil['nome']; ?>
                        </p>
                        <p id="email" name="email">
                            <?= $dadosUserPerfil['codigo']; ?>
                        </p>
                    </div>
                </div>
                <?php if ($_SESSION['ID_user'] != $_GET['user']) {?>
                <div onclick="modal_doacoes()" class="doacoes" id="IdDoacoes">
                    <a href="#top" style="height: 55px;">
                        <img src="../assets/IMAGENS/doacoes.png" alt="">
                    </a>
                </div>
                <?php }?>
            </div>


            <div class="opcoes">
                <div class="sobre_usuario">
                    <p> Obras:
                        <span id="obra" name="obra">
                            <?= $ObraCount; ?>
                        </span>
                    </p>

                    <p> Seguidores:
                        <span id="seguidores" name="seguidores">
                            <?= $SeguidorUsuarioCount; ?>
                        </span>
                    </p>

                    <p> Rank:
                        <span id="rank" name="rank">Unranked</span>
                        <span> |
                            <?= $pointsRankUser . " pts"; ?>
                        </span>
                    </p>
                    <?php if ($_SESSION['ID_user'] == $_GET['user']) {?>
                    <a href="editar-perfil.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-gear" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                    </a>
                    <?php }?>
                </div>

            <div class="botao_opcoes Seguir" id="btn_seg_user">
                    
            </div>
            </div>

            <section class="conteudo_perfil">
                <div class="desc_comp_segui_exp">
                    <div class="Container">
                        <div class="container_geral_esquerdo">
                            <p class="titulo_container">Descrição</p>
                            <p name="descricao" id="descricao">

                                <?php
                                if (!empty($dadosUserPerfil['descricaoUSU'])) {
                                    echo $dadosUserPerfil['descricaoUSU'];
                                } else {
                                    ?>
                                <p id="desc_content" style="opacity: 40%; text-align: center; margin: 0 0 20px">
                                    <span>Não há descrição</span>
                                </p>
                                <?php
                                }
                                ?>

                            </p>
                            <div id="div-desc"></div>
                            <p style="font-size: 14px; margin: 10px 0px 0px; text-align: center; ">Se juntou em: <span
                                    style="font-style: italic; color: #800080 ">
                                    <?= $dadosUserPerfil['data_cad']; ?>
                                </span></p>
                        </div>
                    </div>

                    <div class="Container">
                        <div class="container_geral_esquerdo">
                            <p class="titulo_container">Nivel</p>
                            <div class="container_nivel">
                                <div class="container_barra_progresso">
                                    <span class="nivel"><?=$RankUser['levelRAN'];?></span>
                                    <progress clas4s="progresso" value="<?=$RankUser['expRAN'];?>" max="<?=$RankUser['maxExpRAN'];?>"></progress>
                                </div>
                                <div class="valor_exp">
                                    <p><span><?=$RankUser['expRAN'];?></span>/<span><?=$RankUser['maxExpRAN'];?>EXP</span></p>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="Container">
                        <div class="container_geral_esquerdo">
                            <p class="titulo_container">Compartilhe o perfil</p>
                            <div class="container_compartilhamento">
                                <a href="#"><i class="bi bi-facebook icons"></i></a>
                                <a href="#"><i class="bi bi-discord icons"></i></a>
                                <a href="#"><i class="bi bi-whatsapp icons"></i></a>
                                <a href="#"><i class="bi bi-twitter icons"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="Container">
                        <div class="container_geral_esquerdo">
                            <p class="titulo_container">Seguidores</p>
                            <div class="container_seguidores">
                               <?php
                                $seguidores = array(); 
                                $IDUserURL = $_GET['user'];
                                $Seguidores = $classLog->findAll(["seguidor_FK"], "seguir", [" WHERE user_FK = $IDUserURL LIMIT 4"]);

                                foreach($Seguidores as $value){ 
                                    $usersSeguindo = $classLog->find(['codigo, foto'], 'usuario', [' WHERE ID_user ='.$value['seguidor_FK']]); 
                                    ?>
                                <div class="user_segui">
                                    <a href="perfil.php?user=<?=$value['seguidor_FK'];?>">
                                        <img class="imagem_user_segui" src="
                                        <?php if (isset($usersSeguindo['foto']) && !empty($usersSeguindo['foto'])) { ?>
                                                    ../assets/IMAGEM_USUARIO/<?= $usersSeguindo['foto']; ?>
                                                <?php } else { ?>
                                                    ../assets/IMAGENS/blank.jpg
                                                <?php } ?>  
                                        " alt="" class="img_segui">
                                             <!-- <p class="nome_user_segui">  @katsurazur4 </p>   -->
                                    </a>
                                </div>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>


                </div>

                <div class="container-obras">
                    <div class="nav-main">
                        <ul
                            style="display:flex; align-items: center; gap: 15px; margin-bottom: 45px; list-style-type: none; ">
                            <li class="titulo_obras" id="Titulo_Obra" onclick="trocarAba('Obras')">Obras</li>
                            <li class="titulo_desativado" id="Titulo_Publico" onclick="trocarAba('Publico')">Publico
                            </li>
                            <li class="titulo_desativado" id="Titulo_Conversas" onclick="trocarAba('Conversas')">
                                Comunidade</li>
                            <li class="titulo_desativado" id="Titulo_Conquistas" onclick="trocarAba('Conquistas')">
                                Conquistas</li>
                        </ul>
                    </div>

                    <div class="Conteudo_obras" id="Conteudo_obras">
                        <table class="conjuntos obras">
                            <tr>
                            <?php
                                if(! empty($ObraUserPerfil)){
                                foreach ($ObraUserPerfil as $indice => $value) { 
                                    $porcAvaliativa = $classLog->ratingPorcent($value['ID_obra']);
                            ?>
                                    <div class="obras">
                                        <div class="container_editar_remover">

                                            <div class="favo obraPerfil" id="obrafav<?=$indice;?>" data-id="<?= $value['ID_obra']; ?>" ></div>

                                        </div>
                                        <a href="capa_da_obra.php?obra=<?= $value['ID_obra']; ?>">
                                            <div class="foto_obras">
                                                <img src="
                                                <?php if (isset($value['foto_obra']) && !empty($value['foto_obra'])) { ?>
                                                    ../assets/IMAGEM_USUARIO/<?= $value['foto_obra']; ?>
                                                <?php } else { ?>
                                                ../assets/IMAGENS/sem imagem.gif
                                                <?php } ?> 
                                                " alt="Imagem da obra" width="100%" height="100%">
                                                </div>
                                                <div>
                                                    <div class="informacoes_Obras" style="margin-left: 10px; padding: 10px;">
                                                        <ul>
                                                            <li class="Nome_Obra" id="Nome_Obra" name="Nome_Obra">
                                                                <?= $value['nome_obra']; ?>
                                                            </li>
                                                            <li class="Nome_Autor" id="Nome_Autor" name="Nome_Autor">
                                                                <p id="nome" name="nome">
                                                                    <?= $dadosUserPerfil['nome']; ?>
                                                                </p>
                                                            </li>
                                                            <li class="Descri_Obra" id="Descri_Obra" name="Descri_Obra">
                                                                <p class="titulo-desc-obra">Descrição:</p>
                                                                <p class="Descricao_obra">
                                                                    <?= $classLog->CharsLimit($value['descricao'], 320); ?>
                                                                </p>
                                                            </li>

                                                            <li>
                                                                <p style="font-weight: 600;">Avaliações:</p>
                                                                <?=$porcAvaliativa;?>
                                                            </li>
                                        </a>
                                        </ul>
                                <div class="categoria">
                                    <?php
                                        $categoria_obra = $classLog->categoria_obra($value['ID_obra']);
                                        for ($i = 0; $i < count($categoria_obra); $i++) {

                                            $nomeCat = $categoria_obra[$i]['categoriaCat'];
                                            $nomeCatRplc = str_replace(" ", "", $nomeCat);
                                            $nomeCatRplc = str_replace("+", "", $nomeCatRplc);
                                            echo "<div class='$nomeCatRplc classe_categoria'>$nomeCat</div>";
                                        } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                        <?php if($indice == 1){break;} } } else { if($_SESSION['ID_user'] != $dadosUserPerfil['ID_user']){ 
                                echo $dadosUserPerfil['nome']." ainda não publicou nenhuma obra";
                            } 
                        else{ ?>
                        <div class="container_sem_obra">
                            <p><?php echo "Você ainda não publicou nenhuma historia"; ?></p>
                            <a href="pre-criacao.php" class="Adicionar_obra"> + Criar uma historia</a>
                        </div>
                            <?php } ?>
                        <?php } ?>
                </tr>
            </table>

                        
                        <?php if(count($ObraUserPerfil) > 0){ ?>  
                <!-- Só ira aparecer caso tenha mais de 3 obras  -->
                <div class="ver_mais_obras">
                    <a class="ver_mais" href="biblioteca-usuario.php?user=<?=$_GET['user']?>">Ver mais</a>
                </div>
                <?php }?>  

                <?php 
                    $Ultimas4ObrasLidas = $classLog->lendoObrasPerfil();
                ?>

            <section class="lendo">
                <p class="titulo_lendo">Lendo</p>
                <div class="aling_obras">
            <?php  if(! empty($Ultimas4ObrasLidas)){
                        
                foreach ($Ultimas4ObrasLidas as $indice => $IdObraLendo){
                            
                    $ObraLendoUserPerfil = 
                    $classLog->find(['*'], 'obra', ["WHERE ID_obra = ".$IdObraLendo]);
                    $UserObraLendo = $classLog->findUser([" ID_user = ".$ObraLendoUserPerfil['user_FK']]);
            ?>
                <div class="container_obra_lendo" style="position: relative;">
                <div class="favo_lendo">
                        <div class="Lendobox obraPerfilLendobox" id="obraLendobox<?=$indice;?>" data-id="<?= $ObraLendoUserPerfil['ID_obra']; ?>" ></div>
                    </div>
                    <a href="capa_da_obra.php?obra=<?=$ObraLendoUserPerfil['ID_obra']; ?>">
                        <div class="img_obra_lendo">
                            <img class="img_obra_lendo"
                                src="
                        <?php if (isset($ObraLendoUserPerfil['foto_obra']) && !empty($ObraLendoUserPerfil['foto_obra'])) { ?>
                                        ../assets/IMAGEM_USUARIO/<?= $ObraLendoUserPerfil['foto_obra']; ?>
                                    <?php } else { ?>
                                    ../assets/IMAGENS/sem imagem.gif
                                    <?php } ?>
                                " alt="">
                        </div>
                        <p class="titulo_obra_lendo"><?=$ObraLendoUserPerfil['nome_obra'];?></p>
                    </a>
                </div>
                    <?php  } 
                        } else { 
                        if($_SESSION['ID_user'] != $dadosUserPerfil['ID_user'])
                        {echo $dadosUserPerfil['nome']." ainda não leu nenhuma obra";} 
                        else{echo "Você ainda não leu nenhuma obra";}}
                    ?>   
                </div>
            </section>
                <br><br>
                <section class="lendo">
                    <p class="titulo_lendo">Favoritos</p>
                    <div class="aling_obras">
                        
                    <?php
                    $IdsObrasFav = $classLog->findAll(['obra_FK'], 'favorito', ["WHERE user_FK = ".$_GET['user']]);
                    if(! empty($IdsObrasFav)){
                        
                        foreach ($IdsObrasFav as $indice => $IdObraFav){
                            
                                $ObraFavUserPerfil = 
                                $classLog->find(['*'], 'obra', ["WHERE ID_obra = ".$IdObraFav['obra_FK']]);
                                $UserObraFav = $classLog->findUser([" ID_user = ".$ObraFavUserPerfil['user_FK']]);
                ?>
                       <div class="container_obra_lendo" style="position: relative;">
                           <div class="favo_lendo">
                                <div class="favobox obraPerfilfavbox" id="obrafavbox<?=$indice;?>" data-id="<?= $IdObraFav['obra_FK']; ?>" ></div>
                            </div>
                            <a href="capa_da_obra.php?obra=<?=$IdObraFav['obra_FK'];?>">
                                <div class="img_obra_lendo">
                                    <img class="img_obra_lendo" src="
                                    <?php if (isset($ObraFavUserPerfil['foto_obra']) && !empty($ObraFavUserPerfil['foto_obra'])) { ?>
                                                        ../assets/IMAGEM_USUARIO/<?= $ObraFavUserPerfil['foto_obra']; ?>
                                                    <?php } else { ?>
                                                    ../assets/IMAGENS/sem imagem.gif
                                                    <?php } ?>
                                    " alt="">
                                    
                                </div>
                                <p class="titulo_obra_lendo"><?= $ObraFavUserPerfil['nome_obra']; ?></p>
                            </a>
                        </div>
                    <?php  if($indice == 3){break;} } 
                    } else { 
                                    if($_SESSION['ID_user'] != $dadosUserPerfil['ID_user'])
                                    {echo $dadosUserPerfil['nome']." não possui obras favoritadas";} 
                                    else{echo "Você não possui obra favoritada";}}
                    ?>          

                    </div>
                        <?php if(count($IdsObrasFav) > 4){ ?> 
                            <!-- //Usar for. Buscar 5 obras apenas $i -> 0 $i<//count($obras -> 5) -> only 4 -->
                        <div class="ver_mais_obras" onclick="favo()">
                            <a class="ver_mais" href="biblioteca-usuario.php?user=<?=$_GET['user']?>">Ver mais</a>
                        </div>
                        <?php }?>
                    </div>
                    <div id="Conversas">
                        <section class="comentario">
                            <div class="container_escrever_comentario">
                                <div class="imagem_nome_span">
                                    <div>
                                        <img class="ImagemUser_escrever_comentario" src="https://t.ctcdn.com.br/5XPASDBUosgmBv5Ptpxcd6eTJso=/512x288/smart/filters:format(webp)/i257652.jpeg" alt="">
                                        <span class="NomeUser_escrever_comentario">Nome user</span>
                                    </div>
                                    <div>
                                        <span>Contém spoiler</span>
                                        <input type="checkbox" name="" id="">
                                    </div>
                                </div>
                                <div class="escrever_comentario">
                                    <textarea name="" id="" cols="30" rows="4"></textarea>
                                </div>
                                <div class="enviar">
                                    <button type="submit">Enviar</button>
                                </div>
                            </div>

                        </section>
                    </div>
                <div id="Publico">
                    <div class="header_publico">
                        <nav class="navegacao_publico">
                            <ul>
                                <li id="nav_seguidores" onclick="botao_seguidores()" class="ativa">Seguidores</li>
                                <li id="nav_seguindo" onclick="botao_seguindo()" >Seguindo</li>
                            </ul>
                        </nav>
                        <hr>
                    </div>
                    <div class="container_seguidores_nav">
                        <!-- Começa aqui -->
                      <?php  
                                $Seguidores = $classLog->findAll(["seguidor_FK"], "seguir", [" WHERE user_FK = $IDUserURL"]);

                                foreach($Seguidores as $value){ 
                                    $usersSeguindo = $classLog->find(['codigo, foto, banner'], 'usuario', [' WHERE ID_user ='.$value['seguidor_FK']]); 

                                     $RankUserSeguidores = 
                                     $classLog->RankUser($value['seguidor_FK']);
                                     $SeguidoresP = 
                                     $classLog->Count('user_FK', 'seguir', ['user_FK = '.$value['seguidor_FK']]);
                                     $SeguindoP = 
                                     $classLog->Count('seguidor_FK', 'seguir', ['seguidor_FK = '.$value['seguidor_FK']]);
                        ?>

                        <div class="seguidor">
                            <div class="banner_seguidor">
                                <img src="
                                <?php if (isset($usersSeguindo['banner']) && !empty($usersSeguindo['banner'])) { ?>
                                                    ../assets/IMAGEM_USUARIO/<?= $usersSeguindo['banner']; ?>
                                                <?php } else { ?>
                                                    ../assets/IMAGENS/blank.jpg
                                                <?php } ?>  
                                " alt="">

                                <div class="perfil_seguidor">
                                    <div class="imagem_e_codigo_seguidor">
                                        <img src="
                                        <?php if (isset($usersSeguindo['foto']) && !empty($usersSeguindo['foto'])) { ?>
                                                    ../assets/IMAGEM_USUARIO/<?= $usersSeguindo['foto']; ?>
                                                <?php } else { ?>
                                                    ../assets/IMAGENS/blank.jpg
                                                <?php } ?>  
                                        " alt="">
                                        <p class="codigo_seguidor"><?=$usersSeguindo['codigo'];?></p>
                                    </div>

                                    <div class="nivel_seguir">
                                        <div class="nivel_seguidor">
                                            <p>Nv <span><?=$RankUserSeguidores['levelRAN'];?></span></p>
                                        </div>
                                        <div class="seguir">
                                            <button type="submit">Seguindo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="seguidor_info">
                                    <p>Seguidores: <span><?=$SeguidoresP;?></span></p>
                                    <p>Seguindo: <span><?=$SeguindoP;?></span></p>
                                </div>
                                    <p class="rank_seguidor">Rank:<span> unranked </span>|<span> <?=$RankUserSeguidores['rankPontosRAN'];?>pts</span></p>
                            </div>

                        </div>
                        <?php }?>
                            <!-- Termina aqui -->
                    </div>


                    <div class="container_seguindo_nav">
                        <!-- Começa aqui -->
                        <?php  
                                $Seguidores = $classLog->findAll(["user_FK"], "seguir", [" WHERE seguidor_FK = $IDUserURL"]);

                                foreach($Seguidores as $value){ 
                                    $usersSeguindo = $classLog->find(['codigo, foto, banner'], 'usuario', [' WHERE ID_user ='.$value['user_FK']]); 
                                    
                                    $RankUserSeguindo = 
                                    $classLog->RankUser($value['user_FK']);    
                                    $SeguidoresP = 
                                    $classLog->Count('user_FK', 'seguir', ['user_FK = '.$value['user_FK']]);
                                    $SeguindoP = 
                                    $classLog->Count('seguidor_FK', 'seguir', ['seguidor_FK = '.$value['user_FK']]);        
                        ?>
                        <div class="seguidor">
                            <div class="banner_seguidor">
                                <img src="
                                <?php if (isset($usersSeguindo['banner']) && !empty($usersSeguindo['banner'])) { ?>
                                                    ../assets/IMAGEM_USUARIO/<?= $usersSeguindo['banner']; ?>
                                                <?php } else { ?>
                                                    ../assets/IMAGENS/blank.jpg
                                                <?php } ?> 
                                " alt="">

                                <div class="perfil_seguidor">
                                    <div class="imagem_e_codigo_seguidor">
                                        <img src="
                                        <?php if (isset($usersSeguindo['foto']) && !empty($usersSeguindo['foto'])) { ?>
                                                    ../assets/IMAGEM_USUARIO/<?= $usersSeguindo['foto']; ?>
                                                <?php } else { ?>
                                                    ../assets/IMAGENS/blank.jpg
                                                <?php } ?>  
                                        " alt="">
                                        <p class="codigo_seguidor"><?=$usersSeguindo['codigo'];?></p>
                                    </div>

                                    <div class="nivel_seguir">
                                        <div class="nivel_seguidor">
                                            <p>Nv <span><?=$RankUserSeguindo['levelRAN'];?></span></p>
                                        </div>
                                        <div class="seguir">
                                            <button type="submit">Seguindo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="seguidor_info">
                                    <p>Seguidores: <span><?=$SeguidoresP;?></span></p>
                                    <p>Seguindo: <span><?=$SeguindoP;?></span></p>
                                </div>
                                    <p class="rank_seguidor">Rank:<span> unranked </span>|<span> <?=$RankUserSeguindo['rankPontosRAN'];?>pts</span></p>
                            </div>

                        </div>
                        <?php }?>
                            <!-- Termina aqui -->
                    </div>
                </div>
                <div id="Conquistas">
                    <div class="Container_conquista Check">
                        <div class="header_conquista">
                            <p class="text_conquista">Check semanal</p>
                            <p class="text_conquista">Checking: <span>4</span></p>
                            <p class="text_conquista">4/7 bonus 20xp</p>
                        </div>
                        <div class="dias_check">
                            <div class="container_check">
                                <p class="data_check">DOM</p><br>
                                <p class="xp_check">10xp</p><br>
                                <p class="texto_check">Check</p>
                            </div>
                            <div class="container_check">
                                <p class="data_check">SEG</p><br>
                                <p class="xp_check">10xp</p><br>
                                <p class="texto_check">Check</p>
                            </div>
                            <div class="container_check NaoChecada">
                                <p class="data_check">TER</p><br>
                                <p class="xp_check">10xp</p><br>
                                <p class="texto_check">Check</p>
                            </div>
                            <div class="container_check">
                                <p class="data_check">QUA</p><br>
                                <p class="xp_check">10xp</p><br>
                                <p class="texto_check">Check</p>
                            </div>
                            <div class="container_check">
                                <p class="data_check">QUI</p><br>
                                <p class="xp_check">10xp</p><br>
                                <p class="texto_check">Check</p>
                            </div>
                            <div class="container_check checado">
                                <p class="data_check">SEX</p><br>
                                <p class="xp_check">10xp</p><br>
                                <p class="texto_check">Check</p>
                            </div>
                            <div class="container_check NaoChecada">
                                <p class="data_check">SÁB</p><br>
                                <p class="xp_check">10xp</p><br>
                                <p class="texto_check">Check</p>
                            </div>
                        </div>
                    </div>
                    <div class="Container_conquista Missoes">
                        <div class="MissoesDiarias">
                            <p class="text_conquista">Missões diarias</p>
                            <hr>
                            <div class="lista_missoes">
                                <div class="container_missoes">
                                    <p class="titulo_conquista">Avaliação</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_avaliacao.png" alt="">
                                    <p>0/1</p>
                                </div>
                                <div class="container_missoes">
                                    <p class="titulo_conquista">Leitura</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_leitura.png" alt="">
                                    <p>0/1</p>
                                </div>
                            </div>
                        </div>

                        <div class="MissoesPrincipais">
                            <p class="text_conquista">Missões</p>
                            <hr>
                            <br>
                            <article>
                                Conclua as missões e ganhe pontos de experiência e de ranking. Algumas missões possuem outros graus de níveis de dificuldades a serem concluídos e que serão liberados após a conclusão da missão. Saiba mais sobre as missões clicando aqui.
                            </article>

                            <div class="lista_missoes">
                                <div class="container_missoes">
                                    <p class="titulo_conquista">Avaliação</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_avaliacao.png" alt="">
                                    <p>4/10</p>
                                </div>
                                <div class="container_missoes">
                                    <p class="titulo_conquista">Leitura</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_leitura.png" alt="">
                                    <p>18/40</p>
                                </div>
                                <div class="container_missoes">
                                    <p class="titulo_conquista">Amei</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_amei.png" alt="">
                                    <p>0/1</p>
                                </div>

                                <div class="container_missoes">
                                    <p class="titulo_conquista">Escreva</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_escreva.png" alt="">
                                    <p>0/1</p>
                                </div>

                                <div class="container_missoes">
                                    <p class="titulo_conquista">Nivel</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_nivel.png" alt="">
                                    <p>0/5</p>
                                </div>

                                <div class="container_missoes">
                                    <p class="titulo_conquista">Favoritar</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_seguir.png" alt="">
                                    <p>0/1</p>
                                </div>

                                <div class="container_missoes">
                                    <p class="titulo_conquista">Seguir</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_favoritar.png" alt="">
                                    <p>0/1</p>
                                </div>

                                <div class="container_missoes">
                                    <p class="titulo_conquista">Missões</p>
                                    <img class="icon_conquista" src="../assets/IMAGENS/conquista_missoes.png" alt="">
                                    <p>0/10</p>
                                </div>
                            </div>

                            <div class="MissoesCompleta">
                                <p class="text_conquista">Missões Completas</p>
                                <hr>

                                <div class="lista_missoes">
                                    <div class="container_missoes">
                                        <p class="titulo_conquista">Avaliação</p>
                                        <img class="icon_conquista" src="../assets/IMAGENS/conquista_avaliacao.png" alt="">
                                        <p class="concluido">10/10</p>
                                    </div>
                                    <div class="container_missoes">
                                        <p class="titulo_conquista">Leitura</p>
                                        <img class="icon_conquista" src="../assets/IMAGENS/conquista_leitura.png" alt="">
                                        <p class="concluido">40/40</p>
                                    </div>
                                    <div class="container_missoes">
                                        <p class="titulo_conquista">Amei</p>
                                        <img class="icon_conquista" src="../assets/IMAGENS/conquista_amei.png" alt="">
                                        <p class="concluido">1/1</p>
                                    </div>

                                    <div class="container_missoes">
                                        <p class="titulo_conquista">Escreva</p>
                                        <img class="icon_conquista" src="../assets/IMAGENS/conquista_escreva.png" alt="">
                                        <p class="concluido">1/1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                </div>
                </div>
            </section>
            <hr>
    </main>

    <input type="hidden" id="idseguir" value="<?=$dadosUserPerfil['ID_user'];?>">

    <script src="../assets/JAVASCRIPT/trocar_aba.js"></script>
    <script src="../assets/JAVASCRIPT/carousel.js"></script>
    <script src="../assets/JAVASCRIPT/header.js"></script>

    <?php include_once 'footer.php'; ?>
    <script>


            $('.obraPerfilLendobox').on('click', function(){

            var ID_obra_Lendo = $(this).data('id');
            var favLendoclick = "on";

            $.ajax({
                    url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_Lendo}&favclick=${favLendoclick}`,
                    success: (obraLendofav) => $(this).html(obraLendofav) 
                })	

                getFavBox()	
                getFavTwo()
                getLendoFavBox()

            }); 

            function getLendoFavBox(){
                let obrasLendofav = document.querySelectorAll(".Lendobox")
                let obraslengthLendofav = obrasLendofav.length
                for(let i=0; i<obraslengthLendofav; i++ ){
            
                var ID_obra_Lendofavbox = $(`#obraLendobox${i}`).data("id");

                $.ajax({
                    url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_Lendofavbox}`,
                    success: (obraLendofavbox) =>  $(`#obraLendobox${i}`).html(obraLendofavbox)
                })
            }	
            }
            getLendoFavBox()


        var title;
        function remover() {
            let scrool = window.scrollY + 150;

            document.querySelector('#tela_remover').style.marginTop =  scrool + "px";
            document.querySelector('body').style.overflowY = 'hidden';

            document.querySelector("#header").classList.add("filtro");
            document.querySelector("#main").classList.add("filtro");
            document.querySelector("#footer").classList.add("filtro");
            document.querySelector("#tela_remover").classList.remove("desativo");
            document.querySelector("#tela_remover").classList.add("ativo");
        }
    
        function deleteObra(){
            let idObra = document.querySelector("#remover_botao").value; 
            window.location.href = `http://localhost/e_book_square/App/Model/delete-obrabd.php?obra=${title}&del=1`; 
        }

        function modal_doacoes(){
            document.querySelector("#modal_doacoesId").style.display = "flex";
            document.querySelector('body').style.overflowY = 'hidden';
        }

        function fechar_doacoes(){
            document.querySelector("#modal_doacoesId").style.display = "none";
            document.querySelector('body').style.overflowY = 'auto';
        }

        function cancelar() {
            document.querySelector("#header").classList.remove("filtro");
            document.querySelector("#main").classList.remove("filtro");
            document.querySelector("#footer").classList.remove("filtro");
            document.querySelector("#tela_remover").classList.add("desativo");
            document.querySelector("#tela_remover").classList.remove("ativo");
            document.querySelector('body').style.overflowY = 'auto';
        }

    $("#btn_seg_user").on("click",function(){

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

            
        

        
        $('.obraPerfil').on('click', function(){

        var ID_obra_fav = $(this).data('id');
        var favclick = "on";

        $.ajax({
                url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_fav}&favclick=${favclick}`,
                success: (obrafav) => $(this).html(obrafav)
            })		
            getFavTwo()
            getFavBox()	
            getLendoFavBox()

        }); 

        function getFavTwo(){
            let obras = document.querySelectorAll(".favo")
            let obraslength = obras.length
            for(let i=0; i<obraslength; i++ ){
           
            var ID_obra_fav = $(`#obrafav${i}`).data("id");

            $.ajax({
                url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_fav}`,
                success: (obrafav) =>  $(`#obrafav${i}`).html(obrafav)
            })
        }	
        }
        getFavTwo()

         // ================== |

        $('.obraPerfilfavbox').on('click', function(){

        var ID_obra_fav = $(this).data('id');
        var favclick = "on";

        $.ajax({
                url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_fav}&favclick=${favclick}`,
                success: (obrafav) => $(this).html(obrafav) 
            })	

            getFavBox()	
            getFavTwo()
            getLendoFavBox()

        }); 

        function getFavBox(){
            let obrasfav = document.querySelectorAll(".favobox")
            let obraslengthfav = obrasfav.length
            for(let i=0; i<obraslengthfav; i++ ){
           
            var ID_obra_favbox = $(`#obrafavbox${i}`).data("id");

            $.ajax({
                url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_favbox}`,
                success: (obrafavbox) =>  $(`#obrafavbox${i}`).html(obrafavbox)
            })
        }	
        }
        getFavBox()

        // ================== |

        function botao_seguidores(){
            document.querySelector("#nav_seguidores").classList.add("ativa");
            document.querySelector("#nav_seguindo").classList.remove("ativa");
            document.querySelector(".container_seguidores_nav").style.display = "flex";
            document.querySelector(".container_seguindo_nav").style.display = "none";
        }
        function botao_seguindo(){
            document.querySelector("#nav_seguidores").classList.remove("ativa");
            document.querySelector("#nav_seguindo").classList.add("ativa");
            document.querySelector(".container_seguidores_nav").style.display = "none";
            document.querySelector(".container_seguindo_nav").style.display = "flex";
        }


        const elements = document.querySelectorAll ('.titulo_obra')
const LIMIT = 22
for (let p of elements){
    const aboveLimit = p.innerText.length > LIMIT
    const dotsOrEmpty = aboveLimit ? '...' : ''
    p.innerText = p.innerText.substring(0, LIMIT) + dotsOrEmpty
}

</script>

<script src="teste.js"></script>
</body>

</html>