<html>
    <head>
        <title>Pristup</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="pristup"/>
        <meta name="ključne riječi"  content="teretana, pristup"/>
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
            <form action="pristup_uredi.php" method="post">
                <label>ID koji želite urediti:</label>
                <input  id="ID" type="text" name="ID" placeholder="idPristup">
                <br>
                <label>Dozvoljen</label>
                <input  id="dozvoljen" type="text" name="dozvoljen" placeholder="Dozvoljen(0/1)">
                <br>
                <label>Zabranjen</label>
                <input  id="zabranjen" type="text" name="zabranjen" placeholder="Zabranjen(0/1)">
                <br>
                <label>Korisnik</label>
                <input  id="idKorisnik" type="text" name="idKorisnik" placeholder="idKorisnik">
                <br>
                <label>Termin</label>
                <input  id="idTermin" type="text" name="idTermin" placeholder="idTermin">

                <input id="uredi" type="submit" name="uredi" value="Uredi">
                <br><br>
            </form>
        </section>

    </body>
</html>
