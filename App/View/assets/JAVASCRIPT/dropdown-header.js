let click_events = 1;
function clique_explorar(){
    if(click_events == 1){
        document.getElementById('dropdown_explorar_girar').classList.add("girar_dropdown");
        document.getElementById('dropdown_explorar').classList.remove("nada");
        document.getElementById('dropdown_explorar').classList.add("dropdown_explorar");
        click_events=2;
    }else if(click_events == 2){
        document.getElementById('dropdown_explorar').classList.add("nada");
        document.getElementById('dropdown_explorar').classList.remove("dropdown_explorar");
        document.getElementById('dropdown_explorar_girar').classList.remove("girar_dropdown");
        click_events = 1;
    }
}

let click_perfil = 1;
function clique_perfil(){
    if(click_perfil == 1 ){
            document.getElementById('dropdown_perfil_girar').classList.add("girar_dropdown");
            document.getElementById('dropdown_perfil').classList.add("dropdown_perfil");
            document.getElementById('dropdown_perfil').classList.remove("nada");
            click_perfil=2;
        }else if(click_perfil == 2){
            document.getElementById('dropdown_perfil').classList.remove("dropdown_perfil");
            document.getElementById('dropdown_perfil').classList.add("nada");
            document.getElementById('dropdown_perfil_girar').classList.remove("girar_dropdown");
            click_perfil = 1;
        }
    }


    function abrirMenu(){
        document.getElementById("drop_right").classList.add("menu_aberto");
    }

    // usar toggle
