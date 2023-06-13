$(document).ready(function (){

    // $('#inputChatMessage').on('keyup', function(e){
    //     if(e.which != 13) return; // não é o "enter"
    //     alert("enter")
    // });

    function buscarNome(nome){
        $.ajax({
            url: "../../Model/searchbd.php",
            method: "POST",
            data: {nome:nome},
            success: (data) => $('#result').html(data)
            })
    }
    
        $('#pesquisa').keyup(function(e){
            var nome = $(this).val();
            if (nome != ''){
                buscarNome(nome)

                $('#pesquisa').keypress(function(event) {
                    if (event.which === 13) {
                      event.preventDefault();
                      window.location.href = `http://localhost/e_book_square/App/View/pages/pesquisa.php?search=${nome}`;
                    }

                  });
                  
            }
        });

        $(".opcoes_dropdown").on("click", function() {
            const categoria = $(this).html()
            if (categoria != '+ Mais') {
                window.location.href = `http://localhost/e-book-square/App/View/pages/pesquisa.php?search=${categoria}`;
            }

              return;
        })



    
        function getNumberOfNot(){
            $.ajax({
                    url: "../../Model/notificacaobd.php",
                    type: "post",
                    data:{
                        renderNot: 7,
                    },
                    success: (nNot) => $("#numberNot").html(nNot) 
                })
        }
     
        function deactivateNot(){
            $.ajax({
                    url: "../../Model/notificacaobd.php",
                    type: "post",
                    data:{
                        renderNot: 8,
                    }
                })
                getNumberOfNot()
        }
    
        function getNotList(conta_obra, idListNot){
            
            $.ajax({
                url: "../../Model/notificacaobd.php",
                    type: "post",
                    data:{
                        renderNot: "renderNotList",
                        conta_obra: conta_obra
                    },
                    success: (listNot) => $(`#${idListNot}`).html(listNot)
            })
    
        }
        
        getNumberOfNot()

        setTimeout(() => {
            setInterval(() => getNumberOfNot(), 30000); // 30 seconds to find noti for repeat
          }, 30000); // 30 seconds delay
        
        $("#iconNot").on("click",function(){

            if(!$(".container_notificacao").hasClass('aberto')){return;}
            
            getNotList(0,"minha_conta_not");
            getNotList(1,"minha_historia_not");
            deactivateNot()
        })
    
        $("#exc").on("click",function(){
            
            var arr = [];
          $("input:checkbox[name=not]:checked").each(function() {
            arr.push($(this).val());
          });
    
          $.ajax({
            url: "../../Model/notificacaobd.php",
                type: "post",
                data:{
                    delNot: true,
                    IDNOT_CHK: arr,
                },
                success: (e) => alert(e)
            })
    
            getNotList(1,"minha_historia_not");
            getNumberOfNot()
        })
})

