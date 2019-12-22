<html>
    <head>
        <title>Konfiguracija sustava</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="konfiguracija"/>
        <meta name="ključne riječi"  content="teretana, konfiguracija"/>
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
            <form action="konfiguracija_uredi.php" method="post">
                <label>ID koji želite urediti:</label>
                <input  id="ID" type="text" name="ID" placeholder="idKonfiguracija">
                <br>
                <label>Trajanje sesije</label>
                <input  id="trajanje" type="text" name="trajanje" placeholder="Trajanje sesije">
                <br>
                <label>Broj neuspješnih prijava</label>
                <input  id="brNE" type="text" name="brNE" placeholder="Broj neuspješnih prijava">
                <br>
                <label>Broj prijava</label>
                <input  id="brDA" type="text" name="brDA" placeholder="Broj ukupnih prijava">
                <br>
                <label>Strančenje</label>
                <input  id="stranicenje" type="text" name="stranicenje" placeholder="Straničenje">
                <br>
                <label>Pomak vremena</label>
                <input  id="pomakVremena" type="text" name="pomakVremena" placeholder="Pomak vremena">
                <br>
                <label>Korisnik</label>
                <input  id="korisnik" type="text" name="korisnik" placeholder="idKorisnik">
                <br>
                <label>Tip korisnika</label>
                <input  id="tip" type="text" name="tip" placeholder="idTip_korisnika">
                <br>
                <label>Status korisnika</label>
                <input  id="status" type="text" name="status" placeholder="idStatus">

                <input id="uredi" type="submit" name="uredi" value="Uredi">
                <br><br>
            </form>
        </section>

    </body>
</html>
