
const file_banner = document.getElementById("file_banner_perfil");
const banner_perfil = document.getElementById("banner_perfil");



file_banner.addEventListener("change", () => {

    if(file_banner.files.length <= 0)
    {
        return
    }
    let reader = new FileReader();
    reader.onload = () => {
        banner_perfil.src = reader.result;
    }

    reader.readAsDataURL(file_banner.files[0])
})