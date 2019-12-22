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
<!DOCTYPE html>
<html>
     <head>
        <title>Programi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="programi"/>
        <meta name="ključne riječi"  content="teretana, programi"/>
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

            $result = $veza->selectDB("SELECT pro.Vrsta, COUNT( * ) AS  'Broj dolazaka' FROM Program pro, Polaznost pol, Termin t WHERE pol.Termin = t.idTermin AND t.Program = pro.idProgram GROUP BY 1  LIMIT 3");
            
            $username= $_COOKIE['username'];
            $korisnik=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$username'");
            
            $count4= $korisnik->fetch_assoc();               
            $korisnikID = $count4['idKorisnik'];
            $fupit="SELECT pro.Vrsta, COUNT( * ) AS  'Broj dolazaka' FROM Program pro, Polaznost pol, Termin t WHERE pol.Termin = t.idTermin AND t.Program = pro.idProgram GROUP BY 1  LIMIT 3";
            
            $veza->unos_baza_dnevnik($fupit, $korisnikID);
            
            if ($result->num_rows > 0) {
                echo "<table align=center><tr><th>Vrsta</th><th>Broj dolazaka</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Vrsta"] . "</td><td>" . $row["Broj dolazaka"] . "</td></tr>";
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

