
        const file = document.getElementById("foto_perfil");
        const icon_perfil = document.getElementById("icon_perfil");


        file.addEventListener("change", () => {

            if(file.files.length <= 0)
            {
                return
            }
            let reader = new FileReader();
            reader.onload = () => {
                icon_perfil.src = reader.result;
            }

            reader.readAsDataURL(file.files[0])
        })
