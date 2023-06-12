var inputCat = document.getElementById('categoria_input').value;
var x = 1;
var quantidade = 0; 
let categoriaSelecionada = [];
window.caty = []
window.textCaty = []


    function etaria_select_value(){
        var input_etaria = document.getElementById('etaria_input');
        var select_etaria = document.getElementById('etaria');
        var valor_etaria = select_etaria.options[select_etaria.selectedIndex].value;

        input_etaria.value = valor_etaria
        console.log(input_etaria.value)
    }

        function categoria(textoBD, valorBD, qttCat) {
            var input_categoria = document.getElementById('categoria_input');
            var select = document.getElementById('categoria');
            var texto = select.options[select.selectedIndex].text;
            var valor = select.options[select.selectedIndex].value;

            if(qttCat > 9){ return }

            if(textoBD != null && valorBD != null){
                texto = textoBD
                valor = valorBD
            }
            valor = parseInt(valor);

            console.log(texto +" "+ valor +" --> Func_Categoria")

           function findCat(valor, catAry) {
                let elementFound = false;
                for (let i = 0; i < catAry.length; i++) {
                    if (catAry[i] === valor) {
                        return true;
                    }
                }
                return elementFound;
            }

            let trava = findCat(valor, window.caty)
            if(texto != "Selecionar" ){
    
                console.log(window.caty.length)
                if(window.caty.length <= 8 && trava == false){
                    
                    let novo_categoria = document.createElement('p');
                    novo_categoria.className = "categoria "+texto;
                    novo_categoria.innerHTML = texto;
                    novo_categoria.setAttribute("id", "categoria" + valor);
                    novo_categoria.setAttribute("onclick", `remove('categoria' + ${valor})`);
                    novo_categoria.setAttribute('data-id' , valor);
                    let elemento = document.querySelector('.elementos_aqui');
                    elemento.appendChild(novo_categoria);
                    window.caty.push(valor)  
                    console.log(window.caty)
                    input_categoria.value = window.caty; 
        }
    }
}  

function remove(IdElementCat){
    let itemRemove = document.querySelector("#"+IdElementCat)
    var IDCatRemove = itemRemove.dataset.id
    window.caty = window.caty.filter(e => e != IDCatRemove)
    let input_categoria = document.getElementById('categoria_input');
    input_categoria.value = window.caty 
    itemRemove.remove()
    
}

function categoriaUser(){
    var input_categoria = document.getElementById('categoria_input');
    input_categoria.value = window.caty   
}
categoriaUser();


function catUserShow() {

for (let i = 0; i < window.textCatyBD.length; i++) {
    let NomeCat = window.textCatyBD[i];
    let IDCat = window.catyBD[i];

    categoria(NomeCat, IDCat, window.textCatyBD.length)
}
    return
}  

catUserShow()