<?php
require_once "_conexao/conexao.php";
require_once 'class-log.php';

$classLog = new log();
$dados_usuario = $classLog->findUser([" ID_user = ".$_SESSION['ID_user']]);


if(isset($_POST['deleteBanner']))
{
    header("location: delete_db.php?del=2");
    die();
}

if(isset($_POST['deleteImagemPerfil']))
{
    header("location: delete_db.php?del=1");
    die();
}

if(isset($_POST['atualizar']) && isset($_SESSION['ID_user']))
{

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $codigo = filter_var($_POST['codigo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pix = filter_var($_POST['pix'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $padrao = "/^@[a-z0-9\-\_\&]{3,22}$/";
    
    if(!preg_match($padrao, $codigo))
    {
        $_SESSION['error_code_update'] = "error";
        header("location: ../View/pages/editar_perfil.php");
        die();
    } 
    


    // if(!getimagesize($_FILES["foto"]["tmp_name"])){
    //     $flag = 0;
    // }
    
    // if($_FILES["foto"]["size"] > 2000000){
    //     $flag = 0;
    // }  

                        // IMG PERFIL
 
    $formatosPermitidos = array("png", "jpeg", "jpg", "gif", "jfif", "bmp", "svg", "webp");

    $extensionFile =  strtolower(pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION));

    if(in_array($extensionFile, $formatosPermitidos))
    {

        $nome_original = str_replace(" ", "_", basename($_FILES["foto_perfil"]["name"]));
        $token = md5(uniqid(rand(), true));

        $pasta = "../View/assets/IMAGEM_USUARIO/";
        $temporario = $_FILES['foto_perfil']['tmp_name'];
        $foto = $token.$nome_original;
        if(move_uploaded_file($temporario, $pasta.$foto))
        {
            $fotoDeleteFromBD = $dados_usuario['foto'];

            unlink($pasta.$fotoDeleteFromBD);

            $message = "Upload feito com sucesso";
           
        }
        else
        {
            echo  $message = "Não foi possível fazer upload";
            die();
        }
    }
    else
    {
        if($extensionFile == null)
        {
            $foto = $dados_usuario['foto'];
        }
        else
        {
            echo $message = "Formato inválido: ".$extensionFile; 
            die();
        }       
    }

                            // BANNER

    $extensionFileBanner =  strtolower(pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION));

    if(in_array($extensionFileBanner, $formatosPermitidos))
    {

        $nome_original = str_replace(" ", "_", basename($_FILES["banner"]["name"]));
        $token = md5(uniqid(rand(), true));

        $pasta = "../View/assets/IMAGEM_USUARIO/";
        $temporario = $_FILES['banner']['tmp_name'];
        $banner = $token.$nome_original;
        if(move_uploaded_file($temporario, $pasta.$banner))
        {
            $bannerDeleteFromBD = $dados_usuario['banner'];

            unlink($pasta.$bannerDeleteFromBD);

            $message = "Upload feito com sucesso";
           
        }
        else
        {
            echo  $message = "Não foi possível fazer upload";
            die();
        }
    }
    else
    {
        if($extensionFileBanner == null)
        {
            $banner = $dados_usuario['banner'];
        }
        else
        {
            echo $message = "Formato inválido: ".$extensionFileBanner; 
            die();
        }       
    }



    $SQL = "UPDATE usuario SET nome = :nome, codigo = :cod, foto = :f, banner = :bnr, descricaoUSU = :descricao, chavePix = :cpix WHERE ID_user = :id";
    $conn = $pdo->prepare($SQL);
    $conn->bindValue(":id", $id);
    $conn->bindValue(":nome", $nome);
    $conn->bindValue(":cod", $codigo);
    $conn->bindValue(":f", $foto);
    $conn->bindValue(":bnr", $banner);
    $conn->bindValue(":descricao", $descricao);
    $conn->bindValue(":cpix", $pix);
    $conn->execute();

    header("location: ../View/pages/Perfil.php?user=".$_SESSION['ID_user']);
    die();
}
