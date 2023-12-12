<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chi siamo.css">
    <title>Chi siamo</title>
    <script src="chi siamo.js"></script>
</head>
<body>
    <?php //require '../base/nav.php' ?>

    <!-- div per contenere uno slider per le slides -->
    <div class="slider">
      <!-- div per contenere le varie slides che scorrono -->
      <div class="slides">
        <!-- pulsanti per scorrere le slides -->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">

        <!-- le varie slides -->
        <div class="slide first">
          <img src="../media/chi_siamo1.jpg" alt="">
        </div>
        <div class="slide">
          <img src="../media/chi_siamo2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="../media/chi_siamo3.png" alt="">
        </div>
        <div class="slide">
          <img src="../media/chi_siamo4.jpg" alt="">
        </div>

      </div>
        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
        </div>
      </div>

      <p>
        In qualità di imprenditore e fondatore del ristorante "Flying Sauce", desidero esprimere la mia profonda gratitudine per<br>
        il successo e i riconoscimenti significativi che la nostra azienda ha ottenuto negli ultimi anni. Sono estremamente<br>
        orgoglioso del lavoro svolto dal mio team e della capacità della nostra iniziativa di portare i sapori autentici dell'Italia in<br>
        tutto il mondo.<br>
        Il nostro successo è stato guidato da valori chiave che ho sempre ritenuto essenziali nella gestione e nella promozione<br>
        del marchio "Flying Sauce".  Sono grato per la nostra crescita continua e il successo ottenuto. "Flying Sauce" rappresenta<br>
        non solo un ristorante di eccellenza, ma un ambasciatore culinario che incarna il coraggio, l'autenticità e l'impegno nel<br>
        perseguire i propri sogni. Sono ansioso di vedere come il nostro viaggio culinario si svilupperà nel futuro, continuando a<br>
        deliziare i palati in tutto il mondo.
      </p>
      <!-- Per visualizzare le immagini con il testo -->
      <!-- utilizzo JS per cambiare l'immagine in una versione più grigia -->
      <div class="grid-img-container">
          <div class="grid-item" id="grid-item1" onmousemove = overImg1() onmouseleave = "leaveImg1()">
            <img src="../media/notteStellata1.jpg" id="img1"></img>
            <div class="overlay">
              <div class="testoImg">
                Il coraggio di intraprendere nuove strade è stato un pilastro fondamentale del nostro percorso. L'apertura a nuove idee e l'audacia di esplorare nuovi orizzonti gastronomici ci hanno permesso di distinguerci nel panorama culinario internazionale.
              </div>
            </div>
          </div>
          <div class="grid-item" id="grid-item2" onmouseover = overImg2() onmouseleave = "leaveImg2()">
            <img src="../media/notteStellata2.jpg" id="img2"></img>
            <div class="overlay">
              <div class="testoImg">
                L'impegno nel perseguire i propri sogni è stato un motore trainante per il nostro successo. La determinazione nel perseguire l'eccellenza culinaria e nel superare le sfide ha reso il nostro percorso gratificante e ha contribuito a consolidare la reputazione di "Flying Sauce" come destinazione culinaria di primo livello.
              </div>
            </div>
          </div>
          <div class="grid-item" id="grid-item3" onmouseover = overImg3() onmouseleave = "leaveImg3()">
            <img src="../media/notteStellata3.jpg" id="img3"></img>
            <div class="overlay">
              <div class="testoImg">
                L'autenticità del nostro brand è un altro elemento cruciale che abbiamo costantemente valorizzato. La coerenza nel rappresentare e preservare la ricchezza dei sapori italiani è fondamentale per la nostra identità aziendale. La fedeltà ai principi culinari tradizionali e l'attenzione alla qualità sono elementi che abbiamo sempre posto al centro della nostra missione.
              </div>
            </div>
          </div>
          <div class="grid-item" id="grid-item4" onmouseover = overImg4() onmouseleave = "leaveImg4()">
            <img src="../media/notteStellata4.jpg" id="img4"></img>
            <div class="overlay">
              <div class="testoImg">
                La possibilità di esportare i gusti italiani in tutto il mondo è un traguardo che abbiamo abbracciato con entusiasmo e responsabilità. Ci impegniamo a offrire esperienze gastronomiche autentiche, trasportando i sapori tradizionali delle nostre cucine direttamente alle tavole internazionali.
              </div>
            </div>
          </div>
      </div>

</body>
</html>
