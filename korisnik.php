<?php

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
        <title>Korisnik</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="korisnik"/>
        <meta name="ključne riječi"  content="teretana, korisnik"/>
        <meta name="autor"  content="filip gatarić"/>
        <link rel="icon" href="slike/logo_tamni.png" type="image/gif" sizes="14x16"/>
        <link rel="stylesheet" type="text/css" href="filgatari.css"/>	


    </head>
    <body>

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
                    <a href="admin.php" style="<?php echo $odgovor1 ?><?php echo $odgovor2 ?><?php echo $odgovor4 ?>">Admin</a>
                </li>
                  <li>
                    <a href="moderator.php" style="<?php echo $odgovor1 ?><?php echo $odgovor4 ?>">Moderator</a>
                </li>
                <li>
                    <a href="korisnik.php" style="<?php echo $odgovor4 ?>">Korisnik</a>
                </li>
            </ul>	
        </nav>

        <section>
            <div style="float:left"> 
                <ul id="odabir">
                    <li>
                        <a href="pregled_programa.php">  
                            <img src="slike/program.png"/>
                            <h3>Programi</h3>
                        </a>
                    </li>
                </ul>
            </div>

            <div style="float:left"> 
                <ul id="odabir">
                    <li>
                        <a href="php/evidencija.php">  
                            <img src="slike/evidencija.png"/>
                            <h3>Evidencija</h3>
                        </a>
                    </li>
                </ul>
            </div>

            <div style="float:left"> 
                <ul id="odabir">
                    <li>
                        <a href="php/kupon.php">  
                            <img src="slike/kupon.png"/>
                            <h3>Kupon</h3>
                        </a>
                    </li>
                </ul>
            </div>
            
                <div style="float:left"> 
                <ul id="odabir">
                    <li>
                        <a href="php/bodovi.php">  
                            <img src="slike/bodovi.png"/>
                            <h3>Bodovi</h3>
                        </a>
                    </li>
                </ul>
            </div>

             <div style="float:left"> 
                <ul id="odabir">
                    <li>
                        <a href="php/kosarica.php">  
                            <img src="slike/kosarica.png"/>
                            <h3>Kosarica</h3>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <footer id="footer"> 
            <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2016/zadaca_01/filgatari/index.html" target="_blank">
                <img src="slike/HTML5.png" alt="HTML5 logo" width="40" height="40" style="margin-top:10px">
            </a>
            <img style="margin-bottom:0px;" src="slike/CSS3.png" alt="CSS3 logo" width="40" height="40">
            <p style="margin-bottom:0px; margin-top:0px">Vrijeme izrade početnog elementa:5 sati</p>
        </footer>
    </body>
</html>

