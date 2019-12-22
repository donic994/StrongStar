<?php
header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();



if (isset($_GET['data'])) {
    $data = $_GET['data'];


    echo '+++++++++++++++++++'.$_COOKIE[username].'++++++++++++++++++++++';
    
    $ispravno = true;
    $tip=$veza->selectDB("SELECT Tip FROM Program WHERE Naziv='$data' ");
    $vrsta=$veza->selectDB("SELECT Vrsta FROM Program WHERE Naziv='$data' ");
    $opis=$veza->selectDB("SELECT Opis FROM Program WHERE Naziv='$data' ");
    $korisnik=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$_COOKIE[username]' ");
   
    /* 
    if ($korisnik->num_rows > 0) {
                echo "<table align=center><tr><th>Vrsta</th></tr>";

                while ($row = $korisnik->fetch_assoc()) {
                    echo "<tr><td>" . $row["idKorisnik"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
        }
*/
    
    $count1= $tip->fetch_assoc();               
    $tip = $count1['Tip'];
    
    $count2= $vrsta->fetch_assoc();               
    $vrsta = $count2['Vrsta'];
    
    $count3= $opis->fetch_assoc();               
    $opis = $count3['Opis'];
    
    
    $count4= $korisnik->fetch_assoc();               
    $korisnik = $count4['idKorisnik'];
    
    
    
    $upit = "INSERT INTO Program VALUES(default,'$data', '$vrsta', '$tip', '$opis', $korisnik );";
    $upit2 = "UPDATE Korisnik SET Broj_bodova=Broj_bodova+10 WHERE idKorisnik=$korisnik";
    
    
    $rez = $veza->selectDB($upit);
    $rez2 = $veza->selectDB($upit2);
    if ((mysqli_num_rows($rez) > 0) && (mysqli_num_rows($rez2) > 0)) {
        echo "nista";
        $ispravno = false;
    }
    if (!$ispravno) {
        echo '$err_podudaranje';
        $veza->zatvoriDB();
    } else {
        $err_podudaranje = "bravo";
        $veza->unos_baza_dnevnik($upit, $korisnik);
        $veza->unos_baza_dnevnik($upit2, $korisnik);
        echo $err_podudaranje;
    }
}
    else {
        echo'greska';
    
    }