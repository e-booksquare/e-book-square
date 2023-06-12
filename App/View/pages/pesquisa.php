<?php

include_once '../../Model/verificacao.php';

if(isset($_GET['search']) && !empty($_GET['search'])){
    $searchTerm = $_GET['search'];
}

if (!isset($_SESSION['ID_user']) || empty($_SESSION['ID_user'])) {
    header("location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../assets/CSS/pesquisa.css">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <title> Valor da pesquisa | BOOK SQUARE</title>
</head>
<body>
    <div class="principal">
        <?php include_once 'header.php'; ?>

   
        <div class="pesquisa_obra">
            <i class="bi bi-search icon roxo"></i>
            <input type="search" name="" id="inputSearchPage" 
            value="<?=$searchTerm?>">
        </div>
        <div class="filtro">
            <div class="header-filtro">
                <div class="icon_filtro">
                    <i class="bi bi-funnel-fill icon" onclick="AbrirFiltros()"></i><span  onclick="AbrirFiltros()">Filtros</span>
                </div>
                <p class="texto">Total de <span class="texto roxo" id="total"></span> resultado(s) para “<span class="texto roxo" id="searchTermResult"></span>”</p>
            </div>
            <div class="container_geral_filtro" style="display: flex; justify-content: center;">
        
                <div class="container_opc_filtro" id="filtros">
                    
                    <div class="especificaoes">
                        <div class="opcoes">
                            <p class="texto">Data de publicação</p>
                            <a class="texto_opc" href="#">Última hora</a>
                            <a class="texto_opc" href="#">Hoje</a>
                            <a class="texto_opc" href="#">Esta semana</a>
                            <a class="texto_opc" href="#">Este mês</a>
                        </div>
            
                        <div class="opcoes">
                            <p class="texto">Quantidade de capítulos</p>
                            <a class="texto_opc" href="#">1 a 5 capitulos</a>
                            <a class="texto_opc" href="#">10 a 20 capitulos</a>
                            <a class="texto_opc" href="#">20 a 50 capitulos</a>
                            <a class="texto_opc" href="#">+100 capitulos</a>
                        </div>
            
                        <div class="opcoes">
                            <p class="texto">Faixa etária</p>
                            <a class="texto_opc" href="#">Livre</a>
                            <a class="texto_opc" href="#">Adolescente</a>
                            <a class="texto_opc" href="#">Adulto</a>
                        </div>
            
                        <div class="opcoes">
                            <p class="texto">Progresso da obra</p>
                            <a class="texto_opc" href="#">Concluída</a>
                            <a class="texto_opc" href="#">Não concluída</a>
                        </div>
                    </div>
                    <div class="filtro_categoria">
                        <div style="display: inline-flex;flex-direction: column;">
                            <p class="texto">Especificar por categorias:</p>
                            <div class="container_categorias">
                                <div class="categiria">
                                    Ação
                                </div>
                                <div class="categiria categoria_selecionada">
                                    Terror
                                </div>
                                <div class="categiria categoria_selecionada">
                                    Comédia
                                </div>
                                <div class="categiria">
                                    Romance
                                </div>
                                <div class="categiria">
                                    Suspense
                                </div>
                                <div class="categiria">
                                    Ficçao
                                </div>
                                <div class="categiria">
                                    Mercenário
                                </div>
                                
                            </div>
                                <a href="#" style="margin-top: 10px;"><p class="roxo texto">Ver mais...</p></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <main>

            <div id="searchContent">
                
            </div>
            <!-- Termina aqui -->

            <div class="carregar" id="boxLoadMore" style="margin: 0 0 100px;">
                <p class="carregar-mais" id="loadMore">Carregar mais</p>
            </div>
            
        </main>
    </div>

    <?php include_once 'footer.php'; ?>
</body>

<script>
    
    $(document).ready(function (){

        function AbrirFiltros(){
            document.querySelector("#filtros").classList.toggle("Aberto")
        }


        var limit = 1; // Limite inicial

        function carregarMaisDados(limit) {

            let idObras = []

            $('.container-obra').each(function() {
                var dataId = $(this).data('id');
                idObras.push(dataId)
            });

            // let idObraLength = idObras.length + limit

            // if(idObraLength >= $("#total").html()){
            //     $("#boxLoadMore").html("Todos os resultados mostrados")
            //     return
            // }

            $.ajax({
                url: '../../Model/page-searchbd.php',
                method: 'POST',
                data: {search: "obra", searchTerm: searchTerm, limit: limit, notIn: idObras},
                success: (data) => {

                    let results = data.search;

                    results.forEach(function (e) {
                        $('#searchContent').append(
                            getObraStructure(e)
                        );
                    });
                }
                })
        }

        // Exemplo de chamada para carregar mais dados quando um botão for clicado
        $('#loadMore').on('click', function() {
            limit = 1
            carregarMaisDados(limit);
        });



        function buscar(searchTerm, limit){
            $.ajax({
                url: '../../Model/page-searchbd.php',
                method: 'POST',
                data: {search: "obra", searchTerm: searchTerm, limit: limit},
                success: (data) => getSearchResult(data)
                })
        }
        
            $('#inputSearchPage').keyup(function(e){
                var searchTerm = $(this).val();
                if (searchTerm != ''){
                    $("#searchTermResult").html(searchTerm)
                    buscar(searchTerm, limit)
    
                    };
            });

            if($('#inputSearchPage').val() != ''){
                var searchTerm = $('#inputSearchPage').val();
                $("#searchTermResult").html(searchTerm)
                    buscar(searchTerm, limit)
            }

            function getSearchResult(data) {

                $("#total").html(data.count);
                $('#searchContent').html(" ");

                let results = data.search;
                
                results.forEach(function (e) {
                    $('#searchContent').append(
                        getObraStructure(e)
                    );
                });
            }

            function getObraStructure(obra) {
                let el = '';

                el = `<a href="#"><div class="container-obra" data-id="${obra.idObra}">
                        <div class="imagem-obra">
                            <img src="${obra.imgObra}" alt="">
                        </div>
                        <div class="info-obra">
                            <p><span class="titulo_info">Nome: </span><span>${obra.nomeObra}</span></p>
                            <p><span class="titulo_info">Autor: </span><span>${obra.autorObra}</span></p>
                            <p><span class="titulo_info">Categoria: </span>
                                <div>
                                    <p class="categoria">Contrarrevolucionário</p>
                                    <p class="categoria">Contrarrevolucionário</p>
                                    <p class="categoria">Contrarrevolucionário</p>
                                    <p class="categoria">Contrarrevolucionário</p>
                                    <p class="categoria">Contrarrevolucionário</p>
                                    <p class="categoria">Contrarrevolucionário</p>
                                    <p class="categoria">Contrarrevolucionário</p>
                                    <p class="categoria">Contrarrevolucionário</p>
                                </div>
                            </p>
                            <p><span class="titulo_info">Descrição: </span><span style="word-break: break-word;">${obra.descObra}</span></p>
                        </div>
                    </div></a>`;

                return el;
            }

        })

</script>
</html>