<?php

class Baza {

    const server = "localhost";
    const korisnik = "WebDiP2016x041";
    const lozinka = "admin_zpkD";
    const baza = "WebDiP2016x041";
    const znakovi = 'utf8';

    private $veza = null;
    private $greska = '';

    function spojiDB() {
        $this->veza = new mysqli(self::server, self::korisnik, self::lozinka, self::baza);
        if ($this->veza->connect_errno) {
            echo "Neuspješno spajanje na bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        $this->veza->set_charset("utf8");
        if ($this->veza->connect_errno) {
            echo "Neuspješno postavljanje znakova za bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        return $this->veza;
    }

    function zatvoriDB() {
        $this->veza->close();
    }

    function selectDB($upit) {
        $rezultat = $this->veza->query($upit);
        if ($this->veza->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        if (!$rezultat) {
            $rezultat = null;
        }
        return $rezultat;
    }

    function updateDB($upit, $skripta = '') {
        $rezultat = $this->veza->query($upit);
        if ($this->veza->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        } else {
            if ($skripta != '') {
                header("Location: $skripta");
            }
        }

        return $rezultat;
    }

    function pogreskaDB() {
        if ($this->greska != '') {
            return true;
        } else {
            return false;
        }
    }

    function dohvati_vvpomak() {
        $fupit = "SELECT Pomak FROM Virtualno_vrijeme WHERE idVirtualno_vrijeme=1;";
        $bp = new Baza();
        $bp->spojiDB();
        $rs = $bp->selectDB($fupit);
        if ($bp->pogreskaDB()) {
            echo "Problem kod upita na bazu podataka!";
            exit;
        }

        $red = $rs->fetch_array();

        $rs->close();
        $bp->zatvoriDB();
        return $red[0];
    }

    function vvrijeme() {
        $bp = new Baza();
        $bp->spojiDB();
        $vpomak = $bp->dohvati_vvpomak();
        $virtualno_vrijeme = date("Y-m-d H:i:s ", strtotime("+" . "$vpomak" . "hours"));

        return $virtualno_vrijeme;
    }

    function unos_baza_dnevnik($fupit, $korisnik) {
        $bp = new Baza();
        $bp->spojiDB();
        $trenutno_vrijeme = $bp->vvrijeme();
        if ($bp->pogreskaDB()) {
            echo "Problem kod upita na bazu podataka!";
            exit;
        }
        $fupit=mysql_escape_string($fupit);
        $upit_dnevnik = "INSERT INTO Dnevnik_rada (Vrijeme_prijave, Upiti, Korisnik_idKorisnik) VALUES ( '$trenutno_vrijeme', '$fupit', $korisnik);";
		$bp->selectDB($upit_dnevnik);
        $bp->zatvoriDB();
    }
}
?>