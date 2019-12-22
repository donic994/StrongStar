<html>
    <head>
        <title>Statistika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="statistika"/>
        <meta name="ključne riječi"  content="teretana, statistika"/>
        <meta name="autor"  content="filip gatarić"/>
        <link rel="icon" href="../../slike/logo_tamni.png" type="image/gif" sizes="14x16"/>
        <link rel="stylesheet" type="text/css" href="../../filgatari.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="../../registracija.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>

        <header>
            <figure>
                <img src="../../slike/dugi_svijetli.png" height="128" alt="logo teretane" usemap="#mapa1">
                <map name="mapa1">
                    <area href="../../index.php" 
                          alt="pravokutnik" 
                          coords="0,0,373,128" 
                          shape="rect"/>
                </map>
            </figure> 
        </header>


       <nav id="izborniMeni">
            <ul>
                <li>
                    <a href="../../index.php">Početna stranica </a>
                </li>
                <li>
                    <a href="../programi.php">Programi</a>
                </li>
                <li>
                    <a href="../../prijava.php">Prijava </a>
                </li>
                <li>
                    <a href="../../registracija.html">Registracija </a>
                </li>
                <li>
                    <a href="../../o_autoru.html">O autoru </a>
                </li>
                <li>
                    <a href="../../dokumentacija.html">Dokumentacija </a>
                </li>
            </ul>	
        </nav>

        <div>
            <?php
            include("../baza.class.php");

            $veza = new Baza ();
            $veza->spojiDB();

            $result = $veza->selectDB("SELECT * FROM Statistika");

            if ($result->num_rows > 0) {
                echo "<table align=center><tr><th>ID</th><th>Bodovi</th><th>Datum</th><th>idTermin</th><th>idKorisnik</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idStatistika"] . "</td><td>" . $row["Bodovi"] . "</td><td>" . $row["Datum"] . "</td><td>" . $row["idTermin"] . "</td><td>" . $row["Korisnik_idKorisnik"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
        }

        $veza->zatvoriDB();
        ?>
        </div>
        
        <div id="gumbici">
        <form action="frm_statistika_dodaj.php" method="post" >
            <input type="submit" name="dodaj" value="Dodaj">
        </form>
        <form action="frm_statistika_uredi.php" method="post" >
            <input type="submit" name="uredi" value="Uredi">
        </form>
        <form action="frm_statistika_brisi.php" method="post" >
            <input type="submit" name="brisi" value="Briši">
        </form>
        </div>
    </body>
</html>

