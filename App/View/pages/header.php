<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<script>
    function abrir_notificacao(){
        document.querySelector(".container_notificacao").classList.toggle("aberto");
    }
    function excluir_not(){
        document.querySelector(".excluir_not_button").classList.toggle("aberto");
        document.querySelector(".marcar_todos").classList.toggle("aberto");
        // document.querySelectorAll("#selecionar").classList.toggle("aberto");
        var list;
        list = document.querySelectorAll("#selecionar");
            for (var i = 0; i < list.length; ++i) {
            list[i].classList.toggle('aberto');
            }
        // document.querySelector("#selecionar").style.display="block";
        document.querySelector(".novo_notificacao").classList.toggle("fechado");
        
    }

    function checar_todas()
    {
        let checkbox;
        checkbox = document.querySelectorAll("#selecionar");
        vereficar =document.querySelector("#checkAll");
        if(vereficar.checked) {
            for (var x = 0; x < checkbox.length; ++x) {
                checkbox[x].checked = true;
            }
        } else {
            for (var x = 0; x < checkbox.length; ++x) {
                checkbox[x].checked = false;
            }
        }       

    }

    function checar_todas2()
    {
        let checkbox2;
        checkbox2 = document.querySelectorAll("#selecionar");
        vereficar =document.querySelector("#checkAll");
        if(vereficar.checked) {
            for (var x = 0; x < checkbox2.length; ++x) {
                checkbox2[x].checked = true;
            }
        } else {
            for (var x = 0; x < checkbox2.length; ++x) {
                checkbox2[x].checked = false;
            }
        }       

    }

  


    
</script>
<header id="header">
<div class="drop_direito_responsividade" id="drop_right">

</div>
        <div class="container-header">
            <div class="img-logo-header">
                <a href="feed.php"><img src="../assets/IMAGENS/logo.jpg" alt="" class="logo-header"></a>
            </div>
            <ul class="dropdown">
            

            <li  class="pesquisa_li" style="margin-left:-20px ; ">
                <input  on="pesquisa_selecionada()" id="pesquisa" class="pesquisa" type="search" placeholder="Pesquise livros e artista aqui">

                <div class="pesquisa_click " id="pesquisa_container resultado">                  
                    <!-- Resultado da pesquisa -->
                    <p id="result"></p>
                </div>

            </li>
            <?php if(isset($_SESSION['ID_user']) && !empty($_SESSION['ID_user'])){ ?>

<li class="notificacoes">
    <i class="bi bi-bell-fill" onclick="abrir_notificacao()" id="iconNot"></i>

<!--  numberNot  -->
    <div class='numeros_notificacoes' id="numberNot" onclick='abrir_notificacao()' style='cursor: pointer;'></div>
    <div class="container_notificacao">
        <nav class="nav_notificacao">
            <ul>
                <li id="minha_conta" class="itens selecionado" onclick="minha_conta()">Minha conta</li>
                <li class="divisao"></li>
                <li id="minha_historia" class="itens" onclick="minha_historia()">Minhas Historias</li>
            </ul>
        </nav>
        <div class="container_marcar_todos_excluir">
            <div class="marcar_todos">
                <input id="checkAll" onclick="checar_todas()" type="checkbox"><span><label for="checkAll" onclick="checar_todas()"> Marcar todos os itens<label></span>
            </div>
            <div class="excluir_not" onclick="excluir_not()">
                <i class="bi bi-trash" ></i><span>Excluir notificações</span>
            </div>
            
        </div>

            <div style="display: flex; justify-content: center;">
                <!-- <button class="excluir_not_button" type="submit">Excluir os itens selecionados</button> -->
            </div>
        <div id="container_minha_conta" class="minha_conta">

            <table id="minha_conta_not"></table>

        </div>
        <div id="container_minha_historia"  class="minha_historia">

            <table id="minha_historia_not"></table>

            <div style="display: flex; justify-content: center;">
                <button class="excluir_not_button" id="exc">Excluir os itens selecionados</button>
            </div>
        </div>
    </div>
</li>
<?php }?>
            

            <!-- Responsividade menu lateral -->
            <li class="responsividade_header_lista_direira">
                <i onclick="abrirMenu()" class="bi bi-list icon_lista" ></i>
            </li>
        
            <li class="block-right">
                <a href="pre-criacao.php">
                    <div class="type-new-history">
                        Escrever
                    </div>
                </a>
                <?php
                    if (isset($_SESSION['ID_user'])):
                        if($dados_usuario['status'] == 1){
                        ?>
                        <a href="painel-adm.php">
                            <div class="type-new-history" style="width: auto; padding: 10px;">
                                <span style="color: white; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 14px; font-weight: 500;" >ADMINISTRADOR</span>
                            </div>
                        </a>
                        <?php }?>
                        <div class="icone-user">
                            <p onclick="clique_perfil()" for="dropdown_perfil" id="nome" name="nome" class="nome_user">
                                <?= $dados_usuario['nome']; ?>
                            
                            <svg id="dropdown_perfil_girar" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg></p></p>
                            <div class="avatar-header">
                                <a href="Perfil.php?user=<?=$dados_usuario['ID_user']?>">
                                    <img class="editar_img" src="
                                
                                            <?php if (isset($dados_usuario['foto']) && !empty($dados_usuario['foto'])) { ?>
                                    ../assets/IMAGEM_USUARIO/<?= $dados_usuario['foto'] ?>
                                            <?php } else { ?>
                                    ../assets/IMAGENS/blank.jpg
                                            <?php } ?> 
                                
                                " alt="Foto de perfil" name="perfil" id="perfil-header">
                                </a>
                            </div>
                        </div>
                        <input id="dropdown_perfil_input" class="checkbox_perfil" type="checkbox">
                        <div class="nada" id="dropdown_perfil">
                            <nav>
                                <div>
                                    <a href="perfil.php?user=<?=$dados_usuario['ID_user']?>">
                                        <li class="opcoes_dropdown" style="font-weight: 600;">Meu perfil</li></a>
                                    <a href="chat.php">
                                        <li class="opcoes_dropdown">Chat</li>
                                    </a>
                                    <a href="editar-perfil.php?user=<?=$dados_usuario['ID_user']?>">
                                        <li class="opcoes_dropdown">Editar perfil</li>
                                    </a>
                                    <a href="conta.php">
                                        <li class="opcoes_dropdown">Configurações</li>
                                    </a>
                                    <a href="FAQ.php">
                                        <li class="opcoes_dropdown">Ajuda</li>
                                    </a>
                                    <a href="../../Model/logout.php">
                                        <li class="opcoes_dropdown" style="color:red;">Sair</li>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    <?php
                        else:
                    ?>
                    <p>
                        <a href="login.php">
                            Fazer Login
                        </a>
                    </p>
                <?php
                endif;
                ?>
            </li>

        </ul>
        </div>
        
        <script src="../assets/JAVASCRIPT/dropdown-header.js"></script>
        <script src="../assets/JAVASCRIPT/pesquisa.js"> </script>
        
        <script type="text/javascript">
            function minha_historia(){
                document.querySelector(".minha_conta").style.display ="none";
                document.querySelector(".minha_historia").style.display ="block";
                document.querySelector("#minha_historia").classList.add('selecionado');
                document.querySelector("#minha_conta").classList.remove('selecionado');
            }
            function minha_conta(){
                document.querySelector(".minha_historia").style.display ="none";
                document.querySelector(".minha_conta").style.display ="block";
                document.querySelector("#minha_historia").classList.remove('selecionado');
                document.querySelector("#minha_conta").classList.add('selecionado');
            }

                
   

    </script>
</header>

    