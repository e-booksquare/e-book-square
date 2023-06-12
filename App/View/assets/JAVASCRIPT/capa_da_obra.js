$("#enviarCom").on("click", function () {
    var ContentCom = $("#conteudoComentario").val();
    var ID_tipo = $("#idObra").val();
    var TipoCom = $("#tipoComentario").val();
    var DesCom = $("#destinatario").val();
    var URL = $("#URL").val();

    $.ajax({
        url: "../../Model/comentariobd.php",
        type: "post",
        data: {
            conteudoComentario: ContentCom, idObra: ID_tipo,
            tipoComentario: TipoCom, destinatario: DesCom,
            URL: URL
        }
    }).done(function (e) {
        $("#conteudoComentario").html("olá")

    })
})

function tirar_filtro(id) {
    document.querySelector(`#texto${id}`).classList.remove("spoiler");
    document.querySelector(`.ver_comentario_spoiler${id}`).style.display = "none";
}

function reply(code) {
    $('.escrever_comentario textarea').html(code)
}

$("#obrafav").on("click", function () {

    var IDObra = $("#IDObra").val();
    var favclick = "on";

    $.ajax({
        url: `../../Model/favoritobd.php?action=renderFav&obra=${IDObra}&favclick=${favclick}`,
        success: (obrafav) => $("#obrafav").html(obrafav)
    })
})

var IDObra = $("#IDObra").val();

// RENDERIZAR DADOS E HTML DO NÍVEL APÓS O CARREGAMENTO DA PÁGINA
$.ajax({
    url: `../../Model/favoritobd.php?action=renderFav&obra=${IDObra}`,
    success: (obrafav) => $("#obrafav").html(obrafav)
})

$("#btn_seg_user").on("click", function () {

    var IDSeg = $("#idseguir").val();
    var segclick = "on";

    $.ajax({
        url: `../../Model/seguidor_bd.php?action=renderSeg&userPerfil=${IDSeg}&segclick=${segclick}`,
        success: (btn_seg_user) => $("#btn_seg_user").html(btn_seg_user)
    })
})

var IDSeg = $("#idseguir").val();

// RENDERIZAR DADOS E HTML DO NÍVEL APÓS O CARREGAMENTO DA PÁGINA
$.ajax({
    url: `../../Model/seguidor_bd.php?action=renderSeg&userPerfil=${IDSeg}`,
    success: (btn_seg_user) => $("#btn_seg_user").html(btn_seg_user)
})

//----------------

$('#obraamei').on('click', function () {

    var ID_obra_amei = $('#obraamei').data('id');
    var ameiclick = "on";

    $.ajax({
        url: `../../Model/ameibd.php?action=renderamei&obra=${ID_obra_amei}&ameiclick=${ameiclick}`,
        success: (obraamei) => $('#obraamei').html(obraamei)
    })

});

$.ajax({
    url: `../../Model/ameibd.php?action=renderamei&obra=${IDObra}`,
    success: (obraamei) => $(`#obraamei`).html(obraamei)
})



$('.obrasOutras').on('click', function () {

    var ID_obra_amei = $(this).data('id');
    var ameiclick = "on";

    $.ajax({
        url: `../../Model/ameibd.php?action=renderamei&obra=${ID_obra_amei}&ameiclick=${ameiclick}`,
        success: (obraamei) => $(this).html(obraamei)
    })

});

let obrasameiOutras = document.querySelectorAll(".ameiOutras")
let obraslengthOutras = obrasameiOutras.length
for (let i = 0; i < obraslengthOutras; i++) {

    var ID_obra_ameiOutras = $(`#obraameioutra${i}`).data("id");

    $.ajax({
        url: `../../Model/ameibd.php?action=renderamei&obra=${ID_obra_ameiOutras}`,
        success: (obraamei) => $(`#obraameioutra${i}`).html(obraamei)
    })
}