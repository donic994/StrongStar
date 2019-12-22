<html>
    <head>
        <title>Termin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="termin"/>
        <meta name="ključne riječi"  content="teretana, termin"/>
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
            <form action="termin_uredi.php" method="post">
                <label>ID koji želite urediti:</label>
                <input  id="ID" type="text" name="ID" placeholder="idTermin">
                <br>
                <label>Naziv</label>
                <input  id="naziv" type="text" name="naziv" placeholder="naziv">
                <br>
                <label>Vrijeme početka</label>
                <input  id="vrp" type="text" name="vrp" placeholder="Vrijeme početka">
                <br>
                <label>Vrijeme završetka</label>
                <input  id="vrz" type="text" name="vrz" placeholder="Vrijeme završetka">
                <br>
                <label>Lokacija</label>
                <input  id="lokacija" type="text" name="lokacija" placeholder="Loakcija">
                <br>
                <label>Dvorana</label>
                <input  id="dvorana" type="text" name="dvorana" placeholder="Dvorana">
                <br>
                <label>Broj polaznika</label>
                <input  id="brPolaznika" type="text" name="brPolaznika" placeholder="Broj polaznika">
                <br>
                <label>Program</label>
                <input  id="program" type="text" name="program" placeholder="Program">
                <br>
                <label>Status</label>
                <input  id="status" type="text" name="status" placeholder="Status">

                <input id="uredi" type="submit" name="uredi" value="Uredi">
                <br><br>
            </form>
        </section>

    </body>
</html>
