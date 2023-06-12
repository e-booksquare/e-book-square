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
    <link rel="stylesheet" href="../assets/CSS/FAQ.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>E-BOOK SQUARE | FAQ</title>
</head>

<body>
    
    <?php include_once 'header.php'; ?>
    <main>
        <p class="Pergu_FAQ">->Perguntas frequentes e respostas FAQ</p>
        <div class="container_FAQ">

            <div class="dropdown_faq">
                <button onclick="toggleDropdown(event)" class="dropdown-button">
                    Como Cadastrar no E-book Square?
                </button>
                <div class="dropdown-content">
                        <p class="texto_pergunta_faq">Caso seja primeira vez que você acessa o site terá que fazer um cadastro, clicando em ”você ainda não tem cadastro?”, como na imagem.</p>

                        <img src="../assets/IMAGENS/Como_cadastrar_img1.svg" alt="">

                        <p class="texto_pergunta_faq">Em seguida preencha os campos e clique em cadastra perfil.</p>

                        <img src="../assets/IMAGENS/Como_cadastrar_img2.svg" alt="">

                        <p class="texto_pergunta_faq"> Após voltar  a tela de login, digite seu email e senha e clique em logar.</p>

                        <img src="../assets/IMAGENS/Como_cadastrar_img3.svg" alt="">

                </div>
            </div>

            <div class="dropdown_faq">
                <button onclick="toggleDropdown(event)" class="dropdown-button">
                    Como editar meu avatar?
                </button>
                <div class="dropdown-content">
                        <p class="texto_pergunta_faq">Para alterar seu avatar, no menu superior direito, logo ao lado do icone de perfil, clique no menu, representado pelo símbolo de uma engrenagem. Em seguida em “editar perfil”. Como nas imagens, o processo é o mesmo para o banner. </p>

                        <p class="texto_pergunta_faq">clique em “editar perfil”</p>

                        <img src="../assets/IMAGENS/comoeditarperfil_img1.svg" alt="">

                        <p class="texto_pergunta_faq"> depois em “trocar imagem, de perfil”</p>

                        <img src="../assets/IMAGENS/comoeditarperfil_img2.svg" alt="">
                        
                        <p class="texto_pergunta_faq"> selecione a imagem</p>

                        <img src="../assets/IMAGENS/comoeditarperfil_img3.svg" alt="">

                        <p class="texto_pergunta_faq"> na parte inferior da pagina clique em “salvar”</p>

                        <img src="../assets/IMAGENS/comoeditarperfil_img4.svg" alt="">

                </div>
            </div>         
        
            <div class="dropdown_faq">
                <button onclick="toggleDropdown(event)" class="dropdown-button">
                    Como excluir minha conta no E-book Square?
                </button>
                <div class="dropdown-content">
                        <p class="texto_pergunta_faq">Acessando a tela de perfil, clique no nome ao lado da foto de perfil</p>

                        <img src="../assets/IMAGENS/Como_excluir_conta_img1.svg" alt="">

                        <p class="texto_pergunta_faq">Em seguida clique em configurações</p>

                        <img src="../assets/IMAGENS/Como_excluir_conta_img2.svg" alt="">

                        <p class="texto_pergunta_faq">Depois em “ Excluir conta”. Deste modo sua conta será excluida permanentemente. </p>

                        <img src="../assets/IMAGENS/Como_excluir_conta_img3.svg" alt="">

                </div>
            </div>

            <div class="dropdown_faq">
                <button onclick="toggleDropdown(event)" class="dropdown-button">
                Perdi minha conta, o que eu faço? 
                </button>
                <div class="dropdown-content texto_left">
                <p>1) Vá para a página principal do site.</p>
                <p>2) No menu superior clique em "Fazer login".</p>
                <p>3) Depois, clique em, "Esqueceu a senha?".</p>
                <p>4) Informe seu email utilizado e envie o formulário.</p>
                <p>5) Você vai receber um email, clique no link que consta no email (verifique se o endereço é o do site).</p>
                <p>6) Clicando no link você entrará no site e aparecerá um formulário para que você digite sua nova senha.</p>

                </div>
            </div>

            <div class="dropdown_faq">
                <button onclick="toggleDropdown(event)" class="dropdown-button">
                Por que meu número de seguidores não aumenta?
                </button>
                <div class="dropdown-content texto_left">
                    <p>Por que meu número de seguidores não aumenta quando eu tenho avisos de novos seguidores?</p><br>
                    <p>Quando um usuário tem a conta suspensa ou exclui a própria conta, ele deixa de seguir as pessoas que seguia, 
                    assim sendo, se você tiver muitos seguidores que deixaram de existir, mesmo que tenha novos seguidores, 
                    este número não aumentará.</p><br>
                    <p>Da mesma forma, infelizmente, o número de seguidores pode diminuir porque as pessoas param de lhe seguir.</p>

                </div>
            </div>

            <div class="dropdown_faq">
                <button onclick="toggleDropdown(event)" class="dropdown-button">
                Qual é o tempo de analise de uma denuncia?
                </button>
                <div class="dropdown-content texto_left">
                <p>Ao se analisar uma denúncia, os seguintes fatores são considerados:</p><br>
                <p>- A quantidade de denúncias que precisam ser analisadas é grande, porém, todas são analisadas com muito zelo e seriedade 
                para que possam ser atendidas com sucesso.</p><br>

                <p>- O trabalho de avaliação das denúncias é feito por um grupo reduzido de pessoas autorizadas da equipeE-book Square,
                e se há uma quantidade grande de denúncias, é natural que demore um pouco para que todas elas sejam analisadas.</p><br>

                <p>- O envio das informações sobre a denúncia é muito importante para que ela possa ser analizada mais rapidamente,
                por isso, deve-se sempre especificar com detalhes o motivo da denúncia, para que os administradores responsáveis possam
                avaliar precisamente o conteúdo denunciado. </p><br>

                <p>Além disso, é preciso sempre verificar se os administradores não solicitaram mais informações, pois, enquanto a denúncia 
                já está em andamento, pode ser que eles precisem de mais alguns dados para poder concluir a análise do caso.Portanto, 
                a análise de uma denúncia demora certo tempo, que varia de acordo com os aspectos especificados acima, mas todas as 
                denúncias são analisadas para que as providências cabíveis sejam tomadas.</p>

                </div>
            </div>
        </div>

        <p class="text_final_pag">Não achou oque procurava? <a href="contato.php"
                class="link_contatos">Contate-nos</a></p>
    </main>




    <?php include_once 'footer.php'; ?>
     <script src="../assets/JAVASCRIPT/header.js"></script>
</body>


    <script>    
    
    function toggleDropdown(event) {
    var dropdownContent = event.target.nextElementSibling;
    dropdownContent.classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropdown-button')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

    </script>
</html>