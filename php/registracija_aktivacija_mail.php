<?php
header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

             
if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = ($_GET['email']); 
    $hash =($_GET['hash']);

    $search = "SELECT Email, Aktivacijski_token, Status_idStatus FROM Korisnik WHERE Email='" . $email . "' AND Aktivacijski_token='" . $hash . "' AND Status_idStatus='2'";
    $match = $veza->selectDB($search);
    
    if (mysqli_num_rows($match) > 0) {

        $veza->updateDB("UPDATE Korisnik SET Status_idStatus='1' WHERE Email='" . $email . "' AND Aktivacijski_token='" . $hash . "' AND Status_idStatus='2'") or die(mysql_error());
        echo 'Vaš je račun aktiviran, možete se prijaviti';
    } else {

        echo 'Link je nevažeći ili ste već aktivirali svoj račun.';
    }
} else {
  echo 'Molimo Vas da otvorite link koji ste primili u mailu.';
}