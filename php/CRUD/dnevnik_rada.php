<html>
     <head>
        <title>Dnevnik rada</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="dnevnik rada"/>
        <meta name="ključne riječi"  content="teretana, dnenvik rada"/>
        <meta name="autor"  content="filip gatarić"/>
        <link rel="icon" href="../../slike/logo_tamni.png" type="image/gif" sizes="14x16"/>
        <link rel="stylesheet" type="text/css" href="../../filgatari.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../../sortiranje.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>
        
       <header>
            <figure>
                <img src="../../slike/dugi_svijetli.png" height="128" alt="logo teretane" usemap="#mapa1">
                <map name="mapa1">
                    <area href="../../index.html" 
                          alt="pravokutnik" 
                          coords="0,0,373,128" 
                          shape="rect"/>
                </map>
            </figure> 
        </header>


        <nav id="izborniMeni">
            <ul>
                <li>
                    <a href="index.html">Početna stranica </a>
                </li>
                <li>
                    <a href="programi.html">Programi</a>
                </li>
                <li>
                    <a href="prijava.html">Prijava </a>
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
            </ul>	
        </nav>

        <div>
            <?php
            include("../baza.class.php");

            $veza = new Baza ();
            $veza->spojiDB();

            $result = $veza->selectDB("SELECT * FROM Dnevnik_rada");
            echo "<input type="."text"." id="."myInput"." onkeyup="."myFunction()"." placeholder="."Traži_upite"." title="."Trazi upit".">";
            if ($result->num_rows > 0) {
                echo "<table align=center id="."myTable"."><tr><th onclick=" . "Sortiraj(0)" . ">ID</th><th onclick=" . "Sortiraj(0)" . ">Vrijeme prijave</th><th onclick=" . "Sortiraj(0)" . ">idKorisnik</th><th onclick=" . "Sortiraj(0)" . ">Upiti</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idDnevnik_rada"] . "</td><td>" . $row["Vrijeme_prijave"] . "</td><td>" . $row["Korisnik_idKorisnik"] . "</td><td>" . $row["Upiti"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
        }

        $veza->zatvoriDB();
        ?>
        </div>
        
        <div id="gumbici">
            <form action="frm_dnevnik_rada_dodaj.php" method="post" >
            <input type="submit" name="dodaj" value="Dodaj">
        </form>
            <form action="frm_dnevnik_rada_uredi.php" method="post" >
            <input type="submit" name="uredi" value="Uredi">
        </form>
        <form action="frm_dnevnik_rada_brisi.php" method="post" >
            <input type="submit" name="brisi" value="Briši">
        </form>
        </div>
    </body>
</html>

