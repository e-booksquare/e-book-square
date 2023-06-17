<?php
  include_once '../../Model/verificacao.php';

  if(isset($_SESSION['ID_user'])){

    if(isset($_GET['obra']))
    {
      $idObra = $_GET['obra'];
      $obrasCapa = $classLog->Obra($idObra);

      if(isset($_GET['cap']))
      {
        $IDCap = $_GET['cap'];
        $cap = $classLog->CapituloEspecifico($IDCap, $idObra);
      }  
    }  

  }
 
  

?>

<!DOCTYPE html>

<html lang="PT-BR">
	<head>
		<meta charset="utf-8" />
		<title>E-Book Square | Escrever</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

        <link rel="stylesheet" href="../assets/CSS/header.css">
        <link rel="stylesheet" href="../assets/CSS/footer.css">
        <link rel="stylesheet" href="../assets/CSS/escrever-obra.css">

		<link rel="stylesheet" href="../assets/Editor_Texto/CSS/editor_texto.css">
		<link rel="stylesheet" href="../assets/Editor_Texto/CSS/rte_theme_default.css" />
		<script type="text/javascript" src="../assets/Editor_Texto/JS/rte.js"></script>
		<script>RTE_DefaultConfig.url_base='../assets/Editor_Texto/richtexteditor'</script>
		<script type="text/javascript" src='../assets/Editor_Texto/richtexteditor/plugins/all_plugins.js'></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	</head>
	<body>
    <main>
      <?php
      include_once("header.php");
      ?>
      <form action="../../Model/valida_cap.php" method="post" autocomplete="off">
          <div class="container_editor_texto">
            <?php         
              $capitulo_Count = $classLog->Count('ID_capitulo', 'capitulo', ["obra_FK =".$_GET['obra']]); 
            ?>
              <div class="Titulo_entrada">
                  <input maxlength="" class="titulo_obra" name="titulo_historias" id="titulo_historias" placeholder="Título do Capitulo" value=" <?php if(isset($_GET['action']) && $_GET['action'] == 'atualizar'){ echo $cap['titulo_cap'] ;}else{ echo "Capítulo ".$capitulo_Count+1;}?>" autofocus>
              </div>
              


          <!-- <textarea placeholder="Começe sua história aqui" id="conteudo" name="conteudo">
            <?php if(isset($_GET['action']) && $_GET['action'] == 'atualizar'){ echo $cap['conteudo']; }?>
          </textarea> -->

          <textarea placeholder="Começe sua história aqui" id="conteudo" name="conteudo">
            <?php if(isset($_GET['action']) && $_GET['action'] == 'atualizar'){ echo $cap['conteudo']; }?>
          </textarea>

          <input type="hidden" name="obra_FK" value="<?=$obrasCapa['ID_obra'];?>">
          <?php if(isset($_GET['action']) && $_GET['action'] == 'atualizar'){ ?>
            <input type="hidden" name="IDCap" value="<?=$cap['ID_capitulo'];?>">
            <?php }?>
          </div>    

          <section class="botoes">
            <div class="container_botoes">
              <div class="botoes_salvar_cancelar">
                <button href="#"><p class="sa" onclick="salvar()">
                  PUBLICAR 
                </p></button>
                <a href="feed.php"><p class="cancelar">CANCELAR</p></a>
              </div>
            </div>
          </section>
                     


      </main>
        </form> 
        <?php
        include_once("footer.php");
        ?>
	</body>

	<script src="patch.js"></script>
  <script src="../assets/JAVASCRIPT/header.js"></script>
  <script src="../../Model/ckeditor/ckeditor.js"></script>
  <script src="../assets/JAVASCRIPT/editor_ckeditor.js"></script>

	<script>

    function salvar(){
      document.querySelector(".container_obra_filtro").style.display = "block";
      document.querySelector("#footer").classList.add("filter");
      document.querySelector("main").classList.add("filter");
    }
    function cancelar_modal(){
      document.querySelector(".container_obra_filtro").style.display = "none";
      document.querySelector("#footer").classList.remove("filter");
      document.querySelector("main").classList.remove("filter");
    }
		// var editor1 = new RichTextEditor("#conteudo");
		// var editor1 = new RichTextEditor("#conteudo", editor1cfg);
		
		// function downloadPDFDialog() {
		// 	var valor_text = document.getElementById("conteudo").value
		// 	editor1.setHTMLCode(valor_text)
		// 	editor1.execCommand("html2pdf");
		// }


		// function exibir_texto_alert(){

		// 	var valor_texto_alert = document.getElementById("inp_editor1").value;
		// 	editor1.setHTMLCode(valor_texto_alert)
		// 	var alert_texto_sem_comando = editor1.getText(valor_texto_alert);
    //   var valor_texto = document.getElementById("texto_hisoria")
    //   valor_texto.value = alert_texto_sem_comando;
    //   submit();
		// }
    // function submit(){
     
    //         var Titulo_Historia = $("#titulo_historias").val();
    //         var Historia = $("#texto_hisoria").val();
    //         var Obra_FK = $("#obra_fk").val();
          
    //         $.ajax({
              
    //             url: "../../Model/valida_cap.php",
    //             type: "post",
    //             data:{
    //                 titulo_historias: Titulo_Historia , conteudo: Historia,
    //                 obra_FK: Obra_FK
                    
    //             }
    //         }).done(function(e){
    //             $("#conteudoComentario").html("olá");
               
    //         })
    //       }
	</script>
</html>