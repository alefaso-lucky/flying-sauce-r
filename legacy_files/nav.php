<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Nuova navbar</title>
</head>
<body>
    <header>
        <a href="#HOMEPAGE">
            <img src="../media/logo.png" alt="logo" width="200"/>     <!--Aggiusta dimensione del logo-->
        </a>
        
        <nav>       <!--tag per contenere una serie di link-->
            <ul class="nav_list">
                <li><a href="#" class="nav_link">Menu</a></li>
                <li><a href="#" class="nav_link">Fantasie</a></li>
                <li><a href="#" class="nav_link">My card</a></li>
                <li><a href="#" class="nav_link">Chi siamo</a></li>
                <li><a href="#" class="nav_link">Contatti</a></li>
            </ul>
        </nav>

        <div class=link>
            <a href="#" id="cambio_profilo">
                <img src="../media/profilo2.png" alt="accedi2" width="30" class="immagine2"/>
                <img src="../media/profilo1.png" alt="accedi1" width="30" class="immagine1"/>
            </a>
        
            <a href="#" id="cambio_carrello">
                <img src="../media/carrello1.png" alt="acquista1" width="30" class="immagine1"/>
                <img src="../media/carrello2.png" alt="acquista2" width="30" class="immagine2"/>
            </a>
        
            <span class="cambio_hamb">
                <img src="../media/hamburger1.png" alt="menu" id="hamburger1" width="30" height="30"/>
                <img src="../media/hamburger2.png" alt="menu" id="hamburger2" width="30" height="30"/>
            </span>
        </div>

    </header>
</body>
</html>