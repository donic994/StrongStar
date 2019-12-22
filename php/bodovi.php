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
        <title>Evidencija</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="evidencija"/>
        <meta name="ključne riječi"  content="teretana, evidencija"/>
        <meta name="autor"  content="filip gatarić"/>
        <link rel="icon" href="../slike/logo_tamni.png" type="image/gif" sizes="14x16"/>
        <link rel="stylesheet" type="text/css" href="../filgatari.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../registracija.js"></script>
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
                    <a href="programi.php">Programi</a>
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
                    <a href="../korisnik.php" style="<?php echo $odgovor4 ?>">Korisnik</a>
                </li>
            </ul>	
        </nav>


        <div>
            <?php

            $username= $_COOKIE['username'];
            $korisnik=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$username'");
            
            
            $count4= $korisnik->fetch_assoc();               
            $korisnikID = $count4['idKorisnik'];
                
            $result = $veza->selectDB("SELECT Broj_bodova FROM  Korisnik WHERE idKorisnik = $korisnikID;");
            $upit="SELECT Broj_bodova FROM  Korisnik WHERE idKorisnik = $korisnikID;";
            if ($result->num_rows > 0) {
                 $veza->unos_baza_dnevnik($upit, $korisnikID);
                echo "<table align=center><tr><th>Broj bodova</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Broj_bodova"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
        }

        $veza->zatvoriDB();
        ?>
        </div>
    </body>
</html>

