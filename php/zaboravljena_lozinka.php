<?php

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$korisničko_ime = $_POST["korisničko_ime"];
$lozinka= generateRandomString();
$kriptiranaLozinka = md5($lozinka);


$Email= $veza->selectDB("SELECT Email FROM Korisnik WHERE Korisnicko_ime = '$korisničko_ime'");
$count3=$Email->fetch_assoc();
$mail=$count3['Email'];

$upit="UPDATE Korisnik SET Lozinka='$lozinka', Kriptirana_lozinka='$kriptiranaLozinka' WHERE Email='$mail'";
        

    if ($veza->updateDB($upit)===TRUE) {
        echo "Lozinka poslana na mail";
    } else {
        echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
    }

    $veza->zatvoriDB();

    $to = $mail;
    $subject = 'Nova lozinka';
    $message = '
 
Hvala što ste se prijavili na našu stranicu!

Vaša je nova lozinka je:
------------------------
Korisničko ime: ' . $korisničko_ime . '
Lozinka: ' . $lozinka . '
------------------------

';

    $headers = 'From:noreply@strongstar.com' . "\r\n";
    mail($to, $subject, $message, $headers);

?>