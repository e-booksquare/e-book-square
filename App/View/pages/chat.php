<?php
include_once '../../Model/verificacao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/chat.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Chat | site</title>

    <style>
        #submitChatMessage{
            position: absolute;
            top: 5%;
            right: .5%;
            background-color: transparent;
            border: none;
        }
    </style>
</head>

<body>

    <a href="perfil.php?user=<?=$_SESSION['ID_user'];?>" id='leaveChat'>
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
        </svg>
    </a>
    <section id="chatList">
        <div class="containerChatList">
    
            <div class="titleChatList">
                <p id="titleChat">Conversas</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
                    <path fill="#514CBD"
                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM7 9h10c.55 0 1 .45 1 1s-.45 1-1 1H7c-.55 0-1-.45-1-1s.45-1 1-1zm6 5H7c-.55 0-1-.45-1-1s.45-1 1-1h6c.55 0 1 .45 1 1s-.45 1-1 1zm4-6H7c-.55 0-1-.45-1-1s.45-1 1-1h10c.55 0 1 .45 1 1s-.45 1-1 1z" />
                </svg>
            </div>

            <div class="searchChatList">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 24 24">
                    <path fill="#514CBD"
                        d="M9.5 3A6.5 6.5 0 0 1 16 9.5c0 1.61-.59 3.09-1.56 4.23l.27.27h.79l5 5l-1.5 1.5l-5-5v-.79l-.27-.27A6.516 6.516 0 0 1 9.5 16A6.5 6.5 0 0 1 3 9.5A6.5 6.5 0 0 1 9.5 3m0 2C7 5 5 7 5 9.5S7 14 9.5 14S14 12 14 9.5S12 5 9.5 5Z" />
                </svg>

                <input type="search" id="inputSearchChatList" placeholder="Pesquise por alguém...">
            </div>

            <div id="dropdownSearchChat">
                <div id="listBoxSearchChat" class="hidden">
                    <!-- RESULTADO DA PESQUISA -->
                </div>
            </div>

            <div class="boxChatList">
                <!-- LISTA DE CONVERSAS -->
            </div>
        </div>
    </section>

    <section id="conversation">
        <div id="noChatContainer">
            <div class="content">
                <img src="nomessage-img.png" alt="">
                <p> <strong>Sem conversa aberta</strong> </p>
            </div>
        </div>
    </section>

    <script>
        

        $(document).ready(function () {

            function carregaChat() {
                $.ajax({
                    url: "../../Model/message-chat.php",
                    method: "GET",
                    contentType: "application/json",
                    dataType: "json",
                    success: (data) => writeMessages(data)
                })
            }

            function writeMessages(messages) {
                var loggedUser = <?= $_SESSION['ID_user'] ?>;

                messages.forEach(function (mensagem) {
                    if (loggedUser == mensagem.id_usuario) {
                        $('#chatMessageBox').append(
                            minhaMensagem(mensagem)
                        );
                    } else {
                        $('#chatMessageBox').append(
                            mensagemOutro(mensagem)
                        );
                    }
                });
            }

            function mensagemOutro(mensagem) {
                let el = '';

                el = `<div class='contentMessageChat'>
                        <div class='messageChatContainer'>
                            <div class='messageChat'>
                                <p>${mensagem.mensagem}</p>
                            </div>
                            <p class='timeMessageChat'>${mensagem.data}</p>
                        </div>
                    </div>`;

                return el;
            }

            function minhaMensagem(mensagem) {
                let el = '';

                el = `<div class='contentMessageChat me'>
                    <div class='messageChatContainer meMessage'>
                        <div class='messageChat meMessageChat'>
                            <p>${mensagem.mensagem}</p>
                        </div>
                        <p class='timeMessageChat meTimeMessage'>${mensagem.data}</p>
                    </div>
                </div>`;

                return el;
            }

            function getChatStructure(userData)
            {

                $structure = `<div class='userConversationHeader'>
                                <div class='contentConversationHeader'>
                                    <div class='profileImageConversationHeader'>
                                        <img src='${userData.foto}' alt=''>
                                    </div>
                                    <span class='nameUserConversationHeader'>${userData.nome}</span>
                                </div>

                                <div class='dropdownConversation'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 20 20'><path fill='currentColor' d='M10.001 7.8a2.2 2.2 0 1 0 0 4.402A2.2 2.2 0 0 0 10 7.8zm0-2.6A2.2 2.2 0 1 0 9.999.8a2.2 2.2 0 0 0 .002 4.4zm0 9.6a2.2 2.2 0 1 0 0 4.402a2.2 2.2 0 0 0 0-4.402z'/></svg>
                                </div>
                            </div>

                            <div id='chatMessageBox'></div>

                            <div id='inputMessageConversationBox'>
                                <div id='containerInputConversation'>

                                    <input type='text' id='inputChatMessage'>
                                    
                                    <button id='submitChatMessage'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24'><path fill='#524cbd' d='M12 2L4.5 20.29l.71.71L12 18l6.79 3l.71-.71L12 2Z'/></svg>
                                    </button>
                                </div>
                            </div>`;

                return $structure;
            }

            $("#conversation").on("click", "#submitChatMessage", function () {

                const msgToSend = $("#inputChatMessage").val()

                if(msgToSend == ""){ return }

                $.ajax({
                    url: "../../Model/message-chat.php",
                    method: "POST",
                    data: { msgToSend: msgToSend }
                })
                $('#chatMessageBox').html("");
                carregaChat()
                $("#inputChatMessage").val("")
                getChatListStructure()
            })

            $("#conversation").on("click", "#submitChatMessage", function () {
                scrollChatHeight()
            })

            function scrollChatHeight(){

                 const alturaScroll = $("#chatMessageBox")[0].scrollHeight;
                        $("#chatMessageBox").scrollTop(alturaScroll);
                        const topScroll = $("#chatMessageBox").scrollTop();

                        console.log(
                            $("#chatMessageBox"), 
                            alturaScroll,  
                            topScroll
                        );
            }


            $(".boxChatList").on("click", ".itemChatList", function () {
                var IDUser = $(this).data('id');
                getStructure(IDUser);
                scrollChatHeight()
            })

            $("#listBoxSearchChat").on("click", ".itemSearchChat", function () {
                var IDUser = $(this).data('id');
                getStructure(IDUser);
                scrollChatHeight()
            })

            function buscarNome(nome) {
                $.ajax({
                    url: "../../Model/chatsearchbd.php",
                    method: "POST",
                    data: { nome: nome },
                    success: (data) => $('#listBoxSearchChat').html(data)
                })
            }

            $('#inputSearchChatList').keyup(function () {
                var nome = $(this).val();
                if (nome != '') {
                    $('#listBoxSearchChat').show();
                    buscarNome(nome)
                } else {
                    $('#listBoxSearchChat').removeAttr("style").hide();
                }
            });

            function getStructure(IDUser) {
                $.ajax({
                    url: "../../Model/structure-chat.php",
                    method: "POST",
                    data: { IDUserChat: IDUser },
                    success: (data) => {
                        if (data != '') {
                            $('#conversation').html(
                                getChatStructure(data)
                            );
                        }
                        carregaChat();
                    }
                })
            }

            function getChatListStructure() {
                $.ajax({
                    url: "../../Model/userlist-chat.php",
                    method: "GET",
                    success: (data) => $('.boxChatList').html(data)
                })
            }

            getChatListStructure()

            setTimeout(() => {
                setInterval(() => {

                    $('#chatMessageBox').html("");
                    carregaChat()

                    getChatListStructure()
                }, 5000);
            }, 5000);
        })

    </script>
</body>

</html>