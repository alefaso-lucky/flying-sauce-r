<?php
  session_start();

  /* logica per il logout */
  if(isset($_POST["Logout"]) && $_POST["Logout"]=="Logout"){
    session_destroy();
    header("refresh:0;");
    exit();
  }

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./home.css">
        <script type="text/javascript" src="./home.js"></script>
    </head>
    <body>
      <?php require "base/navFINITA.php" ?>
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
              <button class="bot" id="ordina-ora-btn" onclick="window.location.href='./menu/ordina_ora.php'">ORDINA ORA</button>
            </div>
          </div>
        </div>
      </div>

        <!--secondo blocco, tre sezioni che conducono a tre percorsi diversi del sito-->
        <div id=contenitore_2>
            <div id=sx2 class=col>
                <p id=frasesx>una grande famiglia</p>
                <a class="bot" href="chi%20siamo/chi%20siamo.php">CHI SIAMO</a> <!--bottone per andare alla pagina Chi siamo-->
            </div>
            <div id=cc2 class=col>
                <p id=frasecc>dall'idea alla forchetta</p>
                <a class="bot" href="menu/ordina_ora/componi_piatto.php">COMPONI ORA</a> <!--bottone per andare alla pagina Componi Piatto-->
            </div>
            <div id=dx2 class=col>
                <p id=frasedx>la proposta italiana</p>
                <a class="bot" href="menu/ordina_ora.php">MENU</a> <!--bottone per andare alla pagina Menu-->
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
                    $bottone_percorso = "menu/piatto.php?name=Lasagna+alla+Bolognese";
                  }
                  else {
                    $img_promozione = "media/home/clienti_ricevono_pasta.jpeg";
                    $alt_img_promozione = "foto di due clienti che ricevono il loro pasto da un drone";
                    $titolo_promozione = "OVUNQUE NEL MONDO";
                    $sottotitolo_promozione = "Flying Sauce";
                    $paragrafo_promozione = <<<PAR
                    Accedi ed entra a far parte della famiglia di Flying Sauce, il cibo è uno dei piaceri
                    della vita, quindi perché accontentarsi? Scegli Flying Sauce!
                    PAR;
                    $bottone_promozione = "ACCEDI AD UN MONDO TUTTO ITALIANO";
                    $bottone_percorso = "membership/account.php";
                  }
                ?>
                <h1><?php echo "$titolo_promozione"; ?></h1>
                <h2><?php echo "$sottotitolo_promozione"; ?></h2>
                <p>
                  <?php echo "$paragrafo_promozione"; ?>
                </p>
                <a class="bot" href="<?php echo $bottone_percorso; ?>"><?php echo "$bottone_promozione"; ?></a> <!--bottone per andare alla pagina Singolo piatto-->
            </div>
            <img src="<?php echo $img_promozione; ?>" alt="<?php echo $alt_img_promozione; ?>" width="400px" height="400px">
        </div>
        <!--quarto blocco, recenzioni di clienti-->
        <div class=row>
          <div class="recensioni">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            <blockquote>
              La pasta fresca era come una carezza di nonna, e il ragù di carne aveva un sapore
              profondo e avvolgente.  La consegna è stata rapida e il servizio clienti è stato
              molto disponibile. Tornerò sicuramente a ordinare!
            </blockquote>
            <cite>Angela F. </cite>
          </div>
          <div class="recensioni" >
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            <blockquote>
              Ho ordinato diverse volte da questo sito e ogni volta sono rimasto colpito dalla
              maestria culinaria. Consiglio vivamente a tutti gli amanti della cucina italiana
              di provare questo servizio.
            </blockquote>
            <cite>Marck C. </cite>
          </div>
          <div class="recensioni">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            <blockquote>
              La qualità del cibo è fuori dal comune. Ogni piatto è preparato con passione e
              dedizione. Ho provato diverse specialità e tutte sono state al di là delle aspettative.
              Un'esperienza culinaria che consiglio a tutti!
            </blockquote>
            <cite>Richard W. </cite>
          </div>
        </div>
        <!--quinto blocco, link ai vari social network-->
        <div id=contenitore_5>
            Seguici su
            <a class="social" href="https://www.facebook.com/profile.php?id=61555762993624"><i class="fa fa-facebook-square"></i></a> <!--bottone per andare alla pagina facebook-->
            <a class="social" href="https://www.instagram.com/flying.sauce/"><i class="fa fa-instagram"></i></a> <!--bottone per andare alla pagina instagram-->
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
