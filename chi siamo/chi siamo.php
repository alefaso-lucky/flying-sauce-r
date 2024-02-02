<!DOCTYPE html>
<html lang="it">
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
    <link rel="icon" href="./media/favicon.ico" type="image/x-icon">
    <script src="chi siamo/chi siamo.js"></script>
</head>
<body>
    <?php include "../base/navFINITA.php" ; ?>

    <!-- div per applicare uno sfondo colorato allo slider-->
    <div class="background-container">
        <!-- lo slider che contiene: le varie slides (di cui sarò visualizzata solo una alla volta), i pulsanti per cambiare slide, una box di testo che appare sulla slide  -->
        <div class="slider">
          <!-- questi radio buttons servono per cambiare la slide visualizzata, al loro click è eseguita la funzione JS showSlide() che mostra la slide selezionata -->
          <input type="radio" class="radio" name="images" id="radio-1" onclick="showSlide(1)">
          <input type="radio" class="radio" name="images" id="radio-2" onclick="showSlide(2)">
          <input type="radio" class="radio" name="images" id="radio-3" onclick="showSlide(3)">
          <input type="radio" class="radio" name="images" id="radio-4" onclick="showSlide(4)">

          <!-- Ogni slide dello slideshow contiene un'immagine e una box di testo.-->
          <!--  La prina slide dello slide show: -->
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
          <!-- La seconda slide dello slideshow -->
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
          <!-- La terza slide dello slideshow -->
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
          <!-- La quarta slide dello slideshow -->
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
          <!-- il seguente div conterrà delle label associate ai radio buttons per la seleziona della slide visibile,
            Le label sonmo utilizzate per applicare dello stile ai radio button. -->
          <div class="dots">
            <label for="radio-1" id="label-1"></label>
            <label for="radio-2" id="label-2"></label>
            <label for="radio-3" id="label-3"></label>
            <label for="radio-4" id="label-4"></label>
          </div>
        </div>
    </div>

    <!-- La seguente sezione si trova al centro della pagina, contiene una citazioe titolata -->
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

    <!-- titolo del gird template -->
    <h2 id="grid-title">I nostri valori</h2>
    <!-- Segue un div che sarà un display-grid, visualizza delle immagini con del testo posizionate in un layout a griglia.
     Con CSS e JS è stato implementato un meccanismo per rendere insivibile il testo a meno che non si passi col cursore sull'immagine,
     in questo caso oltre a visualizzare il testo l'immagine apparià più grigia e grande -->
    <div class="grid-img-container">
        <div class="grid-item" id="grid-item1">
          <img src="media/gridImg1.jpg" id="img1" width="100px" height="100px" alt="puzzle1"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg1">
              Il coraggio di intraprendere nuove strade
            </p>
          </div>
        </div>
        <div class="grid-item" id="grid-item2">
          <img src="media/gridImg2.jpg" id="img2" width="100px" height="100px" alt="puzzle2"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg2">
              L'impegno nel perseguire i propri sogni
          </div>
        </div>
        <div class="grid-item" id="grid-item3" width="100px" height="200px" alt="puzzle3">
          <img src="media/gridImg3.jpg" id="img3"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg3">
              La possibilità di esportare i gusti italiani in tutto il mondo
          </div>
        </div>
        <div class="grid-item" id="grid-item4">
          <img src="media/gridImg4.jpg" id="img4" width="200px" height="100px" alt="puzzle4"></img>
          <div class="overlay">
            <p class="testoImg" id="testoImg4">
              L'autenticità del nostro brand
            </p>
          </div>
        </div>
    </div>

      <?php include "../base/footer.php"; ?> <!--inserimento footer-->
</body>
</html>
