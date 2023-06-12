<?php

class log
{

    public function getTimeNow()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dateTimeNow = date('Y-m-d H:i:s');
        return $dateTimeNow;
    }

    public function formatarData($dataHora) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataFormatada = date('Y-m-d', strtotime($dataHora));
        return $dataFormatada;
    }

    public function findUser($refeDado)
    {
        $dados_usuario = $this->find(['*'], 'usuario', [" WHERE " . $refeDado[0]]);
        return $dados_usuario;
    }

    public function logar_Usuario($email, $senha)
    {

        global $pdo;

        $ComandoSQL = "SELECT * FROM usuario WHERE email = :e";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":e", $email);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $usuario = array();
            $usuario = $conn->fetch(PDO::FETCH_ASSOC);
            unset($_SESSION['ID_user']);
            $_SESSION['ID_user'] = $usuario['ID_user'];
            $_SESSION['status'] = $usuario['status'];

            if (password_verify($senha, $usuario['senha']) == false) {
                $_SESSION['login_passw_error'] = 'error';
                return false;
            }

            return true;
        }

        $_SESSION['login_not_exist_error'] = 'error';
        return false;
    }

    public function logar_Usuario_Google($email)
    {

        global $pdo;

        $ComandoSQL = "SELECT * FROM usuario WHERE email = :e";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":e", $email);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $usuario = array();
            $usuario = $conn->fetch(PDO::FETCH_ASSOC);
            unset($_SESSION['ID_user']);
            $_SESSION['ID_user'] = $usuario['ID_user'];
            $_SESSION['status'] = $usuario['status'];

            return true;
        }

        $_SESSION['login_not_exist_error'] = 'error';
        return false;
    }

    public function recuperar_senha($email)
    {

        global $pdo;

        $ComandoSQL = "SELECT * FROM usuario WHERE email = :e limit 1";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":e", $email);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $usuario = $conn->fetch(PDO::FETCH_ASSOC);
            $tokenRecuperarSenha = password_hash($usuario['ID_user'], PASSWORD_DEFAULT);

            $ComandoSQL = "UPDATE usuario SET recuperar_senha = :token WHERE ID_user = :id limit 1";
            $conn = $pdo->prepare($ComandoSQL);
            $conn->bindValue(":id", $usuario['ID_user']);
            $conn->bindValue(":token", $tokenRecuperarSenha);
            $conn->execute();
            return true;
        }

        $_SESSION['msg'] = "<p style:'color: #ff0000;'>Erro: Usuário não encontrado</p>";
        return false;

    }

    public function cadastrar_Usuario($nome, $email, $senhaHash, $data_cad)
    {

        global $pdo;

        $ComandoSQL = "SELECT nome, email, senha FROM usuario WHERE email = :e";
        $conn = $pdo->prepare($ComandoSQL);
        // $conn->bindValue(":n", $nome);
        $conn->bindValue(":e", $email);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $_SESSION['already_exist_email_error'] = 'error';
            return false;
        } else {

            echo $codigoCad = $this->cad_cod($nome);

            $ComandoSQL = "INSERT INTO usuario (nome, codigo, email, senha, data_cad) VALUES (:n, :c, :e, :s, :d)";
            $conn = $pdo->prepare($ComandoSQL);
            $conn->bindValue(":n", $nome);
            $conn->bindValue(":c", $codigoCad);
            $conn->bindValue(":e", $email);
            $conn->bindValue(":s", $senhaHash);
            $conn->bindValue(":d", $data_cad);

            if ($conn->execute()) {
                $ComandoSQL = "SELECT ID_user FROM usuario WHERE email = :e";
                $conn = $pdo->prepare($ComandoSQL);
                $conn->bindValue(":e", $email);
                $conn->execute();

                $dados = $conn->fetch(PDO::FETCH_ASSOC);
                $this->CriarRankeamento($dados['ID_user']);

                return true;
            }
        }
    }



    public function categoria_obra($id_obra)
    {
        $categorias = $this->findAll(['IDCat, categoriaCat'], 'obra, categoria_da_obra, categoria', ["WHERE categoria.IDCat = categoria_da_obra.IDCatFK AND obra.ID_obra = categoria_da_obra.IDObraFK AND obra.ID_obra = $id_obra"]);
        return $categorias;
    }

    public function categorias()
    {
        $categorias = $this->findAll(['IDCat, categoriaCat'], 'categoria', ["ORDER BY IDCat"]);
        return $categorias;
    }

    public function Obra_Usuario($id_user, array $obrasExcluir = [])
    {

        global $pdo;
        $Obra_Usuario = array();

        if (!empty($obrasExcluir))
            $obrasExcluir = implode(', ', $obrasExcluir);
        else
            $obrasExcluir = '';

        $ComandoSQL = "SELECT ID_obra, nome_obra, user_FK, descricao, etaria, created_at, updated_at, foto_obra, Finalizado FROM obra WHERE obra.user_FK = :u AND ID_obra NOT IN (:obras) ORDER BY ID_obra DESC;";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":u", $id_user);
        $conn->bindValue(":obras", $obrasExcluir);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $Obra_Usuario = $conn->fetchAll(PDO::FETCH_ASSOC);
        }

        return $Obra_Usuario;
    }

    public function Obra($id_obra)
    {

        global $pdo;
        $Obra_Usuario = array();
        $ComandoSQL = "SELECT ID_obra, nome_obra, user_FK, descricao, etaria, created_at, updated_at, foto_obra, nome, foto, Finalizado FROM obra, usuario WHERE obra.ID_obra = :u and obra.user_FK = usuario.ID_user";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":u", $id_obra);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $Obra_Usuario = $conn->fetch(PDO::FETCH_ASSOC);
        }

        return $Obra_Usuario;
    }

    public function Obras()
    {

        global $pdo;
        $Obras = array();
        $ComandoSQL = "SELECT ID_obra, nome_obra, user_FK, descricao, created_at, foto_obra, nome, foto, etaria, Finalizado FROM obra, usuario WHERE obra.user_FK = usuario.ID_user ORDER BY created_at DESC;";
        $conn = $pdo->query($ComandoSQL);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $Obras = $conn->fetchAll(PDO::FETCH_ASSOC);
        }

        return $Obras;
    }

    public function MINCap($id_obraFK)
    {

        global $pdo;
        $ObraFK = array();
        $ComandoSQL = "SELECT MIN(ID_capitulo) FROM capitulo WHERE obra_FK = $id_obraFK;";
        $conn = $pdo->query($ComandoSQL);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $ObraFK = $conn->fetchAll(PDO::FETCH_ASSOC);
        }

        return $ObraFK[0]['MIN(ID_capitulo)'];
    }

    public function Capitulo($IDObraFK)
    {
        $capitulos = $this->findAll(['ID_capitulo, titulo_cap, conteudo, created_at '], 'capitulo', ["WHERE obra_FK = $IDObraFK ORDER BY created_at ASC"]);
        return $capitulos;
    }

    public function CapituloEspecifico($IDCap, $IDObraFK)
    {
        $capitulo = $this->find(['ID_capitulo, titulo_cap, conteudo, created_at '], 'capitulo', ["WHERE obra_FK = $IDObraFK and ID_capitulo = $IDCap"]);
        return $capitulo;
    }

    public function CapFeed()
    {
        $capitulos = $this->findAll(['ID_capitulo, titulo_cap, obra_FK, created_at '], 'capitulo', ["ORDER BY created_at DESC"]);
        return $capitulos;
    }
    public function quatityCapWord($obraFK)
    {
        $capContent = $this->findAll(['conteudo'], 'capitulo', [" WHERE obra_FK = $obraFK"]);
        $lengthCap = sizeof($capContent);
        $lenCaps = array();
        for ($l = 0; $l < $lengthCap; $l++) {
            $len = str_word_count($capContent[$l]['conteudo']);
            array_push($lenCaps, $len);
        }
        $totalCapsWord = array_sum($lenCaps);
        return $totalCapsWord;
    }

    public function quatityViewByObra($obraFK)
    {
        $IDCaps = $this->findAll(['ID_capitulo'], 'capitulo', [" WHERE obra_FK = $obraFK"]);
        $lengthCap = sizeof($IDCaps);
        $lenViewCaps = array();
        for ($l = 0; $l < $lengthCap; $l++) {
            $IDCap = $IDCaps[$l]['ID_capitulo'];
            $viewByCap = $this->count("IDView", "view", [" capitulo_FK = $IDCap"]);
            array_push($lenViewCaps, $viewByCap);
        }
        $totalViews = array_sum($lenViewCaps);
        return $totalViews;
    }

    public function lendoObrasPerfil()
    {
        $IDUser = $_SESSION['ID_user'];
        $capView = $this->findAll(
            ['capitulo_FK'],
            'view',
            [" WHERE user_FK = $IDUser ORDER BY IDView DESC"]
        );

        $IDObraArr = array();

        foreach ($capView as $value) {

            if (count($IDObraArr) == 4) {
                break;
            }

            $IDObraCapView = $this->find(
                ['obra_FK'],
                'capitulo',
                [" WHERE ID_capitulo =" . $value['capitulo_FK']]
            );

            if (!in_array($IDObraCapView['obra_FK'], $IDObraArr)) {
                array_push($IDObraArr, $IDObraCapView['obra_FK']);
            }
        }

        return $IDObraArr;
    }
    public function chatItemDataList()
    {
        $IDInOutArray = array();
        $IDInOutArrayWithRepetition = array();
        $IDInOutMessageArray = array();
        $IDMessage = array();
        $DataUserChatItemList = array();

        $IDUser = $_SESSION['ID_user'];

        $IDInComing = $this->findAll(
            ['incoming_msg_id'],
            'messages',
            [" WHERE outgoing_msg_id = $IDUser"]
        );

        $IDOutComing = $this->findAll(
            ['outgoing_msg_id'],
            'messages',
            [" WHERE incoming_msg_id = $IDUser"]
        );

        for ($l = 0; $l < count($IDOutComing); $l++) {
            array_push($IDInOutArrayWithRepetition, $IDOutComing[$l]['outgoing_msg_id']);
        }

        for ($l = 0; $l < count($IDInComing); $l++) {
            array_push($IDInOutArrayWithRepetition, $IDInComing[$l]['incoming_msg_id']);
        }

        $IDInOutArray = array_unique($IDInOutArrayWithRepetition);

        foreach ($IDInOutArray as $value) {

            $IDInOutMessage = $this->find(
                ['MAX(msg_id)'],
                'messages',
                [" WHERE incoming_msg_id = $value OR outgoing_msg_id = $value"]
            );
            array_push($IDInOutMessageArray, $IDInOutMessage['MAX(msg_id)']);
        }

        arsort($IDInOutMessageArray);

        foreach ($IDInOutMessageArray as $value) {
            $IDMessage = $this->find(
                ['*'],
                'messages',
                [" WHERE msg_id = $value"]
            );
            array_push($DataUserChatItemList, $IDMessage);
        }

        return $DataUserChatItemList;
    }

    public function criar_Obra($ID_user)
    {

        global $pdo;

        $ComandoSQL = "INSERT INTO obra (user_FK) VALUES (:id_user)";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":id_user", $ID_user);
        $conn->execute();

        return true;
    }

    public function cadastrar_Cap($titulo_cap, $conteudo, $obra_FK, $created_at)
    {

        global $pdo;

        $ComandoSQL = "INSERT INTO capitulo (titulo_cap, obra_FK, conteudo, restricao, created_at, updated_at) VALUES (:t_cap, :o_FK, :c_cap, :r_cap, :d_cap, :up)";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":t_cap", $titulo_cap);
        $conn->bindValue(":o_FK", $obra_FK);
        $conn->bindValue(":c_cap", $conteudo);
        $conn->bindValue(":r_cap", 0);
        $conn->bindValue(":d_cap", $created_at);
        $conn->bindValue(":up", $created_at);
        $conn->execute();

        return true;
    }

    public function Comentario($IDUserObra, $conteudo, $tipo, $ID_tipo, $created_at, $spoiler)
    {

        global $pdo;

        $ComandoSQL = "INSERT INTO comentario (user_FK, destinatario_FK, conteudo, tipo, created_at, ID_tipo, spoiler) VALUES (:r_com, :dFK_com, :c_com, :t_com, :d_com, :idtipo, :spoiler)";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":r_com", $_SESSION['ID_user']);
        $conn->bindValue(":dFK_com", $IDUserObra);
        $conn->bindValue(":c_com", $conteudo);
        $conn->bindValue(":t_com", $tipo);
        $conn->bindValue(":d_com", $created_at);
        $conn->bindValue(":idtipo", $ID_tipo);
        $conn->bindValue(":spoiler", $spoiler);
        $conn->execute();

        return true;
    }



    public function recente_Obra($ID_user)
    {

        global $pdo;

        $ComandoSQL = "SELECT MAX(ID_obra) FROM obra WHERE user_FK = :id_user";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":id_user", $ID_user);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            $obra_recente = array();
            $obra_recente = $conn->fetch(PDO::FETCH_ASSOC);


            return [$obra_recente['MAX(ID_obra)'], true];
        }
        return false;
    }

    public function Obra_Usuario_recente($user, $id_obra_recente)
    {

        $Obra_Usuario_recente = $this->findAll(
            ['nome_obra, descricao, etaria, foto_obra, categoriaCat'],
            'obra, categoria_da_obra, categoria',
            ["WHERE categoria.IDCat = categoria_da_obra.IDCatFK AND obra.ID_obra = categoria_da_obra.IDObraFK AND obra.user_FK = $user AND obra.ID_obra = $id_obra_recente"]
        );
        return $Obra_Usuario_recente;
    }

    public function criar_info_obra($id_obra, $titulo_obra, $id_user, $descr_obra, $etaria_obra, $categorias_obra, $created_at, $foto)
    {

        global $pdo;

        $ComandoSQL = "UPDATE obra SET nome_obra = :nm_obra, descricao = :dc_obra, etaria = :etr_obra, created_at = :d_obra, foto_obra = :foto_obra WHERE ID_obra = :id_obra and user_FK = :id_user";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":id_user", $id_user);
        $conn->bindValue(":id_obra", $id_obra);
        $conn->bindValue(":nm_obra", $titulo_obra);
        $conn->bindValue(":dc_obra", $descr_obra);
        $conn->bindValue(":etr_obra", $etaria_obra);
        $conn->bindValue(":d_obra", $created_at);
        $conn->bindValue(":foto_obra", $foto);
        $conn->execute();

        foreach ($categorias_obra as $value) {

            $ComandoSQL = "INSERT INTO categoria_da_obra (IDObraFK, IDCatFK) VALUES (:id_obra, :id_cat)";
            $conn3 = $pdo->prepare($ComandoSQL);
            $conn3->bindValue(":id_obra", $id_obra);
            $conn3->bindValue(":id_cat", $value);
            $conn3->execute();
        }

        return true;

    }
    public function up_info_obra($id_obra, $titulo_obra, $id_user, $descr_obra, $etaria_obra, $categorias_obra, $foto)
    {

        global $pdo;

        $ComandoSQL = "UPDATE obra SET nome_obra = :nm_obra, descricao = :dc_obra, etaria = :etr_obra, foto_obra = :foto_obra WHERE ID_obra = :id_obra and user_FK = :id_user";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":id_user", $id_user);
        $conn->bindValue(":id_obra", $id_obra);
        $conn->bindValue(":nm_obra", $titulo_obra);
        $conn->bindValue(":dc_obra", $descr_obra);
        $conn->bindValue(":etr_obra", $etaria_obra);
        $conn->bindValue(":foto_obra", $foto);
        $conn->execute();


        $ComandoSQL = "DELETE FROM categoria_da_obra WHERE IDObraFK = $id_obra";
        $pdo->query($ComandoSQL);

        foreach ($categorias_obra as $value) {

            $ComandoSQL = "INSERT INTO categoria_da_obra (IDObraFK, IDCatFK) VALUES (:id_obra, :id_cat)";
            $conn3 = $pdo->prepare($ComandoSQL);
            $conn3->bindValue(":id_obra", $id_obra);
            $conn3->bindValue(":id_cat", $value);
            $conn3->execute();
        }

        return true;

    }

    public function obraModifyDate($id_obra, $update)
    {

        global $pdo;

        $ComandoSQL = "UPDATE obra SET updated_at = :up WHERE ID_obra = :id_obra and user_FK = :id_user";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":id_user", $_SESSION['ID_user']);
        $conn->bindValue(":id_obra", $id_obra);
        $conn->bindValue(":up", $update);
        $conn->execute();

        return true;

    }

    public function CriarRankeamento($iduser)
    {

        global $pdo;

        $ComandoSQL = "INSERT INTO rankeamento (user_FKRAN) VALUES (:userFK)";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":userFK", $iduser);
        $conn->execute();

        return true;
    }

    public function ADDPointRank()
    {

        global $pdo;

        $pointCreateCap = 10;
        $UserPoints = $this->find(['rankPontosRAN'], 'rankeamento', ["WHERE user_FKRAN = " . $_SESSION['ID_user']]);
        $Points = $UserPoints['rankPontosRAN'] + $pointCreateCap;

        $ComandoSQL = "UPDATE rankeamento SET rankPontosRAN = :points WHERE user_FKRAN = :id_user";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":id_user", $_SESSION['ID_user']);
        $conn->bindValue(":points", $Points);
        $conn->execute();

        return true;

    }

    public function RankUser($id)
    {
        $UserPoints = $this->find(['*'], 'rankeamento', ["WHERE user_FKRAN = $id"]);
        return $UserPoints;
    }

    public function pointsRankUser($id)
    {
        $UserPoints = $this->find(['rankPontosRAN'], 'rankeamento', ["WHERE user_FKRAN = $id"]);
        return $UserPoints['rankPontosRAN'];
    }

    public function pointsRankAll()
    {
        $UserPoints = $this->findAll(['user_FKRAN, rankPontosRAN'], 'rankeamento', ["ORDER BY rankPontosRAN DESC LIMIT 5"]);
        return $UserPoints;
    }
    public function insertNot($conta_obra, $tipoNOT, $nomeNOT, $fotoNOT, $conteudoNOT, $URLNOT, $dataNOT, $destinatario_FKNOT, $user_FKNOT)
    {

        if ($destinatario_FKNOT == $user_FKNOT) {
            return;
        }

        global $pdo;

        $nNot = $this->Count('IDNOT', ' notificacao ', [
            " tipoNOT = $tipoNOT AND 
        destinatario_FKNOT = $destinatario_FKNOT AND user_FKNOT = $user_FKNOT"
        ]);

        if ($nNot > 0) {
            $ComandoSQL = "DELETE FROM notificacao WHERE tipoNOT = $tipoNOT AND destinatario_FKNOT = $destinatario_FKNOT AND user_FKNOT = $user_FKNOT";
            $pdo->query($ComandoSQL);
        }

        $ComandoSQL =
            "INSERT INTO notificacao (conta_obra, tipoNOT, nomeNOT, fotoNOT, conteudoNOT, URLNOT, dataNOT, destinatario_FKNOT, user_FKNOT) 
        VALUES (:conta_obra, :tipoNOT, :nomeNOT, :fotoNOT, :conteudoNOT, :URLNOT, :dataNOT, :destinatario_FKNOT, :user_FKNOT)";

        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":conta_obra", $conta_obra);
        $conn->bindValue(":tipoNOT", $tipoNOT);
        $conn->bindValue(":nomeNOT", $nomeNOT);
        $conn->bindValue(":fotoNOT", $fotoNOT);
        $conn->bindValue(":conteudoNOT", $conteudoNOT);
        $conn->bindValue(":URLNOT", $URLNOT);
        $conn->bindValue(":dataNOT", $dataNOT);
        $conn->bindValue(":destinatario_FKNOT", $destinatario_FKNOT);
        $conn->bindValue(":user_FKNOT", $user_FKNOT);
        $conn->execute();

        return true;
    }

    function cad_cod($nome)
    {

        global $pdo;
        $code_temp = "@" . $nome;
        $codigo = strtolower(str_replace(" ", "", $code_temp));

        $ComandoSQL = "SELECT codigo FROM usuario WHERE codigo = :c";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":c", $codigo);
        $conn->execute();

        if ($conn->rowCount() > 0) {

            $onlyNumbersOfCode = (int) $codigo;
            $newNumber = rand($onlyNumbersOfCode, 200);
            $newCode = $codigo . $newNumber;
            return $newCode;
        }

        return $codigo;

    }

    public function ratingPorcent($obraFK)
    {
        $capID = $this->findAll(['ID_capitulo'], 'capitulo', [" WHERE obra_FK = $obraFK"]);
        $likesAll = array();
        $dislikesAll = array();

        foreach ($capID as $value) {
            $like =
                $this->Count("ID_like", "likes", [" tipo = 3 AND feedback = 1 AND ID_tipo = " . $value['ID_capitulo']]);
            array_push($likesAll, $like);

            $dislike =
                $this->Count("ID_like", "likes", [" tipo = 3 AND feedback = 0 AND ID_tipo = " . $value['ID_capitulo']]);
            array_push($dislikesAll, $dislike);
        }

        $dislikesAll_sum = array_sum($dislikesAll);
        $likesAll_sum = array_sum($likesAll);
        $feedback_sum = $dislikesAll_sum + $likesAll_sum;

        if ($feedback_sum > 0) {
            $feedback_porcent = ($likesAll_sum * 100) / $feedback_sum;
            if (!is_int($feedback_porcent)) {
                $feedback_porcent = number_format($feedback_porcent, 1, '.', '');
            }
            $feedback = "<span><span style='color: goldenrod;'>$feedback_porcent%</span> positivas  ($feedback_sum)</span>";
        } else {
            $feedback = "<span><span style='color: goldenrod;'>Seja o primeiro a avaliar esta obra</span></span>";
        }

        return $feedback;
    }

    public function CharsLimit($text, $limite_chars)
    {

        if (strlen($text) > $limite_chars) {
            $textLimited = substr($text, 0, $limite_chars) . "...";
            return $textLimited;
        }
        return $text;
    }

    public function Count($contDado, $tabela, $refDado)
    {
        global $pdo;
        $ComandoSQL = "SELECT COUNT($contDado) FROM $tabela WHERE $refDado[0]";
        $conn = $pdo->query($ComandoSQL);
        if ($conn->execute()) {
            $dado = $conn->fetchAll(PDO::FETCH_ASSOC);
            return $dado[0]["COUNT($contDado)"];
        }
    }
    public function find($findDado, $tabela, $conditionRefDado)
    {
        global $pdo;
        $ComandoSQL = "SELECT $findDado[0] FROM $tabela $conditionRefDado[0]";
        $conn = $pdo->query($ComandoSQL);
        if ($conn->execute()) {
            if ($conn->rowCount() > 0) {
                $dados = $conn->fetch(PDO::FETCH_ASSOC);
                return $dados;
            }
        }
    }
    public function findAll($findDado, $tabela, $conditionRefDado)
    {
        global $pdo;
        $ComandoSQL = "SELECT $findDado[0] FROM $tabela $conditionRefDado[0]";
        $conn = $pdo->query($ComandoSQL);
        if ($conn->execute()) {

            $dados = $conn->fetchAll(PDO::FETCH_ASSOC);
            return $dados;

        }
    }

    public function deleteArrayOfIdByForeach(array $arrayParaDeleção, $tabela, $referencia)
    {
        global $pdo;
        foreach ($arrayParaDeleção as $value) {
            $SQL = "DELETE FROM $tabela WHERE $referencia = $value[0] LIMIT 1";
            $conn = $pdo->query($SQL);
            $conn->execute();
        }
    }


    public function getTempoPassados($created_at)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dateTimeNow = date('Y-m-d H:i:s');

        $date1 = strtotime($created_at);
        $date2 = strtotime($dateTimeNow);

        $diff = abs($date2 - $date1);

        $years = floor($diff / (365 * 60 * 60 * 24));

        $months = floor(($diff - $years * 365 * 60 * 60 * 24)
            / (30 * 60 * 60 * 24));


        $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
            $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));


        $hours = floor(($diff - $years * 365 * 60 * 60 * 24
            - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
            / (60 * 60));

        $minutes = floor(($diff - $years * 365 * 60 * 60 * 24
            - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
            - $hours * 60 * 60) / 60);

        $seconds = floor(($diff - $years * 365 * 60 * 60 * 24
            - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
            - $hours * 60 * 60 - $minutes * 60));

        //    printf("%d years, %d months, %d days, %d hours, "
//         . "%d minutes, %d seconds", $years, $months,
//                 $days, $hours, $minutes, $seconds); 
        if ($years > 0) {
            return ("há $years ano(s)");
        }
        if ($months > 0) {
            return ("há $months mês(es)");
        }
        if ($days > 0) {
            return ("há $days dia(s)");
        }
        if ($hours > 0) {
            return ("há $hours hora(s)");
        }
        if ($minutes > 0) {
            return ("há $minutes min");
        }
        if ($seconds >= 0) {
            return ("agora");
        }
    }

    function ifProfileImgExist($img, $imgUserLog)
    {

        [$imgperfil, $imgPerfilSession] = "../assets/IMAGENS/blank.jpg";

        if (isset($img) && !empty($img)) {
            $imgperfil = "../assets/IMAGEM_USUARIO/$img";

            if (isset($imgUserLog) && !empty($imgUserLog)) {
                $imgPerfilSession = "../assets/IMAGEM_USUARIO/$imgUserLog";
            }
        }

        $ImgProfile = new stdClass();
        $ImgProfile->imgUser = $imgperfil;
        $ImgProfile->imgUserWithSession = $imgPerfilSession;

        return $ImgProfile;
    }

    public function findNotAll($conta_obra)
    {
        $notifications = $this->findAll(
            ["*"],
            "notificacao",
            [" WHERE conta_obra = $conta_obra AND destinatario_FKNOT = " . $_SESSION['ID_user'] . " ORDER BY dataNOT DESC"]
        );

        if (count($notifications) == 0) {
            echo "
            <th class='nenhuma-not'>
                <span style='text-align:center;'>Não há nenhuma notificação</span>
            </th>";
            return;
        }
        foreach ($notifications as $not) {

            $timeNot = $this->getTempoPassados($not['dataNOT']);
            $fotoNOT = $this->ifProfileImgExist($not['fotoNOT'], null);

            $new = "";
            if ($not['activeNOT'] == 1) {
                $new = "Novo";
            }

            $IDNOT = $not['IDNOT'];
            $conteudoNOT = $not['conteudoNOT'];
            $nomeNOT = "<span class='titulo_not'>" . $not['nomeNOT'] . "</span>";
            $URLNOT = $not['URLNOT'];


            echo
                ("
                    <tr>
                        <th>
                            <a href='$URLNOT'>
                                <div class='container_not'>
                                    <p class='novo_notificacao'><span>$new</span></p>
                                    <input type='checkbox' name='not' id='selecionar' class='selecao' value='$IDNOT'>
                                    <img src='$fotoNOT->imgUser' alt=''>
                                    <p>
                                        $nomeNOT
                                        <span style='font-weight: 100;'>
                                            $conteudoNOT 
                                        </span>
                                    </p>
                                    <p class='tempo_notificacao'>$timeNot</p>
                                </div>
                            </a>
                        </th>
                    </tr>
                ");
        }

    }
}