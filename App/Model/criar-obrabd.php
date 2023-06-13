<?php

// echo "<pre>";
// var_dump($_POST,"<br>", $_FILES, "<br>",$_POST['imgbd']); 
// echo "</pre>"; die; 

include_once "_conexao/conexao.php";
include_once "class-log.php";

$classLog = new log();

if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['ID_user']) && 
isset($_POST['atualizar']) || isset($_POST['submit'])) 
{

    if($_POST['titulo_obra_fazer_obra'] == null){
        $_SESSION['msg-criar-obra'] = "Titulo da obra não"; 
        header("location: ../View/pages/editar-perfil.php");
        die();
    }
    
    $titulo_obra = filter_input(INPUT_POST,'titulo_obra_fazer_obra', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descr_obra = filter_input(INPUT_POST,'sinopse_fazer_obra', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $etaria_obra = filter_input(INPUT_POST,'etaria', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categorias_obra = $_POST['categoria'];

    $foto = setInfoImg($_POST['imgbd']);

    $categorias_obra = explode(",", $categorias_obra); 

    // DATA CADASTRO
    date_default_timezone_set('America/Sao_Paulo');
    $data_obra = date('Y-m-d H:i:s');

    if(isset($_POST['submit'])){
        if ($classLog->criar_Obra($_SESSION['ID_user']) == true){

            $validaçãoNovaObra = $classLog->recente_Obra($_SESSION['ID_user']);
    
            if ($validaçãoNovaObra[1] == true){
    
                if($classLog->criar_info_obra($validaçãoNovaObra[0], $titulo_obra, $_SESSION['ID_user'], $descr_obra,   $etaria_obra, $categorias_obra, $data_obra, $foto) == true)
                {
                    $classLog->obraModifyDate($validaçãoNovaObra[0], $data_obra);

                    $UserLog = $classLog->findUser([" ID_user =".$_SESSION['ID_user']]);

                    $ObraUserVisit = $classLog->Obra($validaçãoNovaObra[0]);

                    $conteudoNOT = " publicou uma nova obra, '".$classLog->CharsLimit($ObraUserVisit['nome_obra'], 25)."', seja um dos primeiros a lerem !!";

                    $URLNOT = "capa_da_obra.php?obra=".$validaçãoNovaObra[0];

                    $Seguidores = $classLog->findAll(["seguidor_FK"], "seguir", [" WHERE user_FK = ".$_SESSION['ID_user']]);

                    foreach ($Seguidores as $key => $value) {
                        $classLog->insertNot(
                            1,
                            9, 
                            $UserLog['nome'], 
                            $UserLog['foto'], 
                            $conteudoNOT,
                            $URLNOT, 
                            $classLog->getTimeNow(), 
                            $value['seguidor_FK'], 
                            $_SESSION['ID_user']
                        );
                    }

                    header("location: ../View/pages/escrever-obra.php?obra=$validaçãoNovaObra[0]");
                    exit();
                }
            }
    
        } else {
            header("location: ../View/pages/capa_da_obra.php?obra=".$_POST['idobra']);
            exit();
        }
    }

    if(isset($_POST['atualizar'])){
    
        if($classLog->up_info_obra($_POST['idobra'], $titulo_obra, $_SESSION['ID_user'], $descr_obra, $etaria_obra, $categorias_obra, $foto) == true)
        {
            $classLog->obraModifyDate($_POST['idobra'], $data_obra);
            header("location: ../View/pages/capa_da_obra.php?obra=".$_POST['idobra']);
            exit();
        }
            
    }

} else {
    header("location: ../View/pages/capa_da_obra.php?obra=".$_POST['idobra']);
    exit();
}



function setInfoImg($imgUserBD){
    if(!empty($_FILES['foto_obra']['name'])){
        $formatosPermitidos = array("png", "jpeg", "jpg", "gif", "jfif", "bmp", "svg", "webp");
        $extensionFile =  strtolower(pathinfo($_FILES['foto_obra']['name'], PATHINFO_EXTENSION));
        if(in_array($extensionFile, $formatosPermitidos))
        {

            $nome_original = str_replace(" ", "_", basename($_FILES['foto_obra']["name"]));
            $token = md5(uniqid(rand(), true));

            $pasta = "../View/assets/IMAGEM_USUARIO/";
            $temporario = $_FILES['foto_obra']['tmp_name'];
            $foto = $token.$nome_original;
            if(move_uploaded_file($temporario, $pasta.$foto))
            {
                $fotoDeleteFromBD = $imgUserBD;

                unlink($pasta.$fotoDeleteFromBD);
                return $foto;
            }
            else
            {
                $message = "Não foi possível fazer upload";
                return $message;
            }
        }
        else
        {
            return $message = "Formato inválido: ".$extensionFile;     
        }
    } else{

        $foto = null;
        if(!empty($imgUserBD)){
            $foto = $imgUserBD;
        }
        return $foto;
    }
}