<?php

include_once "_conexao/conexao.php";
include_once "class-log.php";

$classLog = new log();

if (isset($_POST["nome"])) {
	$nomeUser = $_POST['nome'];
	$userData = $classLog->findAll(['ID_user, nome, foto'], 'usuario', 
	["WHERE nome LIKE '%".$nomeUser."%' AND ID_user NOT IN (".$_SESSION['ID_user'].") LIMIT 7"]);


	if(count($userData) == 0){
		echo "Nenhum resultado encontrado para ' <strong>$nomeUser</strong> '";
		exit;
	}

	foreach ($userData as $value) {
        $fotoUser = $classLog->ifProfileImgExist($value['foto'], null);
		echo getNameByPesquisa($value['ID_user'], $value['nome'], $fotoUser);
	}
}

function getNameByPesquisa($iduser, $nome, $foto){

    $result = "<div class='itemSearchChat' data-id='$iduser'>
                    <div class='profileImageSearchChat'>
                        <img src='$foto->imgUser' alt=''>
                    </div>
                        <div class='contentSearchChat'>
                        <span class='nameUserSearchChat'>$nome</span>
                    </div>
                </div>";

	return $result;
}