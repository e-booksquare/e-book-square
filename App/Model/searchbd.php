<?php

include_once "_conexao/conexao.php";
include_once "class-log.php";

$classLog = new log();

if (isset($_POST["nome"])) {
	$tituloObra = $_POST['nome'];
	$titles = $classLog->findAll(['ID_obra, nome_obra'], 'obra', 
	[" WHERE nome_obra LIKE '%".$tituloObra."%' LIMIT 6"]);

	if(count($titles) == 0){
		echo "Nenhum resultado encontrado para ' <strong>$tituloObra</strong> '";
		exit;
	}

	foreach ($titles as $value) {
		echo getObraTitleByPesquisa($value['ID_obra'], $value['nome_obra']);
	}
}

function getObraTitleByPesquisa($idobra, $titleObra){
    $result = "<a href='capa_da_obra.php?obra=$idobra' class='obra_pesquisa_click'>
                    <p>$titleObra</p>
                </a>
                <hr>";

	return $result;
}