<?php

    include_once '../../Model/verificacao.php';

    if(!isset($_SESSION['ID_user']) || empty($_SESSION['ID_user']))
    {header("location: login.php"); exit();}
    // echo "<pre>";
    // var_dump($Obra_Usuario[0]); 
    // echo "</pre>";
    // exit;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/perfil.css">
    <link rel="stylesheet" href="../assets/CSS/Ver_mais.css">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/btn-seguir.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title><?= $dadosUserPerfil['codigo']; ?> | E-Book Square </title>
</head>

<script src="teste.js"></script>

<body id="topo">
<?php include_once 'header.php'; ?>

    <main id="main" class="">

            <div class="fundo">
                <?php if(isset($dadosUserPerfil['banner']) && !empty($dadosUserPerfil['banner'])){ ?>
                <img class="editar_img" class="pelicula" src="  ../assets/IMAGEM_USUARIO/<?= $dadosUserPerfil['banner'];?>" alt="Foto de fundo do perfil">
                <?php } else{?>
                    <img class="editar_img" class="pelicula" src="../assets/IMAGENS/imagem_padrao_banner.webp">
                <?php }?> 
                <div class="icone">
                    <div class="avatar">
                        <img class="editar_img" src="
                        <?php if(isset($dadosUserPerfil['foto']) && !empty($dadosUserPerfil['foto'])){ ?>
                        ../assets/IMAGEM_USUARIO/<?= $dadosUserPerfil['foto'];?>
                    <?php } else{?>
                        ../assets/IMAGENS/blank.jpg
                    <?php }?>    
                        
                        " alt="Foto de perfil" name="perfil" id="perfil">
                    </div>
                </div>
                <div class="informacoes">
                    <div class="informacoes_user">
                        <p id="nome" name="nome"><?=$dadosUserPerfil['nome'];?></p>
                        <p id="email" name="email"><?= $dadosUserPerfil['codigo']; ?></p>
                    </div>
                </div>
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
                    <?php if($_GET['user'] == $_SESSION['ID_user']){ ?>
                    <a href="editar-perfil.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-gear" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                    </a>
                    <?php } ?>

                </div>
                <div class="botao_opcoes Seguir" id="btn_seg_user"></div>

            </div>

            <section class="ver_mais" id="obras">
                <div class="nav">
                    <nav>
                        <ul>
                            <li class="abas_vermais selecionado" onclick="abaObras()"><p >Obras do usuário</p></li>
                            <li class="abas_vermais" onclick="abaFavo()"><p >Favoritos</p></li>
                        </ul>
                    </nav>
                </div>

                <div class="container_obras_abertas">

                    <div class="barra_de_pesquisa">  
                        <input id="searchbar" onkeyup="pesquisar()" type="text" name="search" placeholder="Procure historia deste autor">
                        <i class="bi bi-search icon_pesquisar"></i>
                    </div>
                    
                    
                    <div class="conjunto-obra">  
                    <?php
                    if(! empty($ObraUserPerfil)){
                                foreach ($ObraUserPerfil as $indice => $value) { ?>
                        
                        <div class="container_obra" style="position: relative; width: 170px; margin-left: 30px;">
                            <div class="container_editar_remover_bli">
                                <div class="favo obraPerfil" id="obrafav<?=$indice;?>" data-id="<?= $value['ID_obra']; ?>" ></div>
                            </div>
                            <a href="capa_da_obra.php?obra=<?= $value['ID_obra']; ?>" >
                            
                                <div>
                                    <img class="imagem_obra" src="
                                    <?php if (isset($value['foto_obra']) && !empty($value['foto_obra'])) { ?>
                                                        ../assets/IMAGEM_USUARIO/<?= $value['foto_obra']; ?>
                                                    <?php } else { ?>
                                                    ../assets/IMAGENS/sem imagem.gif
                                                    <?php } ?>
                                    " alt="">
                                    
                               
                                </div>
                                <div class="info_obra">
                                    <p class="titulo_obra"><?= $value['nome_obra']; ?></p><br>      
                                    <p class="texto">Visualizações: 
                                        <span name="visualizacao">
                                            <?= $classLog->quatityViewByObra($value['ID_obra']); ?>
                                        </span>
                                    </p><br>
                                    <nav>
                                        <?php if($value['user_FK'] == $_SESSION['ID_user']){ ?>
    <ul class="menu">
        <li><p>Opções</p>
            <ul>
                <li><a class="itens_drop" href="criar-obra.php?obra=<?=$value['ID_obra']; ?>">Editar</a></li>


                <li><a class="excluir itens_drop" href="../../Model/delete-obrabd.php?obra=<?= $value['ID_obra']; ?>">Excluir</a></li>

                <!-- <li><a style="text-decoration:none; padding:5px 10px;" class="excluir" href="../../Model/delete-obrabd.php?obra=<?= $value['ID_obra']; ?>">Excluir</a></li> -->
                
            </ul>
        </li>
    </ul>
                                            
                                    <?php } ?>
                                    </nav>
                                </div>
                            </a>
                        </div>
                        <?php } } else { 
                                    if($_SESSION['ID_user'] != $dadosUserPerfil['ID_user'])
                                    {echo $dadosUserPerfil['nome']." ainda não publicou nenhuma obra";} 
                                    else{echo "Você ainda não possui nenhuma obra";}}?> 
                    </div>
                </div>

            </section>


            <section class="ver_mais" id="favoritos">
                <div class="nav">
                    <nav>
                        <ul>
                            <li class="abas_vermais" onclick="abaObras()"><p >Obras do usuário</p></li>
                            <li class="abas_vermais selecionado" onclick="abaFavo()" ><p >Favoritos</p></li>
                        </ul>
                    </nav>
                </div>

                <div class="container_obras_abertas">
                    <div class="barra_de_pesquisa">  
                        <input id="searchbar_fav" onkeyup="pesquisar_fav()" type="text" name="search" placeholder="Procure favoritos deste autor">
                        <i class="bi bi-search icon_pesquisar"></i>
                    </div>
                    <div class="conjunto-obra" >  

                <?php
                    $IdsObrasFav = $classLog->findAll(['obra_FK'], 'favorito', ["WHERE user_FK = ".$_GET['user']]);
                    if(! empty($IdsObrasFav)){
                        
                        foreach ($IdsObrasFav as $indice => $IdObraFav){
                            
                                $ObraFavUserPerfil = 
                                $classLog->find(['*'], 'obra', ["WHERE ID_obra = ".$IdObraFav['obra_FK']]);
                                $UserObraFav = $classLog->findUser([" ID_user = ".$ObraFavUserPerfil['user_FK']]);
                ?>

                        <div class="container_obra" style="position: relative; width: 170px; margin-left: 30px;">
                                <div class="favo_lendo">
                                    <div class="favobox obraPerfilfavbox favbli" id="obrafavbox<?=$indice;?>" data-id="<?= $IdObraFav['obra_FK']; ?>" ></div>
                                </div>
                            <a href="capa_da_obra.php?obra=<?= $ObraFavUserPerfil['ID_obra']; ?>">
                                <div style="position: relative; width: 170px;">
                                    <img class="imagem_obra" src="
                                        <?php if (isset($ObraFavUserPerfil['foto_obra']) && !empty($ObraFavUserPerfil['foto_obra'])) { ?>
                                                            ../assets/IMAGEM_USUARIO/<?= $ObraFavUserPerfil['foto_obra']; ?>
                                                        <?php } else { ?>
                                                        ../assets/IMAGENS/sem imagem.gif
                                                        <?php } ?>
                                    " alt="">
                                    
                                </div>
                                <div class="info_obra">
                                    <p class="titulo_obra"><?= $ObraFavUserPerfil['nome_obra']; ?></p><br>      
                                    <p class="texto">Autor: <span name="visualizacao"><?= $UserObraFav['nome']; ?></span></p><br>
                                    <p class="texto">Visualizações: 
                                        <span name="visualizacao">
                                            <?= $classLog->quatityViewByObra($ObraFavUserPerfil['ID_obra']); ?>
                                        </span>
                                    </p><br>
                                </div>
                            </a>                           
                        </div>
                    <?php } 
                    } else { 
                                    if($_SESSION['ID_user'] != $dadosUserPerfil['ID_user'])
                                    {echo $dadosUserPerfil['nome']." não possui obras favoritadas";} 
                                    else{echo "Você não possui obra favoritada";}}
                    ?>
                    </div>
                </div>

            </section>
    </main>
    

    <?php include_once 'footer.php'; ?>
    <div class="modal_excluir">
        <p style="font-size: 15pt">Deseja excluir essa obra?</p>
        <p style="font-size: 12pt; font-style: italic;">Depois de excluido não sera possivel recuperar</p>
        <p style="padding-top: 5px"><span style="font-weight: bold;">Titulo: </span><span> <?= $value['nome_obra']; ?></span></p>
        <div class="container_botoes_excluir">
            <a class="botao_container_excluir excluir_modal" href="../../Model/delete-obrabd.php?obra=<?= $value['ID_obra']; ?>">Excluir</a>
            <p class="botao_container_excluir cancelar" onclick="cancelar()">Cancelar</p>
        </div>
    </div> 
</body>

<input type="hidden" id="idseguir" value="<?=$dadosUserPerfil['ID_user'];?>">
<script src="../assets/JAVASCRIPT/header.js"></script>


<script>

function abaObras(){
        document.querySelector("#favoritos").style.display="none";
        document.querySelector("#obras").style.display="block";
    }
    function abaFavo(){
        document.querySelector("#favoritos").style.display="block";
        document.querySelector("#obras").style.display="none";
    }
    function AbriExcluir(){
        var modal_excluir= document.querySelector(".modal_excluir");
        modal_excluir.style.display="block";
        const scrollY = window. pageYOffset + 150;
        modal_excluir.style.marginTop= scrollY + "px";
        document.querySelector("#topo").classList.add("travar");
        document.querySelector("#main").classList.add("filtro");
    }
    function cancelar(){
        var modal_excluir= document.querySelector(".modal_excluir");
        modal_excluir.style.display="none";
        document.querySelector("#topo").classList.remove("travar");
        document.querySelector("#main").classList.remove("filtro");
        
    }

    $('.obraPerfil').on('click', function(){

var ID_obra_fav = $(this).data('id');
var favclick = "on";

$.ajax({
        url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_fav}&favclick=${favclick}`,
        success: (obrafav) => $(this).html(obrafav)
    })		

}); 

let obras = document.querySelectorAll(".favo")
let obraslength = obras.length
for(let i=0; i<obraslength; i++ ){
   
    var ID_obra_fav = $(`#obrafav${i}`).data("id");

    $.ajax({
        url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_fav}`,
        success: (obrafav) =>  $(`#obrafav${i}`).html(obrafav)
    })
}	

//----------


$('.obraPerfilfavbox').on('click', function(){

var ID_obra_fav = $(this).data('id');
var favclick = "on";

$.ajax({
        url: `../../Model/favoritobd.php?action=renderFav&obra=${ID_obra_fav}&favclick=${favclick}`,
        success: (obrafav) => $(this).html(obrafav)
    })		

}); 

getFavBoxBli()

function getFavBoxBli(){
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


//-----

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


const elements = document.querySelectorAll ('.titulo_obra')
const LIMIT = 22
for (let p of elements){
    const aboveLimit = p.innerText.length > LIMIT
    const dotsOrEmpty = aboveLimit ? '...' : ''
    p.innerText = p.innerText.substring(0, LIMIT) + dotsOrEmpty
}




function pesquisar() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('titulo_obra');
    let y = document.getElementsByClassName('container_obra');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            y[i].style.display="none";
        }
        else {
            y[i].style.display="block";                 
        }
    }
}

function pesquisar_fav() {
    let input = document.getElementById('searchbar_fav').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('titulo_obra');
    let y = document.getElementsByClassName('container_obra');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            y[i].style.display="none";
        }
        else {
            y[i].style.display="block";                 
        }
    }
}

</script>

</html>

