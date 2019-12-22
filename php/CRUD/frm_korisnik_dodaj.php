<html>
    <head>
        <title>Korisnik</title>
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
            <form action="korisnik_dodaj.php" method="post">
                <label>ID:</label>
                <input  id="ID" type="text" name="ID" placeholder="idKorisnik">
                <br>
                <label>Ime</label>
                <input  id="ime" type="text" name="ime" placeholder="Ime">
                <br>
                <label>Prezime</label>
                <input  id="prezime" type="text" name="prezime" placeholder="Prezime">
                <br>
                <label>Korisničko ime</label>
                <input  id="username" type="text" name="username" placeholder="Korisničko ime">
                <br>
                <label>Email</label>
                <input  id="email" type="text" name="email" placeholder="email">
                <br>
                <label>Lozinka</label>
                <input  id="lozinka" type="text" name="lozinka" placeholder="lozinka">
                <br>
                <label>Tip korisnika</label>
                <input  id="tipKorisnika" type="text" name="tipKorisnika" placeholder="idTip_korisnika">
                <br>
                <label>Status korisnika</label>
                <input  id="status" type="text" name="status" placeholder="idStatus">
                <br>
                <label>Broj bodova</label>
                <input  id="brBobodva" type="text" name="brBodova" placeholder="Broj bodova">

                <input id="dodaj" type="submit" name="dodaj" value="Dodaj">
                <br><br>
            </form>
        </section>

    </body>
</html>
