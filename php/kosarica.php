
<!DOCTYPE html>
<html>
    <head>
        <title>Košarica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="kuponi"/>
        <meta name="ključne riječi"  content="teretana, kuponi"/>
        <meta name="autor"  content="filip gatarić"/>
        <link rel="icon" href="../slike/logo_tamni.png" type="image/gif" sizes="14x16"/>
        <link rel="stylesheet" type="text/css" href="../filgatari.css"/>	
        <script type="text/javascript" src="../kosarica.js"></script>


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
                    <a href="../programi.php">Programi</a>
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
            </ul>	
        </nav>

        <section>

            <?php
            include("baza.class.php");

            $veza = new Baza ();
            $veza->spojiDB();

            $username= $_COOKIE['username'];
            $korisnik=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$username'");
            $count4= $korisnik->fetch_assoc();               
            $korisnikID = $count4['idKorisnik'];
            
            
            $fupit="SELECT k.Naziv, k.Popust, k.idKupon FROM Kupon k, Korisnik_has_Kupon khk, Korisnik ko WHERE k.idKupon = khk.Kupon_idKupon AND ko.idKorisnik = khk.Korisnik_idKorisnik AND khk.Korisnik_idKorisnik =$korisnikID GROUP BY 3";
            
            $result = $veza->selectDB("SELECT k.Naziv, k.Popust, k.idKupon FROM Kupon k, Korisnik_has_Kupon khk, Korisnik ko WHERE k.idKupon = khk.Kupon_idKupon AND ko.idKorisnik = khk.Korisnik_idKorisnik AND khk.Korisnik_idKorisnik =$korisnikID GROUP BY 3");
            
            $count4= $korisnik->fetch_assoc();               
            $korisnikID = $count4['idKorisnik'];
            
if ($result->num_rows > 0) {
    $veza->unos_baza_dnevnik($fupit, $korisnikID);
    while ($row = $result->fetch_assoc()) {
        echo "<div style=" . "float:left" . "> 
                <ul id=" . "odabir" . ">
                    <li>
                            <img src=" . "../slike/kupon.png" . " onclick=otvori('". $row["Naziv"] ."','". $row["idKupon"] ."')>
                            <h3 id="."naziv".">". $row["Naziv"] . "</h3>
                                <h4>" . $row["Popust"] . "%</h4>
                           </li>
                </ul>
            </div>";
    }
} else {
                echo "0 results";
        }

        $veza->zatvoriDB();
        ?>

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
