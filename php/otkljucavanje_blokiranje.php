<?php

include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

session_start();

$odgovor1="";
$odgovor2="";
$odgovor3="";
$odgovor4="";

if (isset($_SESSION['tip'])) {
    if ($_SESSION['tip'] == 1) {
            $odgovor1= 'display:none';
    }
    if ($_SESSION['tip'] == 2) {
            $odgovor2= 'display:none';
    }
    if ($_SESSION['tip'] == 3) {
            $odgovor3= 'display:none';
    }
}
else{
    $odgovor4='display:none';
}
?>
<html>
    <head>
        <title>Otkljucaj/Blokiraj</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="otkljucaj_blokiraj"/>
        <meta name="ključne riječi"  content="teretana, otkljucaj_blokiraj"/>
        <meta name="autor"  content="filip gatarić"/>
        <link rel="icon" href="../slike/logo_tamni.png" type="image/gif" sizes="14x16"/>
        <link rel="stylesheet" type="text/css" href="../filgatari.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../sortiranje.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>

        <header>
            <figure>
                <img src="../slike/dugi_svijetli.png" height="128" alt="logo teretane" usemap="#mapa1">
                <map name="mapa1">
                    <area href="../index.php" 
                          alt="pravokutnik" 
                          coords="0,0,373,128" 
                          shape="rect"/>
                </map>
            </figure> 
        </header>


   <nav id="izborniMeni">
            <ul>
                <li>
                    <a href="../index.php">Početna stranica </a>
                </li>
                <li>
                    <a href="php/programi.php">Programi</a>
                </li>
                <li>
                    <a href="../prijava.php">Prijava </a>
                </li>
                <li>
                    <a href="../registracija.html">Registracija </a>
                </li>
                <li>
                    <a href="../o_autoru.html">O autoru </a>
                </li>
                <li>
                    <a href="../dokumentacija.html">Dokumentacija </a>
                </li>
                <li>
                    <a href="../admin.php" style="<?php echo $odgovor1 ?><?php echo $odgovor2 ?><?php echo $odgovor4 ?>">Admin</a>
                </li>
                  <li>
                    <a href="../moderator.php" style="<?php echo $odgovor1 ?><?php echo $odgovor4 ?>">Moderator</a>
                </li>
                <li>
                    <a href="korisnik.php" style="<?php echo $odgovor4 ?>">Korisnik</a>
                </li>
            </ul>	
        </nav>
        <div>
        <?php

            error_reporting(0);
            $page = $_GET["page"];

            $pomak1 = $veza->selectDB("SELECT Stranicenje from Konfiguracija_sustava");
            $count1 = $pomak1->fetch_assoc();
            $pomak = $count1['Stranicenje'];

            if ($page == "" || $page == '1') {
                $page1 = 0;
            } else {
                $page1 = ($page * $pomak) - $pomak;
            }


            $result1 = $veza->selectDB("SELECT k.Ime, k.Prezime, k.Korisnicko_ime, t.Naziv, s.Status FROM Korisnik k, Tip_korisnika t, Status s WHERE k.Tip_korisnika = t.idTip_korisnika AND k.Status_idStatus = s.idStatus;");
            $result = $veza->selectDB("SELECT k.Ime, k.Prezime, k.Korisnicko_ime, t.Naziv, s.Status FROM Korisnik k, Tip_korisnika t, Status s WHERE k.Tip_korisnika = t.idTip_korisnika AND k.Status_idStatus = s.idStatus LIMIT $page1, $pomak;");

            if ($result->num_rows > 0) {
                echo "<table align=center id="."myTable"."><tr><th onclick="."Sortiraj(0)".">Ime</th><th onclick="."Sortiraj(1)".">Prezime</th><th onclick="."Sortiraj(2)".">Korisničko ime</th><th onclick="."Sortiraj(3)".">Tip korisnika</th><th onclick="."Sortiraj(4)".">Status</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Ime"] . "</td><td>" . $row["Prezime"] . "</td><td>" . $row["Korisnicko_ime"] . "</td><td>" . $row["Naziv"] . "</td> <td>" . $row["Status"] . "</td></tr>";
                }
                echo "</table>";
            }

            $count = mysqli_num_rows($result1);
            $a = ceil($count / $pomak);

            for ($b = 1; $b <= $a; $b++) {
                ?><a href="otkljucavanje_blokiranje.php?page=<?php echo $b; ?>" style="text-decoration:none; margin-left: 20px"><?php echo $b . " "; ?></a><?php
            }
            $veza->zatvoriDB();
            ?>
        </div>

        <div id="gumbici">
            <form action="frm_otkljucaj.php" method="post" >
                <input type="submit" name="dodaj" value="Otključaj">
            </form>
            <form action="frm_blokiraj.php" method="post" >
                <input type="submit" name="brisi" value="Blokiraj">
            </form>
        </div>
    </body>
</html>
