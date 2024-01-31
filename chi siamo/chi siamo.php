<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flying Sauce&reg; - Chi siamo</title>
    <meta name="author" content="Gruppo08">
    <meta name="description" content="Una pagina statica che descrive i valori del sito">
    <meta name="keywords" content="pasta, droni, Italia, cucina italiana, FlyingSauce, spaghetti">
    <link rel="icon" href="./media/favicon.ico" type="image/x-icon">
	  <base href="http://localhost/Flying_Sauce_r/">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="chi siamo/chi siamo.css">
    <script src="chi siamo/chi siamo.js"></script>
</head>
<body>
    <?php require "../base/navFINITA.php" ; ?>

    <!-- div per contenere uno slider per le slides -->
    <div class="background-container">
      <div class="container">
        <div class="slider">
          <input type="radio" class="radio" name="images" id="radio-1" onclick="showSlide(1)">
          <input type="radio" class="radio" name="images" id="radio-2" onclick="showSlide(2)">
          <input type="radio" class="radio" name="images" id="radio-3" onclick="showSlide(3)">
          <input type="radio" class="radio" name="images" id="radio-4" onclick="showSlide(4)">

          <div class="slide" id="slide-1">
            <img src="media/chi_siamo1.jpg" alt="chi_siamoIMG1" width="800px" height="500px">
            <div class="slide-text">
              <h1>Le nostre origini</h1>
              <p>
                Benvenuti nel cuore della nostra tradizione culinaria, dove la storia della nostra pasta si intreccia con secoli di passione e maestria.
                La nostra avventura inizia nelle cucine delle famiglie più autentiche, dove ricette tramandate di generazione in generazione sono diventate la base della nostra filosofia gastronomica.
                Attraverso il nostro percorso, abbiamo celebrato la diversità regionale e l'amore per l'eccellenza culinaria.
              </p>
            </div>
          </div>
          <div class="slide" id="slide-2">
            <img src="media/chi_siamo2.jpg" alt="chi_siamoIMG2" width="800px" height="500px">
            <div class="slide-text">
              <h1>Chef - le nostre Stelle Michelin</h1>
              <p>
                L'annuncio delle tre stelle Michelin per il mio piatto "Rosso Rubino e Verde Sinfonia" è stato un momento di straordinaria gioia e tensione. 
                Questo piatto combina audacemente mandorle tostate e barbabietole lavorate con varie tecniche per creare un equilibrio unico di sapori.
                Il prestigioso riconoscimento sottolinea l'impegno per l'eccellenza gastronomica: mantenere gli standard elevati per soddisfare le aspettative del pubblico è ora una responsabilità più profonda.
              </p>
            </div>
          </div>
          <div class="slide" id="slide-3">
            <img src="media/chi_siamo3.png" alt="chi_siamoIMG3" width="800px" height="500px">
            <div class="slide-text">
              <h1>Ingegneri - non solo pasta </h1>
              <p>
                Come capo ingegnere di "Flying Sauce", ho guidato lo sviluppo di una flotta avanzata di droni per la consegna globale di pasta calda.
                La sfida principale era mantenere la temperatura ottimale durante il trasporto, risolta attraverso un isolamento termico avanzato e un algoritmo intelligente.
                Abbiamo progettato un hardware specifico per affrontare lunghe distanze garantendo autonomia sufficiente e
                tecnologie avanzate per mantenere una comunicazione costante tra i droni e il centro di controllo.
              </p>
            </div>
          </div>
          <div class="slide" id="slide-4">
            <img src="media/chi_siamo4.jpg" alt="chi_siamoIMG4" width="800px" height="500px">
            <div class="slide-text">
              <h1>Il futuro è oggi</h1>
              <p>
                Siamo entusiasti di estendere la nostra passione per la cucina italiana a livello globale attraverso il nostro innovativo servizio di consegna. 
                La flessibilità dei supedroni ci permette di spostare i nostri chef in diverse regioni italiane, offrendo itinerari di gusto dinamici che esplorano la ricchezza culinaria del nostro Paese.
                Ogni consegna non rappresenta solo un servizio, ma una missione volta a diffondere il patrimonio culinario italiano in ogni angolo del mondo, un morso alla volta.
              </p>
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


    <section class="middle-page-text">
      <h2>Un Viaggio Culinario di Successo: La Nostra Storia</h2>
      <blockquote>
        In qualità di imprenditore e fondatore del ristorante "Flying Sauce", desidero esprimere la mia profonda gratitudine per
        il successo e i riconoscimenti significativi che la nostra azienda ha ottenuto negli ultimi anni. Sono estremamente
        orgoglioso del lavoro svolto dal mio team e della capacità della nostra iniziativa di portare i sapori autentici dell'Italia in
        tutto il mondo.
        Il nostro successo è stato guidato da valori chiave che ho sempre ritenuto essenziali nella gestione e nella promozione
        del marchio "Flying Sauce".  Sono grato per la nostra crescita continua e il successo ottenuto. "Flying Sauce" rappresenta
        non solo un ristorante di eccellenza, ma un ambasciatore culinario che incarna il coraggio, l'autenticità e l'impegno nel
        perseguire i propri sogni. Sono ansioso di vedere come il nostro viaggio culinario si svilupperà nel futuro, continuando a
        deliziare i palati in tutto il mondo.
      </blockquote>
    </section>

    <!-- Per visualizzare le immagini con il testo -->
    <!-- utilizzo JS per cambiare l'immagine in una versione più grigia -->
    <h2 id="grid-title">I nostri valori</h2>
    <div class="grid-img-container">
        <div class="grid-item" id="grid-item1">
          <img src="media/gridImg1.jpg" id="img1" width="100px" height="100px"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg1">
              Il coraggio di intraprendere nuove strade
            </p>
          </div>
        </div>
        <div class="grid-item" id="grid-item2">
          <img src="media/gridImg2.jpg" id="img2" width="100px" height="100px"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg2">
              L'impegno nel perseguire i propri sogni
          </div>
        </div>
        <div class="grid-item" id="grid-item3" width="100px" height="200px">
          <img src="media/gridImg3.jpg" id="img3"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg3">
              La possibilità di esportare i gusti italiani in tutto il mondo
          </div>
        </div>
        <div class="grid-item" id="grid-item4">
          <img src="media/gridImg4.jpg" id="img4" width="200px" height="100px"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg4">
              L'autenticità del nostro brand
            </p>
          </div>
        </div>
    </div>

      <?php require "../base/footer.php"; ?> <!--inserimento footer-->
</body>
</html>
