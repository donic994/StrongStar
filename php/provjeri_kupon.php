<?php
            include("baza.class.php");
            error_reporting(0);
            
            $veza = new Baza ();
            $veza->spojiDB();

            $kod = $_GET["kod"];
            $poruka="";
            
            $ispis='Unešeni kod je '. $kod .'<br>';

            $result = $veza->selectDB("SELECT * FROM Košarica WHERE Generiran_kod='$kod'");
            $fupit = "SELECT * FROM Košarica WHERE Generiran_kod='$kod'";

            $username = $_COOKIE['username'];
            $korisnik =$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$username'");
            
            if(mysqli_num_rows($result)>0){
                $poruka="Kod je važeći";
            }
            else{
                $poruka="Kod je nevažeći!!";
            }
            
            

            
            
        $veza->zatvoriDB();
        ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Galerija kupona</title>
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
            
            <form>
            <label>Kod kupona:</label>
            <input  id="kod" type="text" name="kod" placeholder="Kod kupona">
            <input type="submit"  value="Provjeri" onclick="Provjeri()">
            <br>
            </form>
            <?php echo $ispis ?>
            <?php echo $poruka ?>

            
        </section>
       
    </body>
</html>
