<?php
include_once '../../Model/verificacao.php';

$sessionAlter = 0;
$msgSessionAlter = "";

if(isset($_SESSION['msg-perfil-edit']) ){
    $sessionAlter = true;
    $msgSessionAlter = $_SESSION['msg-perfil-edit'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../assets/CSS/editar_perfil.css">
    <title>
        <?= $dados_usuario['codigo']; ?> | Editar 
    </title>
</head>

<body>
<?php include_once 'header.php'; ?>

    <form action="../../Model/editar_db.php" method="post" enctype="multipart/form-data">

        <!-- Alterar banner -->
        <div class="banner_editar">
            <img class="editar_img" src="
            <?=$classLog->ifBannerImgExist($dados_usuario['banner']);?>  
                        " alt="" style="width: 100%;" id="banner_perfil">
            <button type="submit" style="cursor: pointer;" name="deleteBanner"><img class="lixeira_banner"
                    src="..\assets\IMAGENS\icon_remover.png" alt=""></button>

            <!-- Alterar imagem perfil -->
            <div class="imagem_perfil_editar">
                <img class="img_perfil editar_img" src="
                    <?php if (empty($dados_usuario['foto'])) { ?>
                        ../assets/IMAGENS/blank.jpg
                    <?php } else { ?>
                        ../assets/IMAGEM_USUARIO/<?= $dados_usuario['foto'];
                    } ?>
                        " alt="" style="width: 100%;" id="icon_perfil">
                <button type="submit" style="cursor: pointer;" name="deleteImagemPerfil"><img class="lixeira"
                        src="..\assets\IMAGENS\icon_remover.png" alt=""></button>
            </div>
        </div>
        <!-- Alterar banner Fim-->
        <!-- Alterar imagem perfil Fim-->
        <div class="container_trocar_imagens">
            <label class="Botao_trocar_banner" for="file_banner_perfil">Trocar Banner</label>
            <label class="Botao_trocar_perfil" for="foto_perfil">Trocar Imagem de Perfil</label>
        </div>
        <input type="file" name="banner" id="file_banner_perfil" style="display:none;" accept="image/*">
        <input type="file" name="foto_perfil" id="foto_perfil" style="display: none;" accept="image/*"> <br> <br>


        <div class="container_informacoes_usuario">
            <input type="hidden" name="id" value="<?= $_SESSION['ID_user']; ?>">

            <p class="Titulo_trocar_descricao">Mudar informações</p>

            <input  maxlength="20" class="trocar_nome trocar_informacoes" type="text" name="nome" id=""
                value="<?= $dados_usuario['nome'] ?>"> <br>

            <input maxlength="20" class="troca_codigo trocar_informacoes" type="text" name="codigo" id=""
                value="<?= $dados_usuario['codigo'] ?>"> <br>

            <hr style=" border-color: black; width:90%; margin-bottom: 30px;margin-top: 20px;">

            <label class="Titulo_trocar_descricao" for="descricao">Alterar descrição:</label>
            <textarea onClick="this.setSelectionRange(0, this.value.length)" name="descricao" id="descricao" cols="30"
                rows="10" maxlength="1000" runat="server"
                style="resize: none;"><?= $dados_usuario['descricaoUSU'] ?></textarea>
            <div class="limitador">
                <span id="aviso_limite"></span>
                <span id="limite_char" style="margin-top: 2px; text-align: right;"></span>
            </div>

            <hr style=" border-color: black; width:90%; margin-bottom: 30px;margin-top: 20px;">

            <p class="Titulo_trocar_descricao">Adicionar chave do PIX</p>


            <div class="contato_doacoes">
                <div class="container_pix containers_contatos">
                    <img src="..\assets\IMAGENS\logo_pix.png" alt="">
                    <input maxlength="20" class="Pix_contato input_doacoes"
                        placeholder="Pix: <?= $dados_usuario['chavePix']; ?>" type="text" name="pix" id="pix" 
                        value="<?=$dados_usuario['chavePix'] ?>"
                        onClick="this.setSelectionRange(0, this.value.length)">
                </div>
            </div>

            <div class="salvar_voltar">
                <a class="voltar" href="perfil.php?user=<?=$_SESSION['ID_user'];?>">voltar</a> 
                <button class="salvar" type="submit" style=" cursor: pointer;" name="atualizar"
                    id="submit">Salvar</button>
            </div>
        </div>
    </form>
    <?php include_once 'footer.php'; ?>
    <script src="../assets/JAVASCRIPT/limitador_desc.js"></script>
    <script src="../assets/JAVASCRIPT/preview_image.js"></script>
    <script src="../assets/JAVASCRIPT/preview_banner.js"></script>
    <script src="../assets/JAVASCRIPT/textarea.js"></script>
    <script src="../assets/JAVASCRIPT/Selecionar.js"></script>
    <script src="../assets/JAVASCRIPT/header.js"></script>
</body>

<script>
    $(document).ready(function (){
        function getMsgAlterPerfil($msgSession){
            let msgHTML =  `<div class="msg-perfil-edit">
                                <p>${$msgSession}</p>
                            </div>`;

            $("body").append(msgHTML);

            setTimeout(() => {
                $(".msg-perfil-edit").css("display", "none");
            }, 14000);
        }

         if (<?=$sessionAlter?> != 0) { 
             let msgSessionJS = `<?=$msgSessionAlter?> `;
                getMsgAlterPerfil(msgSessionJS)
                <?php unset($_SESSION['msg-perfil-edit']); ?>
            } 
      
    })
</script>

</html>