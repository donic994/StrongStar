<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
    $https_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $https_url");
    exit();
}



include("php/baza.class.php");

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
        <title>Prijava</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="prijava"/>
        <meta name="ključne riječi"  content="teretana, prijava"/>
        <meta name="autor"  content="filip gatarić"/>
        <link rel="icon" href="slike/logo_tamni.png" type="image/gif" sizes="14x16"/>
        <link rel="stylesheet" type="text/css" href="filgatari.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="prijava.js"></script>



    </head>
    <body onload="Provjera();">

        <header>
            <figure>
                <img src="slike/dugi_svijetli.png" height="128" alt="logo teretane" usemap="#mapa1">
                <map name="mapa1">
                    <area href="index.php" 
                          alt="pravokutnik" 
                          coords="0,0,373,128" 
                          shape="rect"/>
                </map>
            </figure> 
        </header>


        <nav id="izborniMeni">
            <ul>
                <li>
                    <a href="index.php">Početna stranica </a>
                </li>
                <li>
                    <a href="php/programi.php">Programi</a>
                </li>
                <li>
                    <a href="prijava.php">Prijava </a>
                </li>
                <li>
                    <a href="registracija.html">Registracija </a>
                </li>
                <li>
                    <a href="o_autoru.html">O autoru </a>
                </li>
                <li>
                    <a href="dokumentacija.html">Dokumentacija </a>
                </li>
                <li>
                    <a href="admin.html" style="<?php echo $odgovor1 ?><?php echo $odgovor2 ?><?php echo $odgovor4 ?>">Admin</a>
                </li>
                  <li>
                    <a href="moderator.html" style="<?php echo $odgovor1 ?><?php echo $odgovor4 ?>">Moderator</a>
                </li>
                <li>
                    <a href="korisnik.html" style="<?php echo $odgovor4 ?>">Korisnik</a>
                </li>
            </ul>	
        </nav>

        <section>
            <form action="php/cookie.php" method="post" id="Prijava" name="prijava">
                <label>Korisničko ime:</label>
                <input type="text" id="korisničko_ime" name="korisničko_ime" placeholder="Korisničko ime">
                <br>
                <label>Lozinka:</label>
                <input type="password" id="lozinka" name="lozinka" placeholder="Lozinka" maxlength="15" required="required">
                <br>
                <label>Prijava u dva koraka</label>
                <input type="checkbox" id="kvacica" name="kvacica">
                <br>
                <a href="zaboravljena_lozinka.html">Zaboravljena lozinka?</a>
                <br><br>
                <input type="submit" value="Prijava">
            </form> 
             
            <form action="registracija.html" method="get">
                <input type="submit" name="registracija" value="Registriraj se">
            </form>
            <form action="php/prijava_odjava.php" method="post">
                <input type="submit" name="odjava" value="Odjava">
            </form>
        </section>

        <footer id="footer"> 
            <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2016/zadaca_01/filgatari/prijava.html" target="_blank">
                <img src="slike/HTML5.png" alt="HTML5 logo" width="40" height="40" style="margin-top:10px">
            </a>
            <img style="margin-bottom:0px;" src="slike/CSS3.png" alt="CSS3 logo" width="40" height="40">
            <p style="margin-bottom:0px; margin-top:0px">Vrijeme izrade početnog elementa:30 minuta</p>
        </footer>
    </body>
</html>
