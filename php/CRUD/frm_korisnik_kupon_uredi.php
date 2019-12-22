<html>
    <head>
        <title>Korisnik i kupon</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="korisnik"/>
        <meta name="ključne riječi"  content="teretana, korisnik"/>
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

        <section>
            <form action="korisnik_kupon_uredi.php" method="post">
                <label>Stari ID Korisnik:</label>
                <input  id="SkoID" type="text" name="SkoID" placeholder="idKorisnik">
                <br>
                <label>Stari ID Kupon:</label>
                <input  id="SkuID" type="text" name="SkuID" placeholder="idKupon">
                <br>
                <label>ID Korisnik:</label>
                <input  id="koID" type="text" name="koID" placeholder="novi idKorisnik">
                <br>
                <label>ID Kupon:</label>
                <input  id="kuID" type="text" name="kuID" placeholder="novi idKupon">
                <input id="dodaj" type="submit" name="dodaj" value="Dodaj">
                <br><br>
            </form>
        </section>

    </body>
</html>
