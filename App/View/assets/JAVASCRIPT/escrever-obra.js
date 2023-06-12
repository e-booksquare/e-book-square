function autoResize()
    {
        objTextArea = document.getElementById('historia');
        while (objTextArea.scrollHeight > objTextArea.offsetHeight)
        {
            objTextArea.rows += 1;
        }
        if (objTextArea.scrollHeight < objTextArea.offsetHeight)
        {
            objTextArea.rows += -1;
        }
        
        
    }
    /*$('textarea[name="historia"]').on('keyup change onpaste', function () {
    var alturaScroll = this.scrollHeight;
    var alturaCaixa = $(this).height();
        if (alturaScroll > (alturaCaixa + 10)) {
        if (alturaScroll > 99999999999999999) return;
        $(this).css('height', alturaScroll);
    }

    if( $(this).val() == '' ){
        // retonando ao height padrão de 40px
        $(this).css('height', '40px');
    }

});*/