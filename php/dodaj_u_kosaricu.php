<?php

header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();



if (isset($_GET['data'])) {
    $data = $_GET['data'];

    $hash = md5(rand(0, 1000));

    echo '+++++++++++++++++++' . $data . '++++++++++++++++++++++';

    $ispravno = true;
    $popust = $veza->selectDB("SELECT Popust FROM Kupon WHERE idKupon='$data' ");
    $brBodova = $veza->selectDB("SELECT Potrebni_bodovi FROM Kupon WHERE idKupon='$data' ");
    $korisnik = $veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$_COOKIE[username]' ");


    $count1 = $popust->fetch_assoc();
    $popust = $count1['Popust'];

    $count2 = $brBodova->fetch_assoc();
    $brBodova = $count2['Potrebni_bodovi'];

    $count4 = $korisnik->fetch_assoc();
    $korisnik = $count4['idKorisnik'];

    $vvrijeme = $veza->vvrijeme();

    echo '++++++' . $korisnik . '+++++++++++' . $data . '++++++++++';

    $upit = "INSERT INTO Korisnik_has_Kupon VALUES(default,$korisnik, $data );";
    echo $upit;
    $veza->selectDB($upit);

    $sel = $veza->selectDB("SELECT idKorisnik_has_Kupon FROM Korisnik_has_Kupon WHERE Korisnik_idKorisnik=$korisnik AND Kupon_idKupon=$data LIMIT 1");
    $count3 = $sel->fetch_assoc();
    $idKor_kod = $count3['idKorisnik_has_Kupon'];

    $upit3 = "INSERT INTO Statistika VALUES(default, ,'$vvrijeme', 1, $korisnik )";

    $idStat = $veza->selectDB("SELECT idStatistika FROM Statistika ORDER BY 1 DESC LIMIT 1 ");
    $count5 = $idStat->fetch_assoc();
    $idStat = $count5['idStatistika'];
    $idStat = (int) ($idStat);


    $upit1 = "INSERT INTO Košarica VALUES(default,$data, $idStat, '$vvrijeme', 1, 0, '$hash', $idKor_kod);";
    $upit2 = "UPDATE Korisnik SET Broj_bodova=Broj_bodova-$brBodova WHERE idKorisnik=$korisnik";


    $rez = $veza->selectDB($upit);
    $rez1 = $veza->selectDB($upit1);
    $rez2 = $veza->selectDB($upit2);
    $rez3 = $veza->selectDB($upit3);

    if ((mysqli_num_rows($rez) > 0)) {
        echo "nista";
        $ispravno = false;
    }
    if (!$ispravno) {
        echo '$err_podudaranje';
        $veza->zatvoriDB();
    } else {
        $err_podudaranje = "bravo";
        if ($veza->selectDB($upit) === TRUE && $veza->selectDB($upit1) === TRUE && $veza->selectDB($upit2) === TRUE && $veza->selectDB($upit2) === TRUE) {
            echo 'Usšješno spremljeni podaci';
            $veza->unos_baza_dnevnik($upit, $korisnik);
            $veza->unos_baza_dnevnik($upit1, $korisnik);
            $veza->unos_baza_dnevnik($upit2, $korisnik);
            $veza->unos_baza_dnevnik($upit3, $korisnik);
        } else echo 'nisu spremljeni podaci';
        echo $err_podudaranje;
    }
} else {
    echo'greska';
}
