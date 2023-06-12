<?php
 include_once "_conexao/conexao.php";
 include_once "class-log.php";

 $classLog = new log();

function getDados($classLog){
    $tipo = $_GET['tipo'];
    $IDtipo = $_GET['idtipo'];
   $comentarios = $classLog->findAll(["*"], "comentario", [" WHERE tipo = $tipo AND ID_tipo = $IDtipo ORDER BY created_at DESC"]);
   return $comentarios;
}

function renderDados($classLog){
  $comentarios = getDados($classLog);
  $UserLog = $classLog->findUser([" ID_user = ".$_SESSION['ID_user']]);

    foreach ($comentarios as $key => $cmt) {

      $UserCmt = $classLog->find(["ID_user, nome, codigo, foto"], "usuario", ["WHERE ID_user = ".$cmt['user_FK']]);
      $imgPerfil = $classLog->ifProfileImgExist($UserCmt['foto'], $UserLog['foto']);
      $IDCmt = $cmt['ID_comentario'];
      $subCmts = $classLog->findAll(["*"], "comentario", ["WHERE tipo = 6 and ID_tipo = $IDCmt"]);

   echo cmtContentComp($cmt['user_FK'], $UserCmt['nome'], $UserCmt['codigo'], $imgPerfil, $cmt['conteudo'], $cmt['created_at'], $classLog);

    foreach ($subCmts as $key => $subCmt) {

        $IDSubCmt = $subCmt['user_FK'];
        $UserSubCmt = $classLog->find(["ID_user, nome, codigo, foto"], "usuario", ["WHERE ID_user = $IDSubCmt"]);
        $imgPerfil = $classLog->ifProfileImgExist($UserSubCmt['foto'], $UserLog['foto']);

       echo subCmtComp($cmt['user_FK'], $UserSubCmt['nome'], $UserSubCmt['codigo'], $imgPerfil, $subCmt['conteudo'], $subCmt['created_at'], $subCmt['spoiler'], $classLog);
    }
    
    echo cmtTextareaComp($UserLog['nome'], $imgPerfil, $IDCmt);

  }

    return;
}


function setComentario($classLog){
    if (
        $_SERVER['REQUEST_METHOD'] == 'POST'
        && isset($_POST['conteudoCom']) && !empty($_POST['conteudoCom'])
    ) {
        // INFORMAÇÕES VINDAS DO CADASTRO
        $tipo = filter_input(INPUT_POST, 'tipoCom', FILTER_SANITIZE_NUMBER_INT);
        $conteudo = filter_input(INPUT_POST, 'conteudoCom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ID_tipo = filter_input(INPUT_POST, 'ID_tipo', FILTER_SANITIZE_NUMBER_INT);
        $IDUserObra = filter_input(INPUT_POST, 'IDUserObra', FILTER_SANITIZE_NUMBER_INT);
        $spoiler = $_POST['chk_spoiler'];
    
        // DATA CADASTRO
        date_default_timezone_set('America/Sao_Paulo');
        $created_at = date('Y-m-d H:i:s');
    
        $classLog->Comentario($IDUserObra, $conteudo, $tipo, $ID_tipo, $created_at, $spoiler);
        return;
    }
}

function cmtContentComp($IDUser, $nomeUser, $codigoUser, $fotoUser, $content, $dataCom, $classLog){
    $dataComPassados = $classLog->getTempoPassados($dataCom);
    $result = "<div class='comentarioCaixa'>
                <div class='comentario_publicado'>
                    <div class='imagem_nome_span'>
                        <div>
                            <img class='ImagemUser_escrever_comentario'
                                src='$fotoUser->imgUser'
                                alt=''>
                            <span class='NomeUser_escrever_comentario'>$nomeUser</span>
                        </div>
                        <div>
                            <span>$dataComPassados</span>
                            <span><i class='bi bi-three-dots-vertical'></i></span>
                        </div>
                    </div>
                    <div class='texto_publicado'>
                        <span class='texto'>$content</span>
                    </div>
                    <div class='responder' data-code='$codigoUser'>
                        <p id='resp'>Responder</p>
                    </div>
                </div>";
    return $result;
}

function cmtTextareaComp($nomeUser, $fotoUser, $IDCmt){
    $tipo = 6;
    $result = "<div class='resposta_da_resposta_comentario_publicado'>
                    <div class='imagem_nome_span'>
                        <div>
                            <img class='ImagemUser_escrever_comentario' src='$fotoUser->imgUserWithSession' alt=''>
                            <span class='NomeUser_escrever_comentario'>
                                $nomeUser
                            </span>
                        </div>
                        <div>
                            <span>Contém spoiler</span>
                            <input type='checkbox' id='chk_spoiler'>
                        </div>
                    </div>
                    <div class='escrever_comentario'>
                        <textarea name='' id='conteudoResp' cols='30' rows='4'></textarea>
                    </div>
                    <div class='enviar'>
                        <button type='submit' class='enviarCom' id='enviarCom' data-idtipo='$IDCmt' data-tipo='$tipo'>Enviar</button>
                    </div>
                </div>
            </div>";

    return $result;
}

function subCmtComp($IDUser, $nomeUser, $codigoUser, $fotoUser, $contentSubCom, $dataSubCom, $spoiler, $classLog){

    [$btnSpoiler, $classSpoiler] = ""; 

    if($spoiler == 1){
        $btnSpoiler = "<div onclick='tirar_filtro(1)' id='botao_VerSpoiler' class='ver_comentario_spoiler ver_comentario_spoiler1'> <p>Ver Comentário com spoiler</p> </div>";
        $classSpoiler = "spoiler";
    }
    $dataComPassados = $classLog->getTempoPassados($dataSubCom);

   $result = "<div class='respostas_comentario_publicado_spoiler'>
                    $btnSpoiler
                    <div class='imagem_nome_span'>
                        <div>
                            <img class='ImagemUser_escrever_comentario'
                                src='$fotoUser->imgUser'
                                alt=''>
                            <span class='NomeUser_escrever_comentario'>$nomeUser</span>
                        </div>
                        <div>
                            <span>$dataComPassados</span>
                            <span><i class='bi bi-three-dots-vertical'></i></span>
                        </div>
                    </div>
                    <div id='texto1' class='texto_publicado $classSpoiler'>
                        <span class='texto'>$contentSubCom</span>
                    </div>
                    <div class='responder' data-code='$codigoUser'>
                        <p>Responder</p>
                    </div>
                </div>";

    return $result;
}
// <span class='codigo_user_comentario'>@laysla</span>



if(isset($_POST['cmtclick']) && $_POST['cmtclick'] == 'on'){
    setComentario($classLog);
    renderDados($classLog); exit;
}

if(isset($_GET['action']) && $_GET['action'] == 'renderCmt'){
  renderDados($classLog); exit;
} 




   




