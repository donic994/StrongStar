<?php

header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$korisničko_ime = $_POST["korisničko_ime"];
$lozinka = $_POST["lozinka"];
$hash = md5( rand(0,1000) );

echo '+++++++++++'.$korisničko_ime.'+++++++++++**';

$count = mysqli_num_rows($veza->selectDB("SELECT * FROM  Korisnik WHERE Korisnicko_ime = '$korisničko_ime' and Lozinka = '$lozinka'"));
$IDstatus = $veza->selectDB("SELECT Status_idStatus FROM  Korisnik WHERE Korisnicko_ime = '$korisničko_ime'");
$BRprijava = $veza->selectDB("SELECT Broj_prijave FROM  Korisnik WHERE Korisnicko_ime = '$korisničko_ime'");
$Email= $veza->selectDB("SELECT Email FROM Korisnik WHERE Korisnicko_ime = '$korisničko_ime' and Lozinka = '$lozinka'");

$count1= $IDstatus->fetch_assoc();               
$status = $count1['Status_idStatus'];

$count2 = $BRprijava->fetch_assoc();
$prijava = $count2['Broj_prijave'];

$count3=$Email->fetch_assoc();
$mail=$count3['Email'];

$kor=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$korisničko_ime' ");
$count4 = $kor->fetch_assoc();               
$korisnik = $count4['idKorisnik'];

    $upit = "UPDATE Korisnik SET Prijava_token='$hash' WHERE Korisnicko_ime = '$korisničko_ime' and Lozinka = '$lozinka';";

echo '+++++++++'.$mail.'+++++++++++'.$lozinka.'+++++++++++'.$upit.'++++++++++';

    if ($veza->updateDB($upit) === TRUE) {
        $veza->unos_baza_dnevnik($upit, $korisnik);
        echo "Uspješno spremljeni podaci";
    } else {
        echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
    }

    $veza->zatvoriDB();

    $to = $mail;
    $subject = 'Prijava | Aktivacija';
    $message = '
 
Hvala što ste se prijavili na našu stranicu!
Vaš je račun kreiran, možete se prijaviti sa dolje navedenim korisničkim imenom i lozinkom nakon što aktivirate račun pritiskom na link
------------------------
Korisničko ime: ' . $korisničko_ime . '
Lozinka: ' . $lozinka . '
------------------------
 
Molimo Vas da aktivirate račun pritiskom na ovaj link:
https://barka.foi.hr/WebDiP/2016_projekti/WebDiP2016x041/php/prijava_potvrda_prijave.php?email='.$mail.'&hash='.$hash;

    $headers = 'From:noreply@strongstar.com' . "\r\n";
    mail($to, $subject, $message, $headers);

   
if ($count > 0 && $status == 1 && $prijava < 3) {
    setcookie('username', $_POST['korisničko_ime'], time() + 60 * 60 * 24 * 30, "/");
    $veza->updateDB("UPDATE Korisnik SET Broj_prijave=0 WHERE Korisnicko_ime = '$korisničko_ime' and Lozinka = '$lozinka'");
    //header('Location: ../index.html');
} else {
    echo 'Username/Password Invalid';
    $veza->updateDB("UPDATE Korisnik SET Broj_prijave=Broj_prijave+1 WHERE Korisnicko_ime = '$korisničko_ime'");
    //header('Location: ../prijava.html');
}

?>