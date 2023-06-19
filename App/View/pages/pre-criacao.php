<?php
include_once '../../Model/verificacao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="estilo/css/pagina_de_escrever.css"> -->
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/pre-criacao.css">
    <title>Escrever | E-Book Square</title>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

</head>
<body>
    <main>
        <?php include_once 'header.php'; ?>
        
        <section class="header_titulo">
            <div class="texto_titulo_header">
                <p class="texto_minhas_ob">Minhas obras</p>
                <a href="criar-obra.php"><button class="criar_nova_obra">Criar nova obra</button></a>
            </div>
            <div class="listra"> </div>
        </section>

        
        <section class="container_obra">
        <?php
            if(! empty($Obra_Usuario)){ 
                foreach($Obra_Usuario as $value){ 
                $porcAvaliativa = $classLog->ratingPorcent($value['ID_obra']);
                $capitulo_Count = $classLog->Count('ID_capitulo', 'capitulo', ["obra_FK =".$value['ID_obra']]); 
            ?>
                <div class="mesma_linha" style="margin: 50px 0;">
                <a href="capa_da_obra.php?obra=<?=$value['ID_obra'];?>">
                    <img class="imagem_obra" src="
                    <?=$classLog->getObraImg($value['foto_obra']);?>  
                    " alt="">
                </a>
                    <div class="info_obra">
                        <div class="titulo_editar_3pontos">
                            <p class="titulo_obra"><?=$value['nome_obra'];?></p>
                            <div class="opcoes_canto">
                                <a href="escrever-obra.php?obra=<?=$value['ID_obra']?>" class="add_cap">Adicionar novo capitulo</a>   
                                <a href="criar-obra.php?obra=<?=$value['ID_obra'];?>" class="editar">Editar obra</a>                   
                            </div>
                        </div>
                        <p class="p_info"><span class="negrito">Iniciado em </span><span name="" id=""><?=$classLog->formatarData($value['created_at']);?></span></p>
                        <p class="p_info" style="width: 900px; word-break: break-all;"><span class="negrito">Descrição: </span><?=$value['descricao'];?></p>
                        <p class="p_info"><span class="negrito">Avaliações positivas: </span><span><?= $porcAvaliativa;?></span></p>  
                        <p class="p_info"><span class="negrito">capitulos:</span><span name="" id=""> <?=$capitulo_Count;?></span></p>   <p class="atualizado"><span class="negrito">Atualizada</span> 
                        <span name="" id="">
                        <?=$classLog->getTempoPassados($value['updated_at']);?>
                        </span></p>           
                    </div>
                    
                </div>            
            </div>
            <?php }} else{?>
                <p class="nao_tem_obras"> <?php echo "Você não possui nenhuma obra";?> </p>
                
                <?php } ?>
            
        </section>

        <?php if(count($Obra_Usuario) == 10){ ?> 
        <a href="#" class="ver_mais"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
    <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
    </svg> ver todas as historias</a>
    <?php } ?>

        
        
    </main>
    <?php include_once 'footer.php'; ?>
</body>

<script src="../assets/JAVASCRIPT/header.js"></script>

<script>
    const elements = document.querySelectorAll ('.titulo_obra')
const LIMIT = 40
for (let p of elements){
    const aboveLimit = p.innerText.length > LIMIT
    const dotsOrEmpty = aboveLimit ? '...' : ''
    p.innerText = p.innerText.substring(0, LIMIT) + dotsOrEmpty
}

</script>
</html>