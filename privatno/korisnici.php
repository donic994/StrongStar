<!DOCTYPE html>
<html>    
    <head>
        <title>Ispis korisnika privatno</title>
        <meta charset="utf-8">
        <meta name="author" content="Filip Gatarić">
    </head>

    <body>
        <?php
        require(dirname(__DIR__) . '/php/baza.class.php');
        $veza = new Baza ();
        $veza->spojiDB();

        $result = $veza->selectDB("SELECT Ime, Prezime, Korisnicko_ime, Email, Kriptirana_lozinka FROM Korisnik");

        if ($result->num_rows > 0) {
            echo "<table align=center><tr><th>Ime</th><th>Prezime</th><th>Korisničko ime</th><th>Email</th><th>Lozinka</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Ime"] . "</td><td>" . $row["Prezime"] . "</td><td>" . $row["Korisnicko_ime"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Kriptirana_lozinka"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $veza->zatvoriDB();
        ?>
    </body>
</html>