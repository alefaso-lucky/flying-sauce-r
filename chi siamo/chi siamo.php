<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chi siamo.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Chi siamo</title>
    <script src="./chi siamo.js"></script>
</head>
<body>
    <?php //require '../base/nav.php' ?>

    <!-- div per contenere uno slider per le slides -->
    <div class="background-container">
      <div class="container">

        <div class="slider">
          <input type="radio" class="radio" name="images" id="radio-1" checked>
          <input type="radio" class="radio" name="images" id="radio-2">
          <input type="radio" class="radio" name="images" id="radio-3">
          <input type="radio" class="radio" name="images" id="radio-4">

          <div class="slide" id="slide-1">
            <img src="../media/chi_siamo1.jpg" alt="">
            <div class="slide-text"><strong>Le nostre origini</strong></br>
              Benvenuti nel cuore della nostra tradizione culinaria, dove la storia della nostra pasta si intreccia con secoli di passione e maestria. La nostra avventura inizia nelle cucine delle famiglie più autentiche, dove ricette tramandate di generazione in generazione sono diventate la base della nostra filosofia gastronomica.
              La nostra pasta racconta storie di antiche tradizioni e segreti tramandati, mescolati con la freschezza di ingredienti accuratamente selezionati. Ogni forma e taglio riflettono la nostra dedizione per offrire un'esperienza culinaria autentica e memorabile.
              Attraverso il nostro percorso, abbiamo celebrato la diversità regionale e l'amore per l'eccellenza culinaria. Ogni piatto di pasta è una finestra su un viaggio attraverso le ricette di famiglia, le piazze affollate e gli aromi avvolgenti delle cucine italiane.
              Unisciti a noi in questo viaggio gastronomico, portando il calore delle tradizioni direttamente sulla tua tavola.
            </div>
          </div>
          <div class="slide" id="slide-2">
            <img src="../media/chi_siamo2.jpg" alt="">
            <div class="slide-text"><strong>Chef - le nostre Stelle Michelin</strong></br>
              Nel 2020, l'annuncio delle tre stelle Michelin per il mio piatto "Rosso Rubino e Verde Sinfonia" è stato un momento di straordinaria gioia e tensione. Questo piatto, frutto di dedizione e ispirazione nella natura, combina audacemente mandorle tostate e barbabietole lavorate con varie tecniche per creare un equilibrio unico di sapori. La presentazione è concepita come un'opera d'arte culinaria, coinvolgendo tutti i sensi con colori vibranti.
              Il prestigioso riconoscimento è un apice nella mia carriera, sottolineando l'impegno per l'eccellenza gastronomica e il contributo fondamentale del mio team. Mantenere gli standard elevati è ora una responsabilità più profonda, e affronto con serietà l'impegno di soddisfare le aspettative del pubblico.
              Confido che il mio piatto continuerà a deliziare i palati più raffinati, portando emozione e magia in ogni assaggio.
            </div>
          </div>
          <div class="slide" id="slide-3">
            <img src="../media/chi_siamo3.png" alt="">
            <div class="slide-text"><strong>Ingegneri - non solo pasta </strong></br>
              Come capo ingegnere di "Flying Sauce", ho guidato lo sviluppo di una flotta avanzata di droni per la consegna globale di pasta calda. La sfida principale era mantenere la temperatura ottimale durante il trasporto, risolta con successo attraverso un isolamento termico avanzato e un algoritmo intelligente. Abbiamo progettato hardware specifico per affrontare distanze considerevoli, ottimizzando l'efficienza delle operazioni di volo e garantendo autonomia sufficiente.
              Dal punto di vista della comunicazione, abbiamo implementato tecnologie avanzate per mantenere una comunicazione costante tra i droni e il centro di controllo. La sicurezza è stata una priorità con l'integrazione di sensori avanzati e algoritmi intelligenti. A livello software, abbiamo sviluppato algoritmi di intelligenza artificiale per ottimizzare le consegne.
            </div>
          </div>
          <div class="slide" id="slide-4">
            <img src="../media/chi_siamo4.jpg" alt="">
            <div class="slide-text"><strong>Il futuro è oggi</strong></br>
              Siamo entusiasti di estendere la nostra passione per la cucina italiana a livello globale attraverso il nostro innovativo servizio di consegna. Grazie ai nostri droni all'avanguardia, possiamo garantire che piatti italiani di altissima qualità raggiungano qualsiasi parte del mondo, rappresentando una svolta nel settore della consegna. Questo ci consente di offrire un'esperienza autentica a chiunque, ovunque si trovi.
              La tecnologia avanzata di tracciabilità consente ai clienti di seguire in tempo reale il percorso dei loro piatti, garantendo efficienza e trasparenza nel processo di consegna. La flessibilità dei supedroni ci permette di spostare i nostri chef in diverse regioni italiane, offrendo itinerari di gusto dinamici che esplorano la ricchezza culinaria del nostro paese.
              Ogni consegna non rappresenta solo un servizio, ma una missione volta a diffondere il patrimonio culinario italiano in ogni angolo del mondo, un morso alla volta.
            </div>
          </div>
        </div>

        <div class="dots">
          <label for="radio-1" id="label-1"></label>
          <label for="radio-2" id="label-2"></label>
          <label for="radio-3" id="label-3"></label>
          <label for="radio-4" id="label-4"></label>
        </div>

      </div>
    </div>

      <p class="middle-page-text">
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
          <div class="grid-item" id="grid-item1">
            <img src="../media/gridImg1.jpg" id="img1" width="px" height="50px"></img>
            <div class="overlay">
              <p class="testoImg" id="testoImg1">
                Il coraggio di intraprendere nuove strade è stato un pilastro fondamentale del nostro percorso. L'apertura a nuove idee e l'audacia di esplorare nuovi orizzonti gastronomici ci hanno permesso di distinguerci nel panorama culinario internazionale.
              </p>
            </div>
          </div>
          <div class="grid-item" id="grid-item2">
            <img src="../media/gridImg2.jpg" id="img2" width="50" height="50px"></img>
            <div class="overlay">
              <p class="testoImg" id="testoImg2">
                L'impegno nel perseguire i propri sogni è stato un motore trainante per il nostro successo. La determinazione nel perseguire l'eccellenza culinaria e nel superare le sfide ha reso il nostro percorso gratificante e ha contribuito a consolidare la reputazione di "Flying Sauce" come destinazione culinaria di primo livello.
              </p>
            </div>
          </div>
          <div class="grid-item" id="grid-item3">
            <img src="../media/gridImg3.jpg" id="img3" width="50px" height="100px"></img>
            <div class="overlay">
              <p class="testoImg" id="testoImg3">
                La possibilità di esportare i gusti italiani in tutto il mondo è un traguardo che abbiamo abbracciato con entusiasmo e responsabilità. Ci impegniamo a offrire esperienze gastronomiche autentiche, trasportando i sapori tradizionali delle nostre cucine direttamente alle tavole internazionali.
              </p>
            </div>
          </div>
          <div class="grid-item" id="grid-item4">
            <img src="../media/gridImg4.jpg" id="img4" width="100px" height="50px"></img>
            <div class="overlay">
              <p class="testoImg" id="testoImg4">
                L'autenticità del nostro brand è un altro elemento cruciale che abbiamo costantemente valorizzato. La coerenza nel rappresentare e preservare la ricchezza dei sapori italiani è fondamentale per la nostra identità aziendale. La fedeltà ai principi culinari tradizionali e l'attenzione alla qualità sono elementi che abbiamo sempre posto al centro della nostra missione.
              </p>
            </div>
          </div>
      </div>
</body>
</html>
