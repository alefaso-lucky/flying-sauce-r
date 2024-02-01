<?php
    $host="localhost";
    $db='gruppo08';
    $user="www";
    $password="tw2024";
    $connection_string = "host=$host dbname=$db user=$user password=$password";
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error());
    if( $db == false )
      echo "non va bene";
    else
      echo "tutto ok";

    /* VEGETARIANI */
    $nome = "Spaghetti alla Carbonara Vegetariana";
    $lista_ingredienti = "spaghetti, zucchine scure, tuorli d'uovo, scaglie di pecorino grattugiato, Olio extravergine di oliva, Sale e pepe nero.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Un'armonia di sapori che celebra la freschezza della natura. Un piatto che sfida
      le convenzioni con eleganza, invitando gli ospiti a sperimentare una nuova dimensione
      di gusto. Un'opera culinaria destinata a catturare l'attenzione e il palato degli
      intenditori gastronomici.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
        Eleganza Spaghetto:<br>
        Gli spaghetti, attentamente posati su un piatto di ceramica bianca, si presentano come fili d'arte pronti a<br>
        catturare il palato dei buongustai più raffinati. La loro lunghezza si avvolge con grazia, creando una sinfonia<br>
        visiva che anticipa la ricetta.<br><br>
        Zucchine in Protagonista:<br>
        Le zucchine scure, tagliate con precisione, incarnano l'essenza della carbonara vegetale. Il verde intenso si <br>
        sposa con il giallo dei tuorli, creando un tableau cromatico che esalta la freschezza del piatto. Questi ortaggi, <br>
        sapientemente preparati, aggiungono una nota croccante e leggera, trasformando la tradizionale carbonara <br>
        in un'esperienza unica.<br><br>
        Il Cuore della Carbonara Vegetariana:<br>
        I tuorli d'uovo, ricchi e cremosi, sono il cuore pulsante di questa reinterpretazione della carbonara. Si amalgamano<br>
        con il pecorino grattugiato, creando una vellutata salsa che abbraccia gli spaghetti con delicatezza. L'olio extravergine<br>
        di oliva, con il suo aroma fruttato, contribuisce a elevare la cremosità del piatto.
        DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Vegetariani";
    $prezzo = 50;
    $foto = "media/piatti/carbonaraVegetariana.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    $nome = "Pesto di Eleganza Tricolore con Caviale  ";
    $lista_ingredienti = "Pesto di Cavolo Nero, maccheroni artigianali, Olio Extravergine d'Oliva, Caviale.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "  Questo piatto unisce il verde intenso del pesto di cavolo nero all'oro
      dell'olio extravergine d'oliva, arricchito dal lusso delle perle di caviale di zucca.
      Un'ode alla tradizione tricolore italiana, dove ogni ingrediente racconta
      una storia di eleganza e prelibatezza";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - La Pasta Corta, cucinata al punto giusto, mantiene la sua consistenza artigianale.<br>
    - Il Pesto di Cavolo Nero, preparato con maestria, avvolge la pasta con il suo colore intenso e il suo sapore vibrante.<br>
    - Un filo di Olio Extravergine d'Oliva, come un abbraccio dorato, completa la base del piatto.<br>
    - Il Caviale, disposto con precisione, aggiunge una nota di lusso e raffinatezza.<br><br>
    Presentazione Sofisticata:<br>
    - La pasta è disposta con grazia, abbracciata dal verde del pesto e decorata con le perle di caviale.<br>
    - Un leggero filo d'olio ricama la superficie, anticipando la ricchezza dei sapori.<br>
    - Il caviale è posato con eleganza, creando un effetto tricolore che delizia gli occhi e il palato.<br><br>
    Un'Esperienza Tricolore di Gusto:<br>
    Il Pesto di Eleganza Tricolore con Caviale è un inno alla raffinatezza italiana, dove il verde intenso del <br>
    cavolo nero si fonde con la lucentezza dell'olio e la prelibatezza del caviale.<br>
    Un piatto che celebra il tricolore, non solo visivamente, ma anche attraverso una sinfonia di sapori in ogni<br>
    boccone.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Vegetariani";
    $prezzo = 65;
    $foto = "media/piatti/pestoConCaviale.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    $nome = "Melodia del Verde";
    $lista_ingredienti = "Broccoli, linguine all'uovo, spicchio d'aglio, mandorle a scaglie,
     Olio extravergine di oliva, Sale e pepe, Pecorino.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Le Linguine in Crema di Broccoli e Mandorle Scintillanti sono un'opera gastronomica
    imponente, pensata per soddisfare i palati più esigenti. La diversità
    di consistenze e la complessità dei sapori si fondono in un'armonia culinaria
    che eleva questa pietanza a un'esperienza senza pari";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Eleganza Vegetale:<br>
    I broccoli, collocati con precisione su un piatto di ceramica bianca, si ergono come fiori di verde lussureggiante. <br>
    Le loro teste, raccolte con attenzione, anticipano una composizione culinaria di eleganza vegetale.<br><br>
    Linguine Tessute: Un Arazzo di Pasta Fresca:<br>
    Le linguine, sapientemente intrecciate, si presentano come una cascata di fili d'arte pronti a catturare il palato.<br>
    La loro consistenza al dente, combinata con la delicatezza della crema di broccoli, promette un'esperienza unica di ogni boccone.<br><br>
    Crema di Broccoli e Mandorle: Un'Esplosione di Consistenze:<br>
    La crema di broccoli, arricchita dalle mandorle a scaglie, crea un equilibrio di consistenze sorprendente. I broccoli <br>
    offrono una consistenza morbida e vellutata, mentre le mandorle aggiungono un tocco croccante che scintilla come gemme <br>
    preziose nel piatto.<br><br>
    Un Finale di Complessità:<br>
    Il pecorino, con la sua complessità di sapori, è il tocco finale che corona la melodia del verde. La sua presenza nobilita il <br>
    piatto, aggiungendo strati di gusto che persistono delicatamente sul palato, completando questa composizione
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Vegetariani";
    $prezzo = 45;
    $foto = "media/piatti/melodiaVerde.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    $nome = "Eleganza Trionfante";
    $lista_ingredienti = "Trofie fresche, scaglie di noci, spinaci novelli, mollica di pane, parmigiano reggiano grattugiato,
    olio extravergine di oliva, latte, sale.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Le Trofie alla Crema di Noci e Balletto di Spinaci Novelli sono una
      creazione culinaria culminante, destinata a essere il gioiello di ogni tavolo.
      Un piatto che celebra la raffinatezza della dieta vegetariana";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Trofie in Vortice Elegante:<br>
    Le trofie, disposte con cura su un piatto di ceramica, sono una sinfonia di forme che anticipa l'esperienza gustativa. La <br>
    loro freschezza e consistenza al dente sono il preludio a un vortice di sapori e sensazioni.<br><br>
    Pesto di Noci e Spinaci: Un Raccogliersi di Delicatezza<br>
    Il pesto di noci, preparato con maestria, avvolge le trofie come una carezza di autunno. Gli spinaci novelli, puri e teneri, <br>
    si fondono con la mollica di pane, creando una crema vellutata che avvolge ogni boccone. Il parmigiano reggiano, con la sua <br>
    complessità, aggiunge un tocco di nobiltà, mentre l'olio extravergine di oliva completa la composizione con la sua morbidezza.<br>
    Balletto di Sapori:<br>
    Il Balletto di Spinaci Novelli è la scena culinaria principale. Le foglie verdi, come ballerine leggere, danzano tra le trofie, <br>
    creando un equilibrio di freschezza e cremosità. Il gusto pronunciato delle noci, unito alla delicatezza degli spinaci, si fonde <br>
    in un balletto di sapori che lascia un'impronta memorabile
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Vegetariani";
    $prezzo = 52;
    $foto = "media/piatti/eleganzaTrionfante.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    /* VEGANI */
    $nome = "Tagliolini d'Oro Autunnali";
    $nome = pg_escape_string($db, $nome);
    $lista_ingredienti = "Pasta artigianale, semola rimacinata di grano duro, fecola di patate, crema di zucca, scalogno, latte di soia bio, olio extravergine d'oliva, thè fresco, thimo, sale, pepe
    funghi porcini freschi, aglio, olio extravergine d'oliva, sale e pepe, briciole di pane grattugiate";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "La crema di zucca, arricchita dal profumo del thè, abbraccia i funghi porcini,
    cotti con un tocco di Marsala e aglio. Le briciole di pane, grattugiate grossolanamente
    e croccanti, sono la ciliegina sulla torta, conferendo una
    dimensione croccante e avvolgente.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - La pasta, risultato di una combinazione equilibrata di farina, fecola di patate e semola , è lavorata con maestria e <br>
    trasformata in un tripudio dorato di tagliolini.<br>
    - La crema di zucca, preparata con precisione e aromatizzata con thè fresco e thimo, avvolge ogni filo di pasta con <br>
    una delicatezza unica.<br>
    - I funghi porcini sono cotti con attenzione, unendosi al piatto con un tocco di Marsala e aglio, creando un connubio <br>
    perfetto di sapori.<br>
    - Le briciole di pane, grattugiate grossolanamente e croccanti, sono preparate con cura per aggiungere una dimensione <br>
    avvolgente al piatto.<br><br>
    Presentazione Sofisticata:<br>
    - Gli ingredienti di eccellenza sono disposti con eleganza, creando un'armonia visiva sul piatto.<br>
    - Le pepite d'oro dei tagliolini sono celebrate dalla crema di zucca che li avvolge con grazia.<br>
    - I funghi porcini, distribuiti con precisione, aggiungono un tocco di colore e profondità.<br>
    - Le briciole di pane, delicatamente posizionate, completano la presentazione con un elemento croccante e raffinato.<br><br>
    Un'Opera Culinaria da Due Stelle Michelin:<br>
    Questi Tagliolini d'Oro Autunnali sono una sinfonia di gusti e presentazioni, un'opera culinaria che fonde ingredienti<br>
    di eccellenza con un'attenzione raffinata all'esecuzione e una presentazione sofisticata. Un'esperienza gastronomica che<br>
    trasforma il pane in oro e la zucca in pura poesia culinaria risaltando la dieta vegana."
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Vegani";
    $prezzo = 40;
    $foto = "media/piatti/TaglioliniDOro.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    $nome = "Farfalle alla Carbonara di Zucchine";
    $lista_ingredienti = "Farfalle, una selezione di pasta he incarna la tradizione italiana.
    Zucchine fresch tagliate con precisione per una consistenza tenera e avvolgente.
    Panna vegana garanzia di cremosità e delicatezza.
    formaggio di setan per un tocco di sapore avvolgente.
    Olio Extravergine d'Oliva di Alta Qualità, dosato con cura per una nota di ricchezza.
    Sale e Pepe Nero macinati al momento, per un equilibrio perfetto di sapori.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Questa pietanza è un trionfo di sapore italiano. La pasta, accarezzata dalla cremosa
    crema di sapori vegani freschissimi, si unisce alle zucchine tenere e
    avvolgenti. Un'esperienza gastronomica inclusiva, dove la freschezza
    della zucchina sposa la cremosità del setan, creando una sinfonia di sapori in ogni boccone.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - Le Farfalle sono cotte al dente, mantenendo la loro texture artigianale.<br>
    - Le zucchine, tagliate con maestria, sono preparate con un tocco di olio extravergine d'oliva per accentuarne la dolcezza.<br>
    - la panna vegana, miscelata con formaggio di setan , creano una crema vellutata che avvolge la pasta con eleganza.<br><br>
    Presentazione Sofisticata:<br>
    - Le farfalle sono disposte con grazia, abbracciate dalla crema di zucchine e carbonara.<br>
    - Una leggera spolverata di pepe nero completa la presentazione, anticipando il carattere avvolgente dei sapori.<br>
    - Il piatto è arricchito da un filo di olio extravergine d'oliva, sottolineando la prelibatezza dell'italianità.<br><br>
    Un'Esperienza Inclusiva:<br>
    La Delizia Verde è un inno all'inclusività, una reinterpretazione della classica carbonara adatta anche per i vegetariani. Un <br>
    piatto che celebra l'eleganza e la ricchezza dei sapori italiani, offrendo un'esperienza culinaria raffinata e accogliente per tutti.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Vegani";
    $prezzo = 45;
    $foto = "media/piatti/farfalleVerdiEDorate.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    /* BIANCHI */
    $nome = "Eleganza del Bosco";
    $lista_ingredienti = "Pappardelle fresche, cavolfiori, gorgonzola, aglio, timo, olio, burro, scaglie di formaggio grattugiato, latte, sale e pepe";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Un'armoniosa sinfonia di sapori italiani, è un connubio sublime di pasta all'uovo,
    funghi porcini succulenti e speck sapido. La cremosa fusione con panna fresca conferisce un
    tocco di velluto, mentre il prezzemolo fresco e il pepe nero aggiungono eleganza.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Pappardelle in Sinfonia di Pasta Fresca:<br>
    Le pappardelle, arrotolate con cura su un piatto di porcellana bianca, sono una sinfonia di pasta fresca che incanta la vista. La loro<br>
    larghezza e consistenza al dente sono il preludio a un'esperienza gustativa unica.<br><br>
    Cavolfiori in Vestito d'Eleganza:<br>
    I cavolfiori, tagliati con precisione, si presentano come piccoli fiori imbiancati che adornano le pappardelle. Il loro sapore dolce<br>
    e la consistenza delicata creano un contrasto piacevole con la pasta, aggiungendo un tocco di freschezza autunnale.<br><br>
    Il Cuore Cremoso:<br>
    La crema di gorgonzola, preparata con cura, è il cuore cremoso che avvolge le pappardelle. Arricchita da aglio e timo, <br>
    offre un equilibrio di sapori intensi e aromatici. Il formaggio grattugiato completa la composizione con la sua complessità, <br>
    mentre il latte conferisce una cremosità avvolgente.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Bianchi";
    $prezzo = 55;
    $foto = "media/piatti/eleganzaDelBosco.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    $nome = "Armonia Montana";
    $lista_ingredienti = "trofie fresche, fette di speck, gherigli di noce, ricotta vaccina, rametto di rosmarino, olio extravergine di oliva, Sale e pepe nero, Semi di papavero.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Trofie con Speck, Noci e Sinfonia di Ricotta è un'ode ai sapori della natura
    che si fondono in un'armonia di consistenze e sfumature. Un piatto che
    trasporta gli ospiti in un viaggio gastronomico tra le vette, arricchendo
    il palato con la diversità dei sapori alpini.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Eleganza Trofiosa:<br>
    Le trofie, disposte con precisione su un piatto di porcellana, si presentano come piccoli tesori di pasta, pronti a intrecciarsi<br>
    con i sapori della montagna. La loro forma curva cattura la luce, anticipando un'esperienza di gusto avvolgente.<br><br>
    Speck Affumicato: Un Viaggio nei Boschi:<br>
    Lo speck, affettato sottilmente, si adagia con eleganza sul letto di trofie. La sua affumicatura intensa evoca i profumi <br>
    dei boschi alpini, mentre la sua consistenza delicata si fonde armoniosamente con la pasta.<br><br>
    Gherigli di Noce: Croccantezza Terrosa:<br>
    I gherigli di noce, tostati con cura, aggiungono una croccantezza terrosa che contrasta con la morbidezza della ricotta. Ogni morso<br>
    è arricchito da questa nota croccante, creando una sinfonia di consistenze.<br><br>
    Ricotta Vaccina: Sinfonia Cremosa:<br>
    La ricotta vaccina, cremosa e avvolgente, è la protagonista che lega gli elementi. La sua dolcezza delicata svela strati di <br>
    gusto, mentre il rosmarino aggiunge una freschezza erbacea che eleva il piatto a un'esperienza sensoriale unica.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Bianchi";
    $prezzo = 55;
    $foto = "media/piatti/armoniaMontana.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);


    $nome = "Fettuccine al Tartufo";
    $lista_ingredienti = "Fettuccine all'uovo, tartufo nero, aglio fresco, olio extravergine d'oliva di prima qualità, burro locale.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Le fettuccine all'uovo fatte a mano avvolgenti sposano l'eleganza del tartufo, arricchite
      da aglio fresco, olio extravergine d'oliva di prima qualità e burro locale.
      Un'esperienza gustativa unica che unisce la tradizione italiana all'autenticità
      dei prodotti locali, offrendo un viaggio culinario esclusivo e sostenibile.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Eleganza Sensoriale:<br>
    Il tartufo nero, con la sua fragranza inconfondibile, si amalgama con le fettuccine avvolgenti, creando un'esperienza gustativa unica.<br>
    Un tocco di aglio, olio extravergine d'oliva e burro aggiunge complessità, mentre il sale esalta ogni sfumatura di gusto.<br><br>
    L'Autenticità dei Prodotti a Km 0:<br>
    Immergetevi in un viaggio culinario dove la pasta fatta a mano incontra il tartufo pregiato e gli ingredienti locali, sottolineando<br>
    il nostro impegno per la sostenibilità e la qualità a km 0.<br><br>
    Presentazione Esclusiva:<br>
    Servite con un tocco di maestria, le Fettuccine al Tartufo sono decorate con scaglie di tartufo fresco, offrendo un'opulenza visiva che <br>
    anticipa il lusso di ogni boccone.<br><br>
    Un'Esperienza Gastronomica Indimenticabile:<br>
    Deliziate il vostro palato con un piatto che celebra la tradizione italiana, l'autenticità dei prodotti locali e l'eleganza culinaria. <br>
    Le Fettuccine al Tartufo sono un inno al gusto e alla sostenibilità, un'esperienza gastronomica che incarna il meglio della nostra cucina <br>
    raffinata.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Bianchi";
    $prezzo = 45;
    $foto = "media/piatti/fettuccineAlTartufo.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);


    $nome = "Pappardelle alla Crema di Gorgonzola";
    $lista_ingredienti = "Pappardelle all'uovo, funghi Porcini, speck affettato spesso, panna Fresca Liquida, Prezzemolo fresco.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Le pappardelle affascinate dalla crema di gorgonzola con cavolfiori in vestito
      d'eleganza offrono un'esplosione di gusto che cattura l'essenza della tradizione Lombarda e
      Piemontese. Un'autentica delizia culinaria che eleva l'esperienza
      gastronomica a nuove vette.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - Le Pappardelle, all'uovo e fatte a mano, sono cotte al punto giusto, preservando la loro texture artigianale.<br>
    - I Funghi Porcini, preparati con cura, si fondono con uno spicchio d'aglio e olio extravergine d'oliva per una base aromatica.<br>
    - Lo Speck, affettato spesso, è cotto con maestria, aggiungendo una nota di sapore affumicato.<br>
    - La Panna Fresca Liquida è dosata con precisione, creando una crema avvolgente che lega il piatto.<br><br>
    <br>Presentazione Sofisticata:<br>
    - Le pappardelle sono arrotolate con grazia, abbracciando il condimento di funghi porcini e speck.<br>
    - Il prezzemolo fresco, posato con eleganza, aggiunge un tocco di colore e fragranza al piatto.<br>
    - Una spolverata di pepe nero completa la presentazione, anticipando il carattere avvolgente dei sapori.<br><br>
    Un Viaggio Gastronomico Raffinato:<br>
    Le Pappardelle Eleganza Bosco sono un'ode all'italianità e all'eleganza culinaria. Un piatto che celebra la tradizione delle<br>
    pappardelle fatte a mano, accogliendo il sapore avvolgente dei funghi porcini e lo speck sapido. Un'esperienza gastronomica <br>
    dove ogni boccone è un viaggio nei sapori autentici dell'Italia.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "Bianchi";
    $prezzo = 55;
    $foto = "media/piatti/pappardelleAllaGorgonzola.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);
 ?>
