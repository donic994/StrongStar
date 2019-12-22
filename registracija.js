function ProvjeriDostupnost(str){
    
    if (str == "") {
        document.getElementById("provjeraKorisnickogImena").innerHTML = "";
        return;
    }
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("provjeraKorisnickogImena").innerHTML = this.responseText;
            }
           
    }
    xhttp.open("GET","php/registracija_username.php?data="+str, true);
    xhttp.send();
    
        
};

function ProvjeriEmail(str1){
    
    if (str1 == "") {
        document.getElementById("provjeraEmaila").innerHTML = "";
        return;
    }
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("provjeraEmaila").innerHTML = this.responseText;
            } 
    }
    xhttp.open("GET","php/registracija_mail.php?data="+str1, true);
    xhttp.send();
        
};


function dogadajRegistracija() {

    //provjera unosa lozinke
    $("#lozinka").focusout(function () {

        var pass = $("#lozinka").val();
        var uvjet1 = /^(?=(?:.*[A-Z]){2})(?=(?:.*[a-z]){2})(?=(?:.*[0-9]){1})\S+$/;

        if (pass.length >= 15 || !(pass.match(uvjet1)) || pass.length <= 5) {
            $("#lozinka").css("background", "#ff9c9c");
            $("#greske").html("Lozinka se mora sastojati barem 2 velika, 2 mala slova i 1 broj.");
            $("#potvrdaLozinke").attr('disabled', 'disabled');
            $("#registracija").attr('disabled', 'disabled');
        } else {
            $("#lozinka").css("background", "white");
            $("#potvrdaLozinke").removeAttr('disabled');
            $("#registracija").removeAttr('disabled');
            $("#greske").html("");
        }
    });

    //zabrani unos potvrde lozinke
    $("#potvrdaLozinke").keyup(function () {
        var pass = $("#lozinka").val();
        var potvrda = $("#potvrdaLozinke").val();

        if (pass != potvrda) {
            $("#potvrdaLozinke").css("background", "#ff9c9c");
            $("#greske").html("Unešene lozinke se ne poklapaju!");
        } else {
            $("#greske").html("");
            $("#potvrdaLozinke").css("background", "white");
        }
    });


    //Zaključaj korisničko ime ako je ime i prezime prazno
    $("#korisnickoIme").focusout(function () {
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();

        if (ime.length != 0 && prezime.length != 0) {
            $("#korisnickoIme").removeAttr('disabled');
            $("#greske").html("");
            $("#korisnickoIme").css("background", "white");
            $("#registracija").removeAttr('disabled');
        } else {
            $("#greske").html("Prvo unesite ime i prezime!");
            $("#korisnickoIme").css("background", "#ff9c9c");
            $("#korisnickoIme").attr('disabled', 'disabled');
            $("#registracija").attr('disabled', 'disabled');
        }
    });


    //provjeri prezime
    $("#prezime").keyup(function () {
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();
        var uvjet1 = /^[A-Z]+/;

        if (!(prezime.match(uvjet1))) {
            $("#greske").html("Prezime počinje velikim početnim slovom!!");
            $("#prezime").css("background", "#ff9c9c");
        } else {
            $("#greske").html("");
            $("#prezime").css("background", "white");
        }

        if (ime.length != 0 && prezime.length != 0) {

            $("#korisnickoIme").removeAttr('disabled');
            $("#registracija").removeAttr('disabled');
        } else {
            $("#korisnickoIme").attr('disabled', 'disabled');
            $("#registracija").attr('disabled', 'disabled');
        }
    });


    //provjeri ime
    $("#ime").keyup(function () {
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();
        var uvjet1 = /^[A-Z]+/;

        if (!(ime.match(uvjet1))) {
            $("#greske").html("Ime počinje velikim početnim slovom!!");
            $("#ime").css("background", "#ff9c9c");
        } else {
            $("#greske").html("");
            $("#ime").css("background", "white");
        }

        if (ime.length != 0 && prezime.length != 0) {
            $("#korisnickoIme").removeAttr('disabled');
            $("#registracija").removeAttr('disabled');
        } else {
            $("#korisnickoIme").attr('disabled', 'disabled');
            $("#registracija").attr('disabled', 'disabled');
        }
    });
   
   
    
    
    return true;
}

function ProvjeriCaptcha(){
    console.log(grecaptcha.getResponse());
    if(grecaptcha.getResponse()==0){
        return false;
    }
    else{
        return true;
    }
}