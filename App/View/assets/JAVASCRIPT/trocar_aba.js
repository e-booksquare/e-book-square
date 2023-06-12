let obra = document.getElementById('Conteudo_obras');
let Conversas = document.getElementById('Conversas');
let Publico = document.getElementById('Publico');
let Conquistas = document.getElementById('Conquistas');
let Titulo_Obra = document.getElementById('Titulo_Obra');
let Titulo_Publico = document.getElementById('Titulo_Publico');
let Titulo_Conversas = document.getElementById('Titulo_Conversas');
let Titulo_Conquistas = document.getElementById('Titulo_Conquistas');

function trocarAba(x){
    if(x == "Obras"){
        obra.style.display = "block";
        Publico.style.display ="none";
        Conversas.style.display ="none";
        Conquistas.style.display ="none";

        Titulo_Obra.classList.add('titulo_obras');
        Titulo_Publico.classList.add('titulo_desativado');
        Titulo_Conversas.classList.add('titulo_desativado');
        Titulo_Conquistas.classList.add('titulo_desativado');

        Titulo_Obra.classList.remove('titulo_desativado');
        Titulo_Publico.classList.remove('titulo_obras');
        Titulo_Conversas.classList.remove('titulo_obras');
        Titulo_Conquistas.classList.remove('titulo_obras');
    }
    else if(x == "Publico"){
        obra.style.display = "none";
        Publico.style.display ="block";
        Conversas.style.display ="none";
        Conquistas.style.display ="none";

        Titulo_Obra.classList.add('titulo_desativado');
        Titulo_Publico.classList.add('titulo_obras');
        Titulo_Conversas.classList.add('titulo_desativado');
        Titulo_Conquistas.classList.add('titulo_desativado');

        Titulo_Obra.classList.remove('titulo_obras');
        Titulo_Publico.classList.remove('titulo_desativado');
        Titulo_Conversas.classList.remove('titulo_obras');
        Titulo_Conquistas.classList.remove('titulo_obras');
    }
    else if(x == "Conversas"){
        obra.style.display = "none";
        Publico.style.display ="none";
        Conversas.style.display ="block";
        Conquistas.style.display ="none";

        Titulo_Obra.classList.add('titulo_desativado');
        Titulo_Publico.classList.add('titulo_desativado');
        Titulo_Conversas.classList.add('titulo_obras');
        Titulo_Conquistas.classList.add('titulo_desativado');

        Titulo_Obra.classList.remove('titulo_obras');
        Titulo_Publico.classList.remove('titulo_obras');
        Titulo_Conversas.classList.remove('titulo_desativado');
        Titulo_Conquistas.classList.remove('titulo_obras');
    }
    else if(x == "Conquistas"){
        obra.style.display = "none";
        Publico.style.display ="none";
        Conversas.style.display ="none";
        Conquistas.style.display ="block";

        Titulo_Obra.classList.add('titulo_desativado');
        Titulo_Publico.classList.add('titulo_desativado');
        Titulo_Conversas.classList.add('titulo_desativado');
        Titulo_Conquistas.classList.add('titulo_obras');

        Titulo_Obra.classList.remove('titulo_obras');
        Titulo_Publico.classList.remove('titulo_obras');
        Titulo_Conversas.classList.remove('titulo_obras');
        Titulo_Conquistas.classList.remove('titulo_desativado');
    }
    
}