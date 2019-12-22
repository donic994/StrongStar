function Provjera(){
    kvacica.addEventListener("change", function(event){
        if(document.getElementById("kvacica").checked==true){
    document.getElementById("Prijava").action="php/prijava_dva_koraka.php";
}
else{
    document.getElementById("Prijava").action="php/cookie.php";
}
    });
}