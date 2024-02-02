<?php
  session_start();

  /* logica per il logout */
  if(isset($_POST["Logout"]) && $_POST["Logout"]=="Logout"){
    $_SESSION = array();
    if(session_id() != "" || isset($_COOKIE[session_name()])) { /* anche se non usiamo cookie quello relativo al session name è settato in automatico */
      setcookie(session_name(), '', time() - 2592000, '/');
      session_destroy();
      header("refresh:0;");
      exit();
    }
  }
  /* logica per mestrare la home ad un utente autenticato o meno */
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
        <meta name="author" content="Gruppo08">
        <meta name="description" content="Hompage del sito">
        <meta name="keywords" content="pasta, droni, Italia, cucina italiana, FlyingSauce, spaghetti">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--stylesheet per mostrare le icone delle stelle di recensioni e dei social network-->
        <link rel="stylesheet" href="./home.css">
        <link rel="icon" href="./media/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="./home.js"></script>
    </head>
    <body>
      <?php include "base/navFINITA.php" ?> <!--collegamento alla navbar-->
      <!--  promo blocco, codice per lo slideshow -->
      <div class="slideshow-background">
          <div class="slider">
            <div class="slide" id="slide-1">
              <img src="./media/home/mainSlideshow1.png" alt="pasta">
              <div class="slide-text" id="text-slide-1">
                «Stelle in tavola, droni in aria»
              </div>
            </div>
            <div class="slide" id="slide-2">
              <img src="./media/home/mainSlideshow2.jpg" alt="droni">
              <div class="slide-text" id="text-slide-2">
                «Il meglio della tradizione italiana a portata di drone»
              </div>
            </div>
            <div class="slide" id="slide-3">
              <img src="./media/home/mainSlideshow3.png" alt="italianità">
              <div class="slide-text" id="text-slide-3">
                «FlyingSauce, oltre alla pasta c’è di più»
              </div>
            </div>

            <div class="fixed-content">
              <p>SCOPRI I NOSTRI PRODOTTI</p>
              <a class="bot" href="menu/ordina_ora.php">ORDINA ORA</a>
            </div>
          </div>
      </div>

        <!--secondo blocco, tre sezioni che conducono a tre percorsi diversi del sito-->
        <div id=contenitore_2>
            <div id=sx2 class=col><!--prima colonna-->
                <p id=frasesx>una grande famiglia</p>
                <a class="bot" href="chi%20siamo/chi%20siamo.php">CHI SIAMO</a> <!--bottone per andare alla pagina Chi siamo-->
            </div>
            <div id=cc2 class=col><!--seconda colonna-->
                <p id=frasecc>dall'idea alla forchetta</p>
                <a class="bot" href="menu/ordina_ora/componi_piatto.php">COMPONI ORA</a> <!--bottone per andare alla pagina Componi Piatto-->
            </div>
            <div id=dx2 class=col><!--terza colonna-->
                <p id=frasedx>la proposta italiana</p>
                <a class="bot" href="menu/ordina_ora.php">MENU</a> <!--bottone per andare alla pagina Menu-->
            </div>
        </div>
        <!--terzo blocco, varia in base all'autenticazione dell'utente-->
        <div class=row>
            <div id=sx3>
                <?php
                  if($logged) { /* se autenticato mostra la pasta della settimana */
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
                    $bottone_promozione = "SCOPRI DI PIU'";/* permette di vedere le specifiche del Singolo Piatto*/
                    $bottone_percorso = "menu/piatto.php?name=Lasagna+alla+Bolognese";
                  }
                  else {/* se non autenticato mostra un invito a fare il log-in */
                    $img_promozione = "media/home/clienti_ricevono_pasta.jpeg";
                    $alt_img_promozione = "foto di due clienti che ricevono il loro pasto da un drone";
                    $titolo_promozione = "OVUNQUE NEL MONDO";
                    $sottotitolo_promozione = "Flying Sauce";
                    $paragrafo_promozione = <<<PAR
                    Accedi ed entra a far parte della famiglia di Flying Sauce, il cibo è uno dei piaceri
                    della vita, quindi perché accontentarsi? Scegli Flying Sauce!
                    PAR;
                    $bottone_promozione = "ACCEDI AD UN MONDO TUTTO ITALIANO";/* permette di autenticarsi */
                    $bottone_percorso = "membership/account.php";
                  }
                ?>
                <h1><?php echo "$titolo_promozione"; ?></h1>
                <h2><?php echo "$sottotitolo_promozione"; ?></h2>
                <p>
                  <?php echo "$paragrafo_promozione"; ?>
                </p>
                <a class="bot" href="<?php echo $bottone_percorso; ?>"><?php echo "$bottone_promozione"; ?></a> <!--bottone per spostarsi in base all'autenticazione dell'utente-->
            </div>
            <img src="<?php echo $img_promozione; ?>" alt="<?php echo $alt_img_promozione; ?>" width="400px" height="400px">
        </div>
        <!--quarto blocco, recenzioni di clienti che si alternano-->
        <div class=row>
          <div class="recensioni">
            <i class="fa fa-star"><!-- icona della stella di recensione -->
            </i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            <blockquote><!--citazione della recensione -->
              La pasta fresca era come una carezza di nonna, e il ragù di carne aveva un sapore
              profondo e avvolgente.  La consegna è stata rapida e il servizio clienti è stato
              molto disponibile. Tornerò sicuramente a ordinare!
            </blockquote>
            <cite>Angela F. </cite><!--nome dell'utente che ha scritto la recensione-->
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
        <!--quinto blocco, link ai vari social network(realmente funzionanti e collegati a pagine dedicate al progetto)-->
        <div id=contenitore_5>
            Seguici su
            <a class="social" href="https://www.facebook.com/profile.php?id=61555762993624"><i class="fa fa-facebook-square"></i></a> <!--bottone per andare alla pagina facebook-->
            <a class="social" href="https://www.instagram.com/flying.sauce/"><i class="fa fa-instagram"></i></a> <!--bottone per andare alla pagina instagram-->
        </div>

        <?php include "base/footer.php"; ?> <!--inserimento footer-->
    </body>
</html>
