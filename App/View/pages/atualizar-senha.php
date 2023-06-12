<?php
    require '../../Model/verificacao.php';
    $token = filter_input(INPUT_GET, "token", FILTER_DEFAULT);

    if(!empty($token))
    {
        global $pdo;

        $ComandoSQL = "SELECT ID_user FROM usuario WHERE recuperar_senha = :token";
        $conn = $pdo->prepare($ComandoSQL);
        $conn->bindValue(":token", $token);
        $conn->execute();
        
        if($conn->rowCount()>0){
            $usuario = $conn->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($dados['alterarSenha']))
            {
                $senha_hash = password_hash($dados['senhaNova'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $ComandoSQL = "UPDATE usuario SET senha = :novasenha, recuperar_senha = :r_senha WHERE ID_user = :id limit 1";
                $conn = $pdo->prepare($ComandoSQL);
                $conn->bindValue(":id", $usuario['ID_user']);
                $conn->bindValue(":novasenha", $senha_hash);
                $conn->bindValue(":r_senha", $recuperar_senha);
                $conn->execute();
                
                $_SESSION['msg'] = 
                "<p style:'color: green;'>Senha atualizada com sucesso</p>";
                header("location: login.php");
                exit;
            } 
        } 
        else{
            $_SESSION['msg'] = "<p style:'color: #ff0000;'>Erro: Link inválido</p>";
            header("location: recuperar-senha.php");
            exit;
        }
    }
    else
    {
        $_SESSION['msg'] = "<p style:'color: #ff0000;'>Erro: Link inválido</p>";
            header("location: recuperar-senha.php");
            exit;
    }


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar senha | E-Book Square</title>
    <link rel="shortcut icon" href="../assets/IMAGENS/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/CSS/login.css">
    <link rel="stylesheet" href="../assets/CSS/responsividade_cadastrar_e_login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>

<body>
<main>

        
<form action="" method="post">
    <div class="container" style="padding: 70px 0">
        <h1 class="titulo">Alterar senha</h1>
        <div class="conteudo">
            <div>
                <div class="entrada entrada_senha">
                    <input type="password'" name="senhaNova" placeholder="Digite sua nova senha">
                </div>

                <div class="botao_login">
                    <button type="submit" name="alterarSenha">Alterar senha</button>
                </div>
            </div>
                    <p style="text-align:center; font-size: 13px; margin: 30px 0">
                        Lembrou a senha? 
                        <a href="login.php">Clique aqui</a>
                    </p>
            </div>
        </div>
    </div>
</form>

<div class="ao_Lado">
    <img class="imagem_lado" src="../assets/IMAGENS/livros.jpg" alt="">
    <div class="marca_texto">
        <div class="barra"></div>
        <div class="triangulos">
            <div class="triangulo-para-direita"></div>
            <div class="triangulo-para-esquerda"></div>
        </div>
    </div>
</div>
</main>
</body>

</html>