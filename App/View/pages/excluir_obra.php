<?php
include_once '../../Model/verificacao.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Excluir História</title>
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/excluir_obra.css">
</head>
<body>
    <?php
    include_once('header.php');
    ?>


    <div class="container">
        <p class="titulo">Por que você quer excluir essa história?</p>
        <label class="texto">Selecione as opções que se aplicam:</label>
		<div class="checkbox-group">


            <div class="opcao">
                <input class="opcao_texto" type="checkbox" id="option2" name="option2">
                <label class="opcao_texto" for="option2">Eu publiquei a história por engano</label>
            </div>

            <div class="opcao">
                <input class="opcao_texto" type="checkbox" id="option3" name="option3">
                <label class="opcao_texto" for="option3">Eu quero reescrever a história</label>
            </div>
            
            <div class="opcao">
                <input class="opcao_texto" type="checkbox" id="option4" name="option4">
                <label class="opcao_texto" for="option4">Outro motivo</label>
            </div>
		</div>

        
        <br>
        <label class="texto" for="reason">Diga com mais detalhes o porque deseja excluir a obra</label>
		<textarea id="reason" name="reason"></textarea>
        <p class="observacao_texto">Obs: Depois de excluido, não será possivel recuperar</p>

		<input class="excluir botao" type="submit" value="Excluir História">
        <br>
        <input class="cancelar botao" type="submit" value="Voltar">
        
    </div>

    <?php
    include_once('footer.php');
    ?>
</body>
</html>
