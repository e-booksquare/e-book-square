<?php
include_once '../../Model/verificacao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/contato.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>E-BOOK SQUARE | CONTATO</title>
</head>

<body>
<?php include_once 'header.php'?>
    <main>
        <section class="informacoes">
            <h1 class="titulo">CONTATE-NOS</h1>
            <p class="text">Por favor, sintase livre para dizer qualquer<br>coisa para nós.</p>
            <p class="text">Nossa equipe responderá qualquer mensagem<br>o mais rapido possivel.</p>
            <p class="text">Algumas questões podem ser solucionadas acessando nosso<br><a href="FAQ.php"
                    class="link_Perguntas text">Perguntas e Respostas Frequentes (FAQ).</a></p>
        </section>

        <section class="forms">
            <form action="../../Model/enviar-email.php" method="post">
                <div class="separacao_forms">
                    <input class="entradas separar_entradas" type="text" name="nome" placeholder="Nome de usuário"
                        require> <br>
                    <input class="entradas" type="email" name="email" placeholder="E-mail"> <br>
                </div>

                <select class="entradas selecionar" name="" id="assuntos" onChange="select_assunto()">
                    <option value="1" selected disabled>Assunto</option>
                    <option value="2">Feedback</option>
                    <option value="3">Reportar problemas</option>
                    <option value="4">Denúncia</option>
                    <option value="5">Ajuda</option>
                    <option value="6">Termos e privacidade</option>
                </select> <br>

                <input type="hidden" name="titulo" value="" id="set_value">
                <textarea class="entradas texto_grande" name="conteudo" cols="30" rows="10"
                    placeholder="Descreva sua dúvida..." require></textarea> <br>
                <input class="enviar" type="submit" value="Enviar" id="btn_submit">
            </form>
        </section>

    </main>

    <?php include_once 'footer.php'?>
    <script src="../assets/JAVASCRIPT/header.js"></script>

<script type="text/javascript">

    let btn = document.querySelector("#btn_submit");
    // let hidden = document.querySelector("#set_value").value;

    function select_assunto() {
        let value_select = '';
        let select = document.querySelector("#assuntos");
        let optionValue = select.options[select.selectedIndex];

        let text = optionValue.text;
        value_select = optionValue.value;
        let hidden = document.querySelector("#set_value");
        hidden.value = text;

        // console.log(text, hidden.value)
    }


    select_assunto();


        // if(hidden == 'Assunto'){
        //     btn.setAttribute("disabled", "disabled");
        // }
        // else{
        //     btn.removeAttribute("disabled", "disabled");
        // }
</script>

</html>