<?php
header('Content-type: application/json; charset=utf-8');

include_once '_conexao/conexao.php';
include_once 'class-log.php';

$classLog = new log();

    


if (isset($_POST['search']) && $_POST['search'] == 'obra') {

    $notIn = [""];

    if(isset($_POST['notIn'])){

        $idObras = implode(", ", $_POST['notIn']);
        $notIn = [" AND ID_obra NOT IN ($idObras) "];
    }

    $searchTerm = $_POST['searchTerm'];
    $limit = $_POST['limit'];


    $data = $classLog->findAll(['ID_obra, foto_obra, nome_obra, descricao, user_FK'], 'obra', 
        [" WHERE nome_obra LIKE '%".$searchTerm."%' $notIn[0] ORDER BY ID_obra DESC LIMIT $limit"]);

    $dataCount = $classLog->Count('ID_obra', 'obra', 
        [" nome_obra LIKE '%".$searchTerm."%' "]);


    $results = array();
    $result = array();

    foreach ($data as $key => $value) {

        $ID_user = $value['user_FK'];
        $autorObra = $classLog->find(['nome'], 'usuario', 
            [" WHERE ID_user = $ID_user LIMIT 1"]);

        $imgObra = $classLog->getObraImg($value['foto_obra']);

        $categoria_obra = $classLog->categoria_obra($value['ID_obra']);
        
        $search = array();
        $search['idObra'] = $value['ID_obra'];
        $search['nomeObra'] = $value['nome_obra'];
        $search['autorObra'] = $autorObra['nome'];
        $search['imgObra'] = $imgObra;
        $search['descObra'] = $value['descricao'];
        $search['categoria'] = $categoria_obra;
        $result[] = $search;
    }

    $results['count'] = $dataCount;
    $results['search'] = $result;

    echo json_encode($results);
    exit;
}

echo "falha";
exit;
    
