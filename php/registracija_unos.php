<?php
header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$korisnicko_ime = $_POST["korisnickoIme"];
$email = $_POST["email"];
$lozinka = $_POST["lozinka"];
$kriptiranaLozinka = md5($lozinka);
$hash = md5( rand(0,1000) );


$ispravno = true;
    $upit1 = "SELECT * FROM Korisnik WHERE Korisnicko_ime='$korisnicko_ime'";
    $rez = $veza->selectDB($upit1);
    if (mysqli_num_rows($rez) > 0) {
        $err_podudaranje = "Korisničko ime već postoji";
        $ispravno = false;
    }
    if (!$ispravno) {
        echo $err_podudaranje;
        $veza->zatvoriDB();
    } else {
        $err_podudaranje = "Korsničko ime je slobodno";
        echo $err_podudaranje;
    }
    
$upit = "INSERT INTO Korisnik(Ime, Prezime, Korisnicko_ime, Email, Lozinka, Kriptirana_lozinka, Tip_korisnika, Status_idStatus, Aktivacijski_token, Datum_registracije, Broj_bodova) "
        . "VALUES('$ime', '$prezime', '$korisnicko_ime', '$email', '$lozinka', '$kriptiranaLozinka', 1, 2, '$hash', now(), 20);";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}

$veza->zatvoriDB();

$to      = $email; 
$subject = 'Prijava | Aktivacija';
$message = '
 
Hvala što ste se prijavili na našu stranicu!
Vaš je račun kreiran, možete se prijaviti sa dolje navedenim korisničkim imenom i lozinkom nakon što aktivirate račun pritiskom na link
------------------------
Korisničko ime: '.$korisnicko_ime.'
Lozinka: '.$lozinka.'
------------------------
 
Molimo Vas da aktivirate račun pritiskom na ovaj link:
https://barka.foi.hr/WebDiP/2016_projekti/WebDiP2016x041/php/registracija_aktivacija_mail.php?email='.$email.'&hash='.$hash; 
                     
$headers = 'From:noreply@strongstar.com' . "\r\n";
mail($to, $subject, $message, $headers); 
