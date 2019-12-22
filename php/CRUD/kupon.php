<html>
    <head>
        <title>Kupon</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="kupon"/>
        <meta name="ključne riječi"  content="teretana, kupon"/>
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
            error_reporting(0);

            $veza = new Baza ();
            $veza->spojiDB();


            session_start();

            $odgovor1 = "";
            $odgovor2 = "";
            $odgovor3 = "";
            $odgovor4 = "";

            if (isset($_SESSION['tip'])) {
                if ($_SESSION['tip'] == 1) {
                    $odgovor1 = 'display:none';
                }
                if ($_SESSION['tip'] == 2) {
                    $odgovor2 = 'display:none';
                }
                if ($_SESSION['tip'] == 3) {
                    $odgovor3 = 'display:none';
                }
            } else {
                $odgovor4 = 'display:none';
            }


            $page = $_GET["page"];

            $pomak1 = $veza->selectDB("SELECT Stranicenje from Konfiguracija_sustava");
            $count1 = $pomak1->fetch_assoc();
            $pomak = $count1['Stranicenje'];

            if ($page == "" || $page == '1') {
                $page1 = 0;
            } else {
                $page1 = ($page * $pomak) - $pomak;
            }

            $result1 = $veza->selectDB("SELECT * FROM Kupon");
            $result = $veza->selectDB("SELECT * FROM Kupon LIMIT $page1, $pomak");

            if ($result->num_rows > 0) {
                echo "<table align=center id=" . "myTable" . "><tr><th onclick=" . "Sortiraj(0)" . ">ID</th><th onclick=" . "Sortiraj(1)" . ">Naziv</th><th onclick=" . "Sortiraj(2)" . ">Popust</th><th onclick=" . "Sortiraj(3)" . ">PDF</th><th onclick=" . "Sortiraj(4)" . ">Video</th><th onclick=" . "Sortiraj(5)" . ">Potrebni bodovi</th><th onclick=" . "Sortiraj(6)" . ">Vrijedi od</th><th onclick=" . "Sortiraj(7)" . ">Vrijedi do</th><th onclick=" . "Sortiraj(8)" . ">Cijena</th><th onclick=" . "Sortiraj(9)" . ">Termin</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idKupon"] . "</td><td>" . $row["Naziv"] . "</td><td>" . $row["Popust"] . "</td><td>" . $row["PDF"] . "</td><td>" . $row["Video"] . "</td><td>" . $row["Potrebni_bodovi"] . "</td><td>" . $row["Vrijedi_od"] . "</td><td>" . $row["Vrijedi_do"] . "</td><td>" . $row["Cijena"] . "</td><td>" . $row["Termin_idTermin"] . "</td></tr>";
                }
                echo "</table>";


                $count = mysqli_num_rows($result1);
                $a = ceil($count / $pomak);

                for ($b = 1; $b <= $a; $b++) {
                ?><a href="kupon.php?page=<?php echo $b; ?>" style="text-decoration:none; margin-left: 20px"><?php echo $b . " "; ?></a><?php
            }
            } 

        $veza->zatvoriDB();
        ?>
        </div>
        
        <div id="gumbici">
        <form action="frm_kupon_dodaj.php" method="post" >
            <input type="submit" name="dodaj" value="Dodaj">
        </form>
        <form action="frm_kupon_uredi.php" method="post" style="<?php echo $odgovor1 ?><?php echo $odgovor2 ?><?php echo $odgovor4 ?>">
            <input type="submit" name="uredi" value="Uredi">
        </form>
        <form action="frm_kupon_brisi.php" method="post" style="<?php echo $odgovor1 ?><?php echo $odgovor2 ?><?php echo $odgovor4 ?>">
            <input type="submit" name="brisi" value="Briši">
        </form>
        </div>
    </body>
</html>

