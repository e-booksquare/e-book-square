
        const aviso_limite = document.getElementById('aviso_limite');
        const btn_submit = document.getElementById('submit');
        const limite_text = document.getElementById('limite_char');
        const textarea = document.getElementById('descricao');
        const limite_chars = 700;


        let chars_contains = textarea.value.length 
        limite_text.textContent = chars_contains + "/" + limite_chars

        if(chars_contains > limite_chars)
            {
                textarea.classList.add("limit");
                limite_text.classList.add("limit_text");
                btn_submit.setAttribute("disabled", "disabled");
                aviso_limite.textContent = ` Você ultrapassou o limite de ${limite_chars} caracteres ;-;`;
                aviso_limite.style.color = "#ff2851"
            } 

        textarea.addEventListener("input", () => {
             let quant_chars =  textarea.value.length  
            limite_text.textContent = quant_chars + "/" + limite_chars 

            if(quant_chars > limite_chars)
            {
                textarea.classList.add("limit");
                limite_text.classList.add("limit_text");
                btn_submit.setAttribute("disabled", "disabled");
                aviso_limite.textContent = ` Você ultrapassou o limite de ${limite_chars} caracteres ;-;`;
                aviso_limite.style.color = "#ff2851"
            } 
            else
            {
                
                textarea.classList.remove("limit");
                limite_text.classList.remove("limit_text");
                btn_submit.removeAttribute("disabled", "disabled");
                aviso_limite.textContent = "";
            }

        })