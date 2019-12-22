function Dodaj_u_program(str, id){
    
    
    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("slika"+id).style.display='none';
            }
           
    }

    xhttp.open("GET","php/dodaj_u_program.php?data="+str, true);
    xhttp.send();     
};

function Dodaj_u_kosaricu(str, id){
    
    
    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("slika"+id).style.display='none';
            }
           
    }

    xhttp.open("GET","dodaj_u_kosaricu.php?data="+id, true);
    xhttp.send();     
};

function otvori(str, id){
    
    
    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pdf"+id).href="../pdf/pdf.pdf";
            }
           
    }
};

function Provjeri(){
    
    var kod=document.getElementById("kod").value;
    
    var xhttp = new XMLHttpRequest();

     xhttp.open("GET","provjeri_kupon.php?kod="+kod, true);
    xhttp.send();
};