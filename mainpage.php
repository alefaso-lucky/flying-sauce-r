<!DOCTYPE html>
<html>
    <head>
        <title>Flying Sauce&reg;</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="mainpage.css">
    </head>
    <body>
        <!--secondo blocco, tre sezioni che conducono a tre percorsi diversi del sito-->
        <div id=contenitore_2>
            <div id=sx2>
                <p id=frasesx>suggerimenti dello chef</p>
                <a class="bot" href="#">STUPISCITI</a> <!--bottone per andare alla pagina Stupisciti-->
            </div>
            <div id=cc2>
                <p id=frasecc>dall'idea alla forchetta</p>
                <a class="bot" href="#">COMPONI ORA</a> <!--bottone per andare alla pagina Componi Piatto-->
            </div>
            <div id=dx2>
                <p id=frasedx>la proposta italiana</p>
                <a class="bot" href="#">MENU</a> <!--bottone per andare alla pagina Menu-->
            </div>
        </div>
        <!--terzo blocco, pasta della settimana-->
        <div class=row>
            <div id=sx3>
                <h1>LA PASTA DELLA SETTIMANA:</h1>
                <h2>La Lasagna</h2>
                <p>
                    Pasta fresca, un impasto realizzato con cura, con uova biologiche e farina di 
                    grano tenero con carne di manzo Wagyu, delicatamente marinata con erbe aromatiche 
                    e vino rosso. Questa lasagna, ispirata alla nonna, è molto più di un semplice 
                    pasto. È un viaggio sensoriale, un tributo all’amore e alla tradizione.
                </p>
                <a class="bot" href="#">SCOPRI DI PIU'</a> <!--bottone per andare alla pagina Singolo piatto-->
            </div>
            <img src="media/home/pastaDellaSettimana.jpg" alt="la pasta della settimana è lasagna alla bolognese">
        </div>
        <!--quarto blocco, recenzioni di clienti-->
        <div class=row>
        <p class="recensioni">
            La pasta fresca era come una carezza di nonna, e il ragù di carne aveva un sapore profondo e avvolgente.</br>
            Angela F.
        </p>
        <p class="recensioni" >
            recensione 2
        </p>
        <p class="recensioni">
            RECENSIONE 3
        </p>
        </div>
        <!--quinta blocco, link ai vari social network-->
        <div id=contenitore_5>
            Seguici su
            <a class="social" href="#"><img src="media/facebook_icon.png" alt="facebook icon" width="25px" height="25px"></a> <!--bottone per andare alla pagina facebook-->
            <a class="social" href="#"><img src="media/instagram_icon.png" alt="instagram icon" width="25px" height="25px"></a> <!--bottone per andare alla pagina instagram-->
            <a class="social" href="#"><img src="media/youtube_icon.png" alt="youtube icon" width="25px" height="25px"></a> <!--bottone per andare alla pagina youtube-->
        </div>
    </body>
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
        var i;
        var x = document.getElementsByClassName("recensioni");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 4000); // cambia recensione ogni 4 secondi
        }
    </script>
</html>
