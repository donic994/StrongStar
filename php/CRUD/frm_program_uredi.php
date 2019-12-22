<html>
    <head>
        <title>Program</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov"  content="program"/>
        <meta name="ključne riječi"  content="teretana, program"/>
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
            <form action="program_uredi.php" method="post">
                <label>ID koji želite urediit:</label>
                <input  id="ID" type="text" name="ID" placeholder="idProgram">
                <br>
                <label>Naziv</label>
                <input  id="naziv" type="text" name="naziv" placeholder="Naziv">
                <br>
                <label>Vrsta</label>
                <input  id="vrsta" type="text" name="vrsta" placeholder="Vrsta">
                <br>
                <label>Tip</label>
                <input  id="tip" type="text" name="tip" placeholder="Tip">
                <br>
                <label>Opis</label>
                <input  id="opis" type="text" name="opis" placeholder="Opis">
                <br>
                <label>idKorisnik</label>
                <input  id="idKorisnik" type="text" name="idKorisnik" placeholder="idKorisnik">

                <input id="uredi" type="submit" name="uredi" value="Uredi">
                <br><br>
            </form>
        </section>

    </body>
</html>
