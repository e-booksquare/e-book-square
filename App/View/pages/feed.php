<?php
include_once '../../Model/verificacao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/feed.css">
    <link rel="stylesheet" href="../assets/CSS/footer.css">
    <link rel="stylesheet" href="../assets/CSS/header.css">
    <title>Feed | E-BOOK SQUARE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main style="margin: 50px 0;">

        <div class="lateral_esquerda">
            <div class="categorias">
                <p style="text-align: center; font-size: 15pt; font-weight: bold; padding-bottom: 20px;">Categorias</p>
                <a href="#"><span>Todas as historias</span></a><br>
                <a href="#"><span>Ação</span></a><br>
                <a href="#"><span>Auto ajuda</span></a><br>
                <a href="#"><span>Aventura</span></a><br>
                <a href="#"><span>Clássicos</span></a><br>
                <a href="#"><span>Conto</span></a><br>
                <a href="#"><span>Crime</span></a><br>
                <a href="#"><span>Da época</span></a><br>
                <a href="#"><span>Drama</span></a><br>
                <a href="#"><span>Erótico</span></a><br>
                <a href="#"><span>Fanfiction</span></a><br>
                <a href="#"><span>Fantasia</span</a><br>
                <a href="#"><span>Ficção adolescente</span></a><br>
                <a href="#"><span>Ficção científica</span></a><br>
                <a href="#"><span>Histórias da vida</span></a><br>
                <a href="#"><span>Horror</span></a><br>
                <a href="#"><span>Humor</span></a><br>
                <a href="#"><span>Infância</span></a><br>
                <a href="#"><span>LGBT+</span></a><br>
                <a href="#"><span>Microficções</span></a><br>
                <a href="#"><span>Não-ficção</span></a><br>
            </div>

            <div class="ranks">
                <p style="text-align: center; font-size: 15pt; font-weight: bold; padding-bottom: 20px;">Ranking</p>

                <div class="user_rank">
                    <span class="primeiro_rank numero_rank">1°</span>
                    <div class="img_user_rank_codigo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm81XoZa9dFFAFPY-LjxgJ-XAj-KeySicSvw&usqp=CAU" alt="">
                        <span>@nick da pessoa</span>
                    </div>
                </div>

                <div class="user_rank">
                    <span class="numero_rank">2°</span>
                    <div class="img_user_rank_codigo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm81XoZa9dFFAFPY-LjxgJ-XAj-KeySicSvw&usqp=CAU" alt="">
                        <span>@nick da pessoa</span>
                    </div>
                </div>

                <div class="user_rank">
                    <span class="numero_rank">3°</span>
                    <div class="img_user_rank_codigo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm81XoZa9dFFAFPY-LjxgJ-XAj-KeySicSvw&usqp=CAU" alt="">
                        <span>@nick da pessoa</span>
                    </div>
                </div>

                <div class="user_rank">
                    <span class="numero_rank">4°</span>
                    <div class="img_user_rank_codigo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm81XoZa9dFFAFPY-LjxgJ-XAj-KeySicSvw&usqp=CAU" alt="">
                        <span>@nick da pessoa</span>
                    </div>
                </div>

                <div class="user_rank">
                    <span class="numero_rank">5°</span>
                    <div class="img_user_rank_codigo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm81XoZa9dFFAFPY-LjxgJ-XAj-KeySicSvw&usqp=CAU" alt="">
                        <span>@nick da pessoa</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="centro">
            <div class="recomendados">
                <p class="titulo_conjunto">Recomendados</p>

                <div class="carousel" id="carousel1">
       
                    <div class="carousel-container">
                        <button class="prev-button"></button>
                        <button class="next-button"></button>
                      <div class="carousel-item active">
                        <div class="conjutos_obras">
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
                        </div> 
                        
                      </div>
                      <div class="carousel-item">
                        <div class="conjutos_obras">
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
                        </div> 
                        
                      </div>
                    </div>
                  </div>

            
            </div>

            <div class="historias_conc">
                <p class="titulo_conjunto">Histórias concluidas</p>

                <div class="carousel" id="carousel12">
       
                    <div class="carousel-container">
                        <button class="prev-button"></button>
                        <button class="next-button"></button>
                      <div class="carousel-item active">
                        <div class="conjutos_obras">
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuJwhYNkFgYifz8u8-Te6p0ClWqQsIDCGAwg&usqp=CAU" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
                        </div> 
                        
                      </div>
                      <div class="carousel-item">
                        <div class="conjutos_obras">
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
        
                            <a href="#">
                                <div class="obra">
                                    <img src="https://t.ctcdn.com.br/LtfBBnyNT4W6RcfRr0Z8yXRpeOQ=/512x288/smart/filters:format(webp)/i596182.jpeg" alt="">
                                    <span class="categoria_obra">bdbjjbwwqqwjw</span>
                                    <p class="titulo_obra">123456789123456789123456789saaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
                        </div> 
                        
                      </div>
                    </div>
                  </div>
            </div>


            <div class="filtro">
                <nav class="navegação_filtro">
                    <p>Filtrar publicações por:<p>
                    <ul>
                        <li id="recentes" class="ativo" onclick="recentes()">Recentes</li>
                        <li id="avaliacoes" onclick="avaliacoes()">Avaliações</li>
                        <li id="autor_alto_rank" onclick="rank()">Autor de alto rank</li>
                        <li id="mais_lidas" onclick="Maislidas()">Mais lidas</li>
                        <li id="mais_historias" onclick="MinhaHist()">Minhas histórias</li>
                    </ul>
                    <hr>
                </nav>

                <div class="recentes">
                   <div class="container_obra_filtro">
                        <div class="container_obra_header">
                            <span>5 minutos atrás</span> 
                            <div class="dropdown">
                                <i onclick="toggleDropdown(event)" class="bi bi-three-dots-vertical dropdown-button" ></i>
                                <div class="dropdown-content">
                                    <a href="#">Reportar</a>
                                </div>
                            </div>
                        </div>
                        <div class="container_obra_titulo">
                            <a href="#"><img class="imagem_autor_obra_filtro" src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg"></a>
                            <p><span class="titulo_autor_obra_filtro">Hellsing77</span> publicou uma nova obra, seja uma das primeiras pessoas a lerem o primeiro capítulo !!</p>
                        </div>
                        <a href="#">
                            <div class="container_obra_info">
                                <div class="imagem">
                                    <img src="https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2023/03/22/whatsapp-image-2023-03-22-at-10-40-52-ubu8znvqrucm.jpeg">
                                </div>
                                <div class="info">
                                    <p class="titulo_obra_filtros">Titulo obra</p>
                                    <div class="categorias_filtros">
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                    </div>
                                    <p class="descrição_historia">Passou metade da vida trabalhando na biblioteca pública, organizando livros empoeirados em estantes velhas. Nesses momentos só pensava em duas coisas: na garota que observava no ônibus ao voltar para casa e nas histórias de aventuras que pretendia escrever algum dia — mas que na época existiam apenas na imaginação. Os anos passaram e ele nunca falou com a garota; sua principal obra, um manual fajuto de consulta ao época existiam apenas na imaginação. Os anos passaram e ele nunca falou counca fal</p>
                                </div>
                            </div>
                        </a>
                        <div class="container_obra_footer">
                            <p class="numeros_comentarios">Comentários: <span>6</span></p>
                            <a href="#" class="tela_obra">Ir para tela da obra</a>
                            <div class="like_deslike">
                                <div>
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <span>25</span>
                                </div>
                                <hr>
                                <i class="bi bi-hand-thumbs-down"></i>
                            </div>
                        </div>
                   </div>


                   <div class="container_obra_filtro">
                        <div class="container_obra_header">
                            <span>5 minutos atrás</span> 
                            <div class="dropdown">
                                <i onclick="toggleDropdown(event)" class="bi bi-three-dots-vertical dropdown-button" ></i>
                                <div class="dropdown-content">
                                    <a href="#">Reportar</a>
                                </div>
                            </div>
                        </div>
                        <div class="container_obra_titulo">
                            <a href="#"><img class="imagem_autor_obra_filtro" src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg"></a>
                            <p><span class="titulo_autor_obra_filtro">Hellsing77</span> publicou uma nova obra, seja uma das primeiras pessoas a lerem o primeiro capítulo !!</p>
                        </div>
                        <div class="mensagem_autor">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea, labore, ipsa provident soluta animi consequatur tenetur laudantium asperiores quia aperiam ut nulla vitae sint numquam? Rem quod architecto ab fugit.</p>
                        </div>
                        <a href="#">
                            <div class="container_obra_info">
                                <div class="imagem">
                                    <img src="https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2023/03/22/whatsapp-image-2023-03-22-at-10-40-52-ubu8znvqrucm.jpeg">
                                </div>
                                <div class="info">
                                    <p class="titulo_obra_filtros">Titulo obra</p>
                                    <div class="categorias_filtros">
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                    </div>
                                    <p class="descrição_historia">Passou metade da vida trabalhando na biblioteca pública, organizando livros empoeirados em estantes velhas. Nesses momentos só pensava em duas coisas: na garota que observava no ônibus ao voltar para casa e nas histórias de aventuras que pretendia escrever algum dia — mas que na época existiam apenas na imaginação. Os anos passaram e ele nunca falou com a garota; sua principal obra, um manual fajuto de consulta ao época existiam apenas na imaginação. Os anos passaram e ele nunca falou counca fal</p>
                                </div>
                            </div>
                        </a>
                        <div class="container_obra_footer">
                            <p class="numeros_comentarios">Comentários: <span>6</span></p>
                            <a href="#" class="tela_obra">Ir para tela da obra</a>
                            <div class="like_deslike">
                                <div>
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <span>25</span>
                                </div>
                                <hr>
                                <i class="bi bi-hand-thumbs-down"></i>
                            </div>
                        </div>
                    </div>

               <div class="container_obra_filtro">
                        <div class="container_obra_header">
                            <span>5 minutos atrás</span> 
                            <div class="dropdown">
                                <i onclick="toggleDropdown(event)" class="bi bi-three-dots-vertical dropdown-button" ></i>
                                <div class="dropdown-content">
                                    <a href="#">Reportar</a>
                                </div>
                            </div>
                        </div>
                        <div class="container_obra_titulo">
                            <a href="#"><img class="imagem_autor_obra_filtro" src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg"></a>
                            <p><span class="titulo_autor_obra_filtro">Melyssa</span>  adicionou um novo capítulo em sua obra !!</p>
                        </div>
                        <a href="#">
                            <div class="container_obra_info">
                                <div class="imagem">
                                    <img src="https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2023/03/22/whatsapp-image-2023-03-22-at-10-40-52-ubu8znvqrucm.jpeg">
                                </div>
                                <div class="info">
                                    <p class="titulo_obra_filtros">Titulo obra</p>
                                    <div class="categorias_filtros">
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                    </div>
                                    <p class="descrição_historia">Passou metade da vida trabalhando na biblioteca pública, organizando livros empoeirados em estantes velhas. Nesses momentos só pensava em duas coisas: na garota que observava no ônibus ao voltar para casa e nas histórias de aventuras que pretendia escrever algum dia — mas que na época existiam apenas na imaginação. Os anos passaram e ele nunca falou com a garota; sua principal obra, um manual fajuto de consulta ao época existiam apenas na imaginação. Os anos passaram e ele nunca falou counca fal</p>
                                </div>
                            </div>
                        </a>
                        <div class="container_obra_footer">
                            <p class="numeros_comentarios">Comentários: <span>6</span></p>
                            <a href="#" class="tela_obra">Ir para tela da obra</a>
                            <div class="like_deslike">
                                <div>
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <span>25</span>
                                </div>
                                <hr>
                                <i class="bi bi-hand-thumbs-down"></i>
                            </div>
                        </div>
                    </div>
               </div>

                   

                   
                </div>

                <div class="avaliacoes desativado">
                    <div class="container_obra_filtro">
                        <div class="container_obra_header">
                            <span>5 minutos atrás</span> 
                            <div class="dropdown">
                                <i onclick="toggleDropdown(event)" class="bi bi-three-dots-vertical dropdown-button" ></i>
                                <div class="dropdown-content">
                                    <a href="#">Reportar</a>
                                </div>
                            </div>
                        </div>
                        <div class="container_obra_titulo">
                            <a href="#"><img class="imagem_autor_obra_filtro" src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg"></a>
                            <p><span class="titulo_autor_obra_filtro">Hellsing77</span> publicou uma nova obra, seja uma das primeiras pessoas a lerem o primeiro capítulo !!</p>
                        </div>
                        <a href="#">
                            <div class="container_obra_info">
                                <div class="imagem">
                                    <img src="https://fotografiamais.com.br/wp-content/uploads/2018/11/composicao-de-imagem-galeria-1.jpg">
                                </div>
                                <div class="info">
                                    <p class="titulo_obra_filtros">Titulo obra</p>
                                    <div class="categorias_filtros">
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                    </div>
                                    <p class="descrição_historia">Passou metade da vida trabalhando na biblioteca pública, organizando livros empoeirados em estantes velhas. Nesses momentos só pensava em duas coisas: na garota que observava no ônibus ao voltar para casa e nas histórias de aventuras que pretendia escrever algum dia — mas que na época existiam apenas na imaginação. Os anos passaram e ele nunca falou com a garota; sua principal obra, um manual fajuto de consulta ao época existiam apenas na imaginação. Os anos passaram e ele nunca falou counca fal</p>
                                </div>
                            </div>
                        </a>
                        <div class="container_obra_footer">
                            <p class="numeros_comentarios">Comentários: <span>6</span></p>
                            <a href="#" class="tela_obra">Ir para tela da obra</a>
                            <div class="like_deslike">
                                <div>
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <span>25</span>
                                </div>
                                <hr>
                                <i class="bi bi-hand-thumbs-down"></i>
                            </div>
                        </div>
                   </div>
                </div>

                <div class="autor_alto_rank desativado">
                    <div class="container_obra_filtro">
                        <div class="container_obra_header">
                            <span>5 minutos atrás</span> 
                            <div class="dropdown">
                                <i onclick="toggleDropdown(event)" class="bi bi-three-dots-vertical dropdown-button" ></i>
                                <div class="dropdown-content">
                                    <a href="#">Reportar</a>
                                </div>
                            </div>
                        </div>
                        <div class="container_obra_titulo">
                            <a href="#"><img class="imagem_autor_obra_filtro" src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg"></a>
                            <p><span class="titulo_autor_obra_filtro">Melyssa</span>  adicionou um novo capítulo em sua obra !!</p>
                        </div>
                        <a href="#">
                            <div class="container_obra_info">
                                <div class="imagem">
                                    <img src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg">
                                </div>
                                <div class="info">
                                    <p class="titulo_obra_filtros">Titulo obra</p>
                                    <div class="categorias_filtros">
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                    </div>
                                    <p class="descrição_historia">Passou metade da vida trabalhando na biblioteca pública, organizando livros empoeirados em estantes velhas. Nesses momentos só pensava em duas coisas: na garota que observava no ônibus ao voltar para casa e nas histórias de aventuras que pretendia escrever algum dia — mas que na época existiam apenas na imaginação. Os anos passaram e ele nunca falou com a garota; sua principal obra, um manual fajuto de consulta ao época existiam apenas na imaginação. Os anos passaram e ele nunca falou counca fal</p>
                                </div>
                            </div>
                        </a>
                        <div class="container_obra_footer">
                            <p class="numeros_comentarios">Comentários: <span>6</span></p>
                            <a href="#" class="tela_obra">Ir para tela da obra</a>
                            <div class="like_deslike">
                                <div>
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <span>25</span>
                                </div>
                                <hr>
                                <i class="bi bi-hand-thumbs-down"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mais_lidas desativado">
                    <div class="container_obra_filtro">
                        <div class="container_obra_header">
                            <span>5 minutos atrás</span> 
                          
                            
                            <div class="dropdown">
                                <i onclick="toggleDropdown(event)" class="bi bi-three-dots-vertical dropdown-button" ></i>
                                <div class="dropdown-content">
                                    <a href="#">Reportar</a>
                                </div>
                            </div>

                        </div>
                        <div class="container_obra_titulo">
                            <a href="#"><img class="imagem_autor_obra_filtro" src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg"></a>
                            <p><span class="titulo_autor_obra_filtro">Melyssa</span>  adicionou um novo capítulo em sua obra !!</p>
                        </div>
                        <a href="#">
                            <div class="container_obra_info">
                                <div class="imagem">
                                    <img src="https://s2.glbimg.com/DPgnsS45MwEPkBVrdg5-y3EAyKw=/e.glbimg.com/og/ed/f/original/2018/10/22/103927770_maxresdefault.jpg">
                                </div>
                                <div class="info">
                                    <p class="titulo_obra_filtros">Titulo obra</p>
                                    <div class="categorias_filtros">
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                    </div>
                                    <p class="descrição_historia">Passou metade da vida trabalhando na biblioteca pública, organizando livros empoeirados em estantes velhas. Nesses momentos só pensava em duas coisas: na garota que observava no ônibus ao voltar para casa e nas histórias de aventuras que pretendia escrever algum dia — mas que na época existiam apenas na imaginação. Os anos passaram e ele nunca falou com a garota; sua principal obra, um manual fajuto de consulta ao época existiam apenas na imaginação. Os anos passaram e ele nunca falou counca fal</p>
                                </div>
                            </div>
                        </a>
                        <div class="container_obra_footer">
                            <p class="numeros_comentarios">Comentários: <span>6</span></p>
                            <a href="#" class="tela_obra">Ir para tela da obra</a>
                            <div class="like_deslike">
                                <div>
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <span>25</span>
                                </div>
                                <hr>
                                <i class="bi bi-hand-thumbs-down"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mais_historias desativado">
                    <div class="container_obra_filtro">
                        <div class="container_obra_header">
                            <span>5 minutos atrás</span> 
                            <div class="dropdown">
                                <i onclick="toggleDropdown(event)" class="bi bi-three-dots-vertical dropdown-button" ></i>
                                <div class="dropdown-content">
                                    <a href="#">Reportar</a>
                                </div>
                            </div>
                        </div>
                        <div class="container_obra_titulo">
                            <a href="#"><img class="imagem_autor_obra_filtro" src="https://blog.2amgaming.com/wp-content/uploads/2020/01/Como-usar-o-ReShade-para-melhorar-a-imagem-dos-jogos-pelo-GeForce-Experience.jpg"></a>
                            <p><span class="titulo_autor_obra_filtro">Melyssa</span>  adicionou um novo capítulo em sua obra !!</p>
                        </div>
                        <a href="#">
                            <div class="container_obra_info">
                                <div class="imagem">
                                    <img src="https://static.vecteezy.com/ti/fotos-gratis/t2/22653879-fantasia-ilha-com-cachoeiras-3d-ilustracao-elementos-do-isto-imagem-mobiliado-de-nasa-generativo-ai-gratis-foto.jpg">
                                </div>
                                <div class="info">
                                    <p class="titulo_obra_filtros">Titulo obra</p>
                                    <div class="categorias_filtros">
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                        <span>Ficção</span>
                                        <span>Espaço</span>
                                        <span>Aventura</span>
                                        <span>Terror</span>
                                        <span>Romance</span>
                                        <span>Vampiros</span>
                                    </div>
                                    <p class="descrição_historia">Passou metade da vida trabalhando na biblioteca pública, organizando livros empoeirados em estantes velhas. Nesses momentos só pensava em duas coisas: na garota que observava no ônibus ao voltar para casa e nas histórias de aventuras que pretendia escrever algum dia — mas que na época existiam apenas na imaginação. Os anos passaram e ele nunca falou com a garota; sua principal obra, um manual fajuto de consulta ao época existiam apenas na imaginação. Os anos passaram e ele nunca falou counca fal</p>
                                </div>
                            </div>
                        </a>
                        <div class="container_obra_footer">
                            <p class="numeros_comentarios">Comentários: <span>6</span></p>
                            <a href="#" class="tela_obra">Ir para tela da obra</a>
                            <div class="like_deslike">
                                <div>
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <span>25</span>
                                </div>
                                <hr>
                                <i class="bi bi-hand-thumbs-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="lateral_direita">
            <div class="em_alta">
                <div class="em_alta_header">
                    <p class="">Em alta</p>
                    <hr>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>
                
            </div>






            <div class="em_alta">
                <div class="em_alta_header">
                    <p class="">Em alta</p>
                    <hr>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>

                <div class="lateral_esquerda_obra">
                    <div class="lateral_esquerda_img">
                        <img src="https://sm.ign.com/ign_br/game/l/league-of-/league-of-legends_d152.jpg">
                    </div>
                    <div class="info_obra_lateral_esquerda">
                        <p><span class="titulo_lateral_esquerda">Nome: </span><span>Bleac</span></p>
                        <p class="container_categoria_lateral_esquerda"><span class="titulo_lateral_esquerda">Categoria principal:</span>
                            <span class="categoria_lateral_esquerda">Ação</span>
                        </p>

                        <p><span class="titulo_lateral_esquerda">Descrição:</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                </div>
                
            </div>

            


        </div>
    </main>

    <?php include_once 'footer.php'; ?>
</body>

<script>
    function recentes(){
        document.querySelector(".recentes").style.display="block";

        document.querySelector("#recentes").classList.add("ativo");
        document.querySelector("#avaliacoes").classList.remove("ativo");
        document.querySelector("#autor_alto_rank").classList.remove("ativo");
        document.querySelector("#mais_lidas").classList.remove("ativo");
        document.querySelector("#mais_historias").classList.remove("ativo");

        document.querySelector(".avaliacoes").style.display="none";
        document.querySelector(".autor_alto_rank").style.display="none";
        document.querySelector(".mais_lidas") .style.display="none";
        document.querySelector(".mais_historias").style.display="none";

    }
    function avaliacoes(){
         document.querySelector(".avaliacoes").style.display="block";

        document.querySelector("#recentes").classList.remove("ativo");
        document.querySelector("#avaliacoes").classList.add("ativo");
        document.querySelector("#autor_alto_rank").classList.remove("ativo");
        document.querySelector("#mais_lidas").classList.remove("ativo");
        document.querySelector("#mais_historias").classList.remove("ativo");

         document.querySelector(".recentes").style.display="none";
         document.querySelector(".autor_alto_rank").style.display="none";
         document.querySelector(".mais_lidas") .style.display="none";
         document.querySelector(".mais_historias").style.display="none";
    }
    function rank(){
        document.querySelector(".autor_alto_rank").style.display="block";

        document.querySelector("#recentes").classList.remove("ativo");
        document.querySelector("#avaliacoes").classList.remove("ativo");
        document.querySelector("#autor_alto_rank").classList.add("ativo");
        document.querySelector("#mais_lidas").classList.remove("ativo");
        document.querySelector("#mais_historias").classList.remove("ativo");

        document.querySelector(".avaliacoes").style.display="none";
        document.querySelector(".recentes").style.display="none";
        document.querySelector(".mais_lidas") .style.display="none";
        document.querySelector(".mais_historias").style.display="none";
    }
    function Maislidas(){
        document.querySelector(".mais_lidas") .style.display="block";

        document.querySelector("#recentes").classList.remove("ativo");
        document.querySelector("#avaliacoes").classList.remove("ativo");
        document.querySelector("#autor_alto_rank").classList.remove("ativo");
        document.querySelector("#mais_lidas").classList.add("ativo");
        document.querySelector("#mais_historias").classList.remove("ativo");

        document.querySelector(".recentes").style.display="none";
        document.querySelector(".avaliacoes").style.display="none";
        document.querySelector(".autor_alto_rank").style.display="none";
        document.querySelector(".mais_historias").style.display="none";
    }
    function MinhaHist(){
        document.querySelector(".mais_historias").style.display="block";

        document.querySelector("#recentes").classList.remove("ativo");
        document.querySelector("#avaliacoes").classList.remove("ativo");
        document.querySelector("#autor_alto_rank").classList.remove("ativo");
        document.querySelector("#mais_lidas").classList.remove("ativo");
        document.querySelector("#mais_historias").classList.add("ativo");

        document.querySelector(".recentes").style.display="none";
        document.querySelector(".avaliacoes").style.display="none";
        document.querySelector(".autor_alto_rank").style.display="none";
        document.querySelector(".mais_lidas") .style.display="none";
    }




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









document.addEventListener("DOMContentLoaded", function () {
  const carousels = document.querySelectorAll(".carousel");

  carousels.forEach(function (carousel) {
    const carouselItems = carousel.querySelectorAll(".carousel-item");
    const prevButton = carousel.querySelector(".prev-button");
    const nextButton = carousel.querySelector(".next-button");
    let currentIndex = 0;

    function showItem(index) {
      carouselItems.forEach((item) => item.classList.remove("active"));
      carouselItems[index].classList.add("active");
    }

    function nextItem() {
      currentIndex = (currentIndex + 1) % carouselItems.length;
      showItem(currentIndex);
    }

    function prevItem() {
      currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
      showItem(currentIndex);
    }

    nextButton.addEventListener("click", nextItem);
    prevButton.addEventListener("click", prevItem);

    setInterval(nextItem, 5000);
  });
});

</script>
</html>