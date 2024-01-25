<?php
  session_start();
  if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
      $logged = $_SESSION['loggato'];
      $email_user = $_SESSION['email'];
  }
  else {
      $logged = false;
      $email_user = "";
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Flying Sauce&reg;</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="mainpage.css">
        <script type="text/javascript" src="./mainpage.js"></script>
    </head>
    <body>
      <?php require "base/navSimple.php" ?>
      <!--  Codice per lo slideshow -->
      <div class="slideshow-background">
        <div class="container">
          <div class="slider">
            <div class="slide" id="slide-1">
              <img src="./media/home/mainSlideshow1.png" alt="">
              <div class="slide-text" id="text-slide-1">
                «Stelle in tavola, droni in aria»
              </div>
            </div>
            <div class="slide" id="slide-2">
              <img src="./media/home/mainSlideshow2.jpg" alt="">
              <div class="slide-text" id="text-slide-2">
                «Il meglio della tradizione italiana a portata di drone»
              </div>
            </div>
            <div class="slide" id="slide-3">
              <img src="./media/home/mainSlideshow3.png" alt="">
              <div class="slide-text" id="text-slide-3">
                «FlyingSauce, oltre alla pasta c’è di più»
              </div>
            </div>

            <div class="fixed-content">
              <p>SCOPRI I NOSTRI PRODOTTI</p>
              <button class="bot" id="ordina-ora-btn" onclick="window.location.href='http://localhost/~apian/FlyingSauce-r-/menu/ordina.php'">ORDINA ORA</button>
            </div>
          </div>
        </div>
      </div>

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
                <?php
                  if($logged) {
                    $img_promozione = "media/home/pastaDellaSettimana.jpg";
                    $alt_img_promozione = "la pasta della settimana è lasagna alla bolognese";
                    $titolo_promozione = "LA PASTA DELLA SETTIMANA:";
                    $sottotitolo_promozione = "La Lasagna";
                    $paragrafo_promozione = <<<PAR
                    Pasta fresca, un impasto realizzato con cura, con uova biologiche e farina di
                    grano tenero con carne di manzo Wagyu, delicatamente marinata con erbe aromatiche
                    e vino rosso. Questa lasagna, ispirata alla nonna, è molto più di un semplice
                    pasto. È un viaggio sensoriale, un tributo all’amore e alla tradizione.
                    PAR;
                    $bottone_promozione = "SCOPRI DI PIU'";
                  }
                  else {
                    $img_promozione = "media/home/pastaDellaSettimana.jpg";
                    $alt_img_promozione = "foto di due clienti che ricevono il loro pasto da un drone";
                    $titolo_promozione = "OVUNQUE NEL MONDO";
                    $sottotitolo_promozione = "Flying Sauce";
                    $paragrafo_promozione = <<<PAR
                    Accedi ed entra a far parte della famiglia di Flying Sauce, il cibo è uno dei piaceri
                    della vita, quindi perché accontentarsi? Scegli Flying Sauce!
                    PAR;
                    $bottone_promozione = "ACCEDI AD UN MONDO TUTTO ITALIANO";
                  }
                ?>
                <h1><?php echo "$titolo_promozione"; ?></h1>
                <h2><?php echo "$sottotitolo_promozione"; ?></h2>
                <p>
                  <?php echo "$paragrafo_promozione"; ?>
                </p>
                <a class="bot" href="#"><?php echo "$bottone_promozione"; ?></a> <!--bottone per andare alla pagina Singolo piatto-->
            </div>                
            <img src="<?php echo $img_promozione; ?>" alt="<?php echo $alt_img_promozione; ?>">
        </div>
        <!--quarto blocco, recenzioni di clienti-->
        <div class=row>
        <p class="recensioni">
            <i class="material-icons">&#xe8d0 &#xe8d0 &#xe8d0 &#xe8d0 &#xe8d0</i></br>
            La pasta fresca era come una carezza di nonna, e il ragù di carne aveva un sapore
            profondo e avvolgente.  La consegna è stata rapida e il servizio clienti è stato 
            molto disponibile. Tornerò sicuramente a ordinare!</br>
            Angela F.
        </p>
        <p class="recensioni" >
            <i class="material-icons">&#xe8d0 &#xe8d0 &#xe8d0 &#xe8d0</i></br>
            Ho ordinato diverse volte da questo sito e ogni volta sono rimasto colpito dalla
            maestria culinaria. Consiglio vivamente a tutti gli amanti della cucina italiana 
            di provare questo servizio.</br>
            Marck C.
        </p>
        <p class="recensioni">
            <i class="material-icons">&#xe8d0 &#xe8d0 &#xe8d0 &#xe8d0 &#xe8d0</i></br>
            La qualità del cibo è fuori dal comune. Ogni piatto è preparato con passione e 
            dedizione. Ho provato diverse specialità e tutte sono state al di là delle aspettative. 
            Un'esperienza culinaria che consiglio a tutti!</br>
            Richard W.
        </p>
        </div>
        <!--quinta blocco, link ai vari social network-->
        <div id=contenitore_5>
            Seguici su
            <a class="social" href="#"><img src="media/facebook_icon.png" alt="facebook icon" width="25px" height="25px"></a> <!--bottone per andare alla pagina facebook-->
            <a class="social" href="#"><img src="media/instagram_icon.png" alt="instagram icon" width="25px" height="25px"></a> <!--bottone per andare alla pagina instagram-->
            <a class="social" href="#"><img src="media/youtube_icon.png" alt="youtube icon" width="25px" height="25px"></a> <!--bottone per andare alla pagina youtube-->
        </div>

        <?php require "base/footer.php"; ?> <!--inserimento footer-->
    </body>
    
    <!--segue il js per gestire los corrimento delle recensioni della sezione 4-->
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
