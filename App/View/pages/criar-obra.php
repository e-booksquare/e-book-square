<?php
include_once '../../Model/verificacao.php';

if(isset($_GET['obra'])){
    $idObra = $_GET['obra'];
    $obrasCapa = $classLog->Obra($idObra);

    if($_SESSION['ID_user'] != $obrasCapa['user_FK'])
    { header("location: pre-criacao.php"); die;}

    $IDCatArray = array();
    $NomeCatArray = array();

    $categoria_obra = $classLog->categoria_obra($idObra);

    for($i=0; $i<count($categoria_obra); $i++ ){
        $IDCat = $categoria_obra[$i]['IDCat'];
        array_push($IDCatArray, $IDCat);

        $NomeCat = $categoria_obra[$i]['categoriaCat'];
        array_push($NomeCatArray, $NomeCat);
    }

    $qttCatObra = count($categoria_obra);

    var_dump($NomeCatArray);
    
    echo ("
    <script>
        window.catyBD = []
        window.textCatyBD = []
    </script>
    ");
    
    for ($i = 0; $i < count($IDCatArray); $i++) {
        $IDCatArr = $IDCatArray[$i];
        $NomeCat = $NomeCatArray[$i];
        echo ("
        <script>
            window.catyBD.push($IDCatArr)
            window.textCatyBD.push('$NomeCat')
        </script>
    ");
    }
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/criar-obra.css">
    <link rel="stylesheet" href="../assets/CSS/categoria-color.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>
        <?= $dados_usuario['codigo']; ?> | E-Book Square
    </title>
</head>

<body>
<?php include_once 'header.php'; ?>

    <main>
        <form action="../../Model/criar-obrabd.php" method="post" enctype="multipart/form-data">
            <div class="divisao_foto_form">
                <div class="container_adicionar_foto">
                    <div class="container_obra">

                            <form action="fazer_obra_bd.php" method="post">
                            <label for="foto_obra" class="selecao_upload">
                                <h3 class="titulo_tamanho_foto">Upload a capa frontal</h3>
                                <p class="texto_tamanho_foto"> Adicione uma imagem para capa da sua historia, recomenda-se ter o tamanho 150x230 pixels e ser de classificação etaria livre.
                                <div class="imagem_da_obra">
                                    <img class="foto_obra" 
                                    src="" 
                                    id="icon_perfil" >
                                    <div class="sem_imagem" id="sem_imagem" style="overflow: hidden;">
                                        <img src="
                                        <?php if (!empty($obrasCapa['foto_obra'])) { 
                                            $semIMG = ""
                                        ?>
                                            ../assets/IMAGEM_USUARIO/<?=$obrasCapa['foto_obra'];?> ?>
                                        <?php } else { 
                                            $semIMG = "Clique aqui para <br> adicionar a imagem";
                                        ?>
                                          
                                        <?php } ?> 
                                        " alt="" id="img_bd <?php if (!empty($obrasCapa['foto_obra'])) { echo ' imgbdtamanho';}?>" >
                                        <p class="sem_imagem_text" id="sem_imagem_text"><?=$semIMG;?></p>
                                    </div>
                                </div>
                                <input type="hidden" name="imgbd" value="<?=$obrasCapa['foto_obra'];?>">
                                
                            </label>
                        </div>
                    <input type="file" name="foto_obra" id="foto_obra"  >
                    <script>         
                        const file = document.getElementById("foto_obra");
                        const icon_perfil = document.getElementById("icon_perfil");
                        const img_bd = document.getElementById("img_bd");


                                file.addEventListener("change", () => {
                                    if(file.files.length <= 0)
                                    {
                                        return
                                    }
                                    img_bd.src = ""
                                    let reader = new FileReader();
                                    reader.onload = () => {
                                        icon_perfil.src = reader.result;
                                    }

                                    reader.readAsDataURL(file.files[0])
                                })
                    </script>
                </div>
                <div class="container_form_sobre_obra">
                    <h4>Titulo da obra</h4>
                    <input maxLength="40" class="titulo_obra_fazer_obra" type="text" name="titulo_obra_fazer_obra" id="titulo_obra_fazer_obra" 
                    value="<?php if(isset($_GET['obra'])){echo $obrasCapa['nome_obra'];}?>" required>
                    <h4 style="margin-bottom: 20px;">Sinopse da hístoria:</h4>
                    <p style="margin-bottom: 10px;">Esse campo deve-rá conter um breve resumo da historia ou um pequeno trecho da mesma.</p>
                    <textarea maxLength="500" class="sinopse" id="sinopse_fazer_obra" name="sinopse_fazer_obra" rows="5" runat="server" style="resize: none;" required><?php if(isset($_GET['obra'])){echo $obrasCapa['descricao'];}?></textarea>
                    <div>
                        <h4>Classificação etaria</h4>
                        <select  class="etaria" id="etaria" onchange="etaria_select_value()">
                        <?php if(isset($_GET['obra'])){
                            echo '<option value="escolher" disabled>Escolher</option>';
                                }else{
                                    echo '<option value="escolher" selected disabled>Escolher</option>';
                                }
                            ?>

                            <option value="Adulto"
                            <?php if(isset($_GET['obra']) && $obrasCapa['etaria'] == 'Adulto'){echo 'selected';}?>
                            >Adulto</option>

                            <option value="Adolescente"
                            <?php if(isset($_GET['obra']) && $obrasCapa['etaria'] == 'Adolescente'){echo 'selected';}?>
                            >Adolescente</option>

                            <option value="Livre" 
                            <?php if(isset($_GET['obra']) && $obrasCapa['etaria'] == 'Livre'){echo 'selected';}?>
                            >Livre</option>
                        </select>
                        <input type="hidden" name="etaria" id="etaria_input">
                        <input type="hidden" name="idobra" 
                        value="<?php if(isset($_GET['obra'])){echo $idObra;}?>">
                    </div>
                    <div class="div_selecionar_categoria">
                        <h4>Categoria da historia</h4>
                        <div class="selecionar_categoria">
                            <Select id="categoria">
                                <option value="1" selected disabled>Selecionar</option>
                               
                                <?php foreach($categorias as $categoria){ 
                                
                                $IDCat = $categoria['IDCat'];
                                $nomeCat = $categoria['categoriaCat'];
                                    echo " <option value='$IDCat' id='$nomeCat'>$nomeCat</option>";
                                }?>
                                
                            </Select>
                            <input type="hidden" name="categoria" id="categoria_input" value="[]" required>
                            <p class="botao_adicionar" onclick="categoria()">Adicionar</p>
                        </div>
                        <div class="elementos_aqui" id="elementos_aqui"></div>
                    </div>
                </div>
            </div>

            <div class="botao_comecar_escrever">
                <?php 
                    if(isset($_GET['obra']))
                    {echo '<button type="submit" class="comecar_escrever" name="atualizar" value="atualizar" style="cursor: pointer; padding: 1em 2em; font-size: 16px; width: 200px; height: 50px;">Atualizar</button>';}

                    else
                    {echo '<button type="submit" class="comecar_escrever" name="submit" value="criar-obra" style="cursor: pointer; padding: 1em 2em; font-size: 16px; width: 200px; height: 50px;">Próximo</button>';}
                ?>  
            </div>
        </form>
    </main>
    
    <?php include_once 'footer.php'; ?>
    <script src="../assets/JAVASCRIPT/criar-obra.js"></script>
    <script src="../assets/JAVASCRIPT/header.js"></script>
    
</body>

<script>
    function readImage() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("icon_perfil").style.display = "flex";
            document.getElementById("icon_perfil").src = e.target.result;
            document.getElementById("sem_imagem").style.display = "none";
        };       
        file.readAsDataURL(this.files[0]);
        
    }
}
document.getElementById("foto_obra").addEventListener("change", readImage, false);
</script>
</html>