<?php
    $host="localhost";
    $db='GruppoXX';
    $user="www";
    $password="password";
    $connection_string = "host=$host dbname=$db user=$user password=$password";
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error());
    if( $db == false )
        echo "Ritornellotto";
    else
        echo "tutto ok";
//classici
    $nome = "Spaghetti alla Carbonara";
    $lista_ingredienti = "pasta artigianale, guancuale croccante, uova a km0, pecorino romano D.O.P., pepe nero macinato al momento";
    $breve_descrizione = "Un'opera d'arte culinaria dello chef, con pasta al dente avvolta in una crema di uovo, pecorino e guanciale croccante, esaltata da una pioggia di pepe nero appena macinato.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Ingredienti di Eccellenza:<br>
    - Pasta artigianale con spaghetti al dente, selezionati con cura.<br>
    - Guanciale croccanteperfezione salata, per un tocco di autenticità.<br>
    - Sei tuorli di uova medie, donando cremosità e rotondità al piatto.<br>
    - Pecorino romano, grattugiati al momento, per una nota di robustezza.<br>
    - Pepe nero macinato al momento, per la pungente eleganza che completa ogni boccone.<br><br>
    Esecuzione Raffinata:<br>
    - La pasta, lavorata con maestria, è cotta al dente per conservarne la consistenza artigianale.<br>
    - Il guanciale è preparato con precisione, aggiungendo un tocco croccante e saporito.<br>
    - I tuorli sono incorporati con cura, creando una crema avvolgente senza eguali.<br>
    - Il pecorino romano, grattugiato al momento, si fonde armoniosamente con la pasta.<br>
    - Il pepe nero, macinato al momento, è dosato con perizia per esaltare ogni sfumatura di gusto.<br><br>
    Presentazione Sofisticata:<br>
    - Gli spaghetti, decorati con guanciale croccante, sono disposti con eleganza sul piatto.<br>
    - La crema di tuorli avvolge la pasta, creando un contrasto visivo e gustativo.<br>
    - Il pecorino romano, sospeso tra i fili di spaghetti, offre un'opulenza visiva.<br>
    - Una leggera spolverata di pepe nero completa la presentazione, anticipando la complessità dei sapori.<br><br>
    Un'Esperienza Gastronomica di Classe:<br>
    I nostri Spaghetti alla Carbonara incarnano la perfezione della cucina italiana, dagli ingredienti al piatto.<br>
    Un'esperienza culinaria che unisce la tradizione alla raffinatezza, invitandovi a gustare 
    l'autentica eccellenza italiana.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "classici";
    $prezzo = 50;
    $foto = "media/piatti/carbonara.pn
    g";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);


    $nome = "Spaghetti Cacio e Pepe";
    $lista_ingredienti = "spaghetti fatti a mano, pecorino romano D.O.P., pepe nero in grani";
    $breve_descrizione = "Un'opera d'arte culinaria dello chef, con pasta al dente avvolta in una crema di uovo, pecorino e guanciale croccante, esaltata da una pioggia di pepe nero appena macinato.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - Gli spaghetti, lavorati con maestria, sono cotti al punto perfetto di consistenza artigianale.<br>
    - Il Pecorino Romano, grattugiato al momento, si fonde in una crema vellutata che avvolge ogni singolo filo di pasta.<br>
    - Il pepe nero, macinato delicatamente, è dosato con precisione per esaltare senza dominare i sapori.<br><br>    
    Presentazione Sofisticata:<br>
    - Gli spaghetti sono attentamente disposti, svelando la ricchezza del Pecorino Romano grattugiato.<br>
    - Una leggera spolverata di pepe nero in grani danza sulla superficie della pasta, anticipando il suo carattere vibrante.<br>
    - La presentazione, semplice ed elegante, celebra la bellezza della cucina romana tradizionale.<br><br>    
    Un Viaggio Sensoriale Unico:<br>
    I nostri Spaghetti Cacio e Pepe incarnano la quintessenza della tradizione romana. Un piatto dove la maestria nella pasta <br>
    fatta a mano si unisce alla ricchezza del Pecorino Romano e al pungente aroma del pepe nero. Un'esperienza gastronomica <br>
    che rende omaggio alla storia culinaria dell'Italia.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "classici";
    $prezzo = 45;
    $foto = "../media/piatti/cacioEPepe.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);


    $nome = "Spaghettoni con le Sarde";
    $lista_ingredienti = "spaghettoni di grano duro, sarde fresche, cipollotto Bio, finocchietto selvatico raccolto a mano, zafferano di pistilli, Pangrattato di grano duro, crema Pomodoro, Olio Extravergine d'Oliva, Aglio tritato, Origano, Prezzemolo, e Peperoncino secco, per una mollica croccante che completa il piatto";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Una sinfonia di sapori siciliani, con pasta impeccabilmente al 
    dente, sardine fresche, pinoli croccanti, uvetta succulenta e un 
    tocco di finocchietto selvatico, armonizzati in una sublime danza 
    gustativa.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - Gli Spaghettoni, cotti al dente, mantengono la loro consistenza artigianale.<br>
    - Le Sarde, preparate con cura, si fondono con il cipollotto, l'aglio, l'uva passa, i pinoli e le acciughe, <br>
    creando un condimento che abbraccia la tradizione siciliana.<br>
    - Il Finocchietto Selvatico, cotto con attenzione, aggiunge un tocco aromatico fresco e unico.<br>
    - La mollica croccante, preparata con passione, completa il piatto con una nota di croccantezza e sapore.<br><br>    
    Presentazione Sofisticata:<br>
    - Gli Spaghettoni sono arrotolati con grazia, avvolti dal condimento aromatico e decorati con la mollica croccante.<br>
    - Il Finocchietto Selvatico è disposto con eleganza, aggiungendo un tocco di verde alla composizione.<br>
    - Il piatto è completato da un filo di Olio Extravergine d'Oliva, sottolineando l'autenticità degli ingredienti siciliani.<br><br>    
    Un Viaggio nel Cuore della Sicilia:<br>
    Lo Spaghettoni con le Sarde è un viaggio gustativo nella tradizione siciliana, dove il mare si fonde con<br>
    la terra in un connubio di sapori autentici. Un piatto che celebra la ricchezza della cultura siciliana, <br>
    offrendo un'esperienza culinaria raffinata e indimenticabile.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "classici";
    $prezzo = 50;
    $foto = "../media/piatti/spaghettiConLeSarde.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);

    
    $nome = "Pasta alla Norma";
    $lista_ingredienti = "sedanini raffinati fatti a mano, melanzane violette di Vittoria (selezione Bio), ricotta di pecora salata Sarda, pomodoro Costoluti, Olio Extravergine d'oliva";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Una celebrazione autunnale con pennette condite con una salsa 
    di funghi selvatici, pancetta croccante, panna delicata e un 
    tocco di prezzemolo fresco, creando un connubio di gusto e 
    raffinatezza.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - I Sedani Rigati, fatti a mano con grano bio, sono cotti al dente, preservando la loro consistenza artigianale.<br>
    - Le Melanzane Violette, di Vittoria e bio, sono preparate con maestria, aggiungendo una nota di dolcezza al piatto.<br>
    - La Ricotta di pecora, salata e bio, si fonde delicatamente, creando una crema avvolgente.<br><br>
    Presentazione Sofisticata:<br>
    - Gli ingredienti bio sono disposti con eleganza sul piatto, creando un'armonia visiva.<br>
    - Il sugo, ricco di Pomodori Costoluti e aromi bio, avvolge la pasta in un abbraccio di sapori mediterranei.<br>
    - Una generosa porzione di Ricotta di pecora corona il piatto, aggiungendo un tocco finale di cremosità.<br>
    - Il Basilico fresco, bio, danza sulla superficie, anticipando la fragranza del Mediterraneo.<br><br>
    Un'Esperienza Bio e Tradizionale:<br>
    La Pasta alla Norma, con ingredienti bio di eccellenza, celebra la tradizione culinaria italiana e l'impegno<br>
    per la sostenibilità. Un viaggio gastronomico nel cuore della Sicilia, dove ogni boccone racconta la storia di<br>
    ingredienti bio coltivati con passione e rispetto per la natura.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "classici";
    $prezzo = 55;
    $foto = "../media/piatti/allaNorma.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);

//rossi
    $nome = "Tagliatelle di Seta alla Lupara";
    $lista_ingredienti = "pasta fresca, soppressata irpina, panna Bio, pomodoro, parmiggiano D.O.P., peperoncino fresco";
    $breve_descrizione = "La cremosità raggiunge l'apice grazie alla fusione di panna e due noci
    di burro, che avvolgono le tagliatelle come un abbraccio avvolgente. 
    Un tocco audace di peperoncino fresco aggiunge una nota vivace, mentre 
    il parmigiano grattugiato completa l'esperienza con la sua elegante complessità.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Presentazione Raffinata:<br>
    Le tagliatelle di seta si intrecciano con grazia su un piatto di porcellana bianca, pronte a ospitare il <br>
    maestoso connubio di sapori. La soppressata, disposta con cura, danza tra le ondulazioni della pasta, <br>
    mentre la panna e il burro abbracciano ogni nastro con una carezza di cremosità.<br><br>
    Un Viaggio nel Gusto:<br>
    Il primo morso rivela l'armonia della soppressata, seguita dalla cremosità avvolgente della panna e del burro.<br>
    La passata di pomodoro, intensa e avvolgente, si fonde con la piccantezza del peperoncino fresco, creando <br>
    un crescendo di sapori che culminano nel retrogusto ricco e persistente del parmigiano grattugiato.<br><br>
    Una Creazione Senza Paragoni:<br>
    Le Tagliatelle di Seta alla Lupara incarnano l'eccellenza culinaria, un'esperienza gastronomica pensata per <br>
    i palati più raffinati. Un capolavoro di equilibrio tra cremosità e piccantezza, destinato a rimanere impresso<br>
    nei ricordi dei buongustai più esigenti.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "rossi";
    $prezzo = 60;
    $foto = "../media/piatti/lupara.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);


    $nome = "Lasagna alla Bolognese";
    $lista_ingredienti = "sfoglia d'orata fatta a mano, ragù tradizionale bolognese, besciamella Bio";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "La sua classicità intramontabile celebra la ricchezza delle tradizioni, esaltando l'arte 
    della preparazione con ingredienti di prima qualità e una passione 
    che va al di là del tempo.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Introduzione Gastronomica:<br>
    Nel cuore della tradizione culinaria italiana, immergiti in un viaggio di sapori straordinari con la <br>
    nostra Lasagna alla Bolognese, un tributo alla classicità che risplende nel panorama gastronomico. Il nostro <br>
    chef, custode di antiche ricette e appassionato cultore della perfezione culinaria, presenta questa creazione senza tempo.<br><br>
    Strato dopo Strato di Eccellenza:<br>
    Le sfoglie di pasta fatta in casa, arrotolate con perizia artigianale, delineano strato dopo strato un'opera <br>
    d'arte di eccellenza. La bontà della tradizionale salsa bolognese, elaborata con carne di manzo selezionata e un <br>
    soffritto avvolgente, crea una melodia di sapori che danza in ogni morso.<br><br>
    Besciamella Avvolgente:<br>
    L'impalpabile besciamella, preparata con maestria, è il mantello avvolgente che avvicina ogni strato di pasta con <br>
    delicatezza. La sua cremosità è un abbraccio soffice che sottolinea la consistenza di ogni strato, contribuendo a una sinfonia <br>
    di sapori che si fondono in armonia.<br><br>
    Formaggio e Grana: il Regale Finale:<br>
    Il formaggio Parmigiano Reggiano e il Grana Padano, affermati nel panorama culinario italiano, completano la lasagna<br>
    con la loro nobiltà. I loro strati, gratinati con precisione, si fondono in una crosta dorata che svela la quintessenza <br>
    del formaggio italiano, regalando un finale che avvolge il palato in un tripudio di gusto.<br><br>
    La Magia della Cottura:<br>
    La nostra Lasagna alla Bolognese è l'epitome della perfezione culinaria, un'armonia di sapori che si intrecciano e <br>
    si rivelano in ogni boccone. La magia della cottura lenta, tramandata da generazioni, permette agli aromi di maturare e <br>
    mescolarsi, offrendo un'esperienza gastronomica senza pari.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "rossi";
    $prezzo = 55;
    $foto = "../media/piatti/lasagna.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);

//di mare   
    $nome = "Orecchiette dell'Adriatico";
    $nome = pg_escape_string($db, $nome);
    $lista_ingredienti = "Orecchiette artigianali, lavorate con la perizia di maestri pastaieri per garantire una consistenza unica,Salmone affumicato proveniente dalle acque cristalline dell'Adriatico, tagliato a mano con precisione,Formaggio fresco spalmabile di produzione locale, che conferisce una cremosità avvolgente, Zucchine appena raccolte da agricoltori locali, tagliate a julienne per una freschezza ineguagliabile, Aglio fresco, per un tocco aromatico sottile ma distintivo, Mandorle tostate per esaltare la croccantezza e aggiungere una nota di eleganza, Foglie di basilico fresco, selezionate con cura per un profumo erbaceo sottolineato, Parmigiano Reggiano DOP, grattugiato al momento per una ricchezza di sapori ineguagliabile, Olio di oliva extravergine, proveniente dalle colline italiane, per un finale di gusto impeccabile";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Un trionfo della cucina italiana, le nostre Orecchiette con Zucchine e Salmone Affumicato sono una sinfonia di sapori artigianali. Le orecchiette al dente abbracciano il sapore marino del salmone affumicato, mentre le zucchine fresche offrono una croccantezza ineguagliabile. Il formaggio fresco spalmabile crea una crema vellutata, arricchita dalla croccantezza delle mandorle tostate. Il tutto è esaltato dal Parmigiano Reggiano DOP e da un filo di olio extravergine di oliva. Un'esperienza culinaria che celebra l'italianità autentica in ogni boccone.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Orecchiette dell'Adriatico con Zucchine di Stagione e Salmone Affumicato<br>
    Un capolavoro culinario che incarna l'essenza della tradizione italiana, le nostre Orecchiette con Zucchine di stagione e <br>
    Salmone Affumicato sono un'elevazione dell'arte della pasta fatta a mano.<br><br>
    Presentazione Esclusiva:<br>
    Servito con un tocco finale di Parmigiano Reggiano grattugiato al momento, basilico fresco e un filo di olio extravergine <br>
    di oliva di alta qualità, questo piatto è un'opera d'arte culinaria che celebra l'eleganza della cucina italiana. <br>
    Indulgete nei sapori distintivi di questo piatto, un'esperienza gastronomica che unisce la maestria tradizionale con un<br>
    tocco di modernità. Benvenuti a un viaggio sensoriale senza tempo.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "";
    $prezzo = 80;
    $foto = "../media/piatti/orecchietteAllAdriatico.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);
    

    $nome = "Calamarata all'Eleganza del Mare";
    $nome = pg_escape_string($db, $nome);
    $lista_ingredienti = "Calamarata artigianale, una pasta avvolgente creata con maestria, Calamari appena pescati e preparati con precisione, garanzia di freschezza e sapore marino autentico, Pomodorini ciliegino, selezionati con cura per la loro dolcezza e succosità.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Immergetevi nell'essenza del Mediterraneo con la nostra Calamarata, una sinfonia di sapori marini e pasta artigianale. Le Calamari appena pescati, uniti con maestria alla pasta al dente, creano una danza di freschezza e consistenza. I Pomodorini Ciliegino, il triplo concentrato di pomodoro e un tocco di vino bianco aggiungono complessità, mentre aglio, peperoncino fresco e prezzemolo elevano l'aroma mediterraneo. Presentata con eleganza e arricchita dall'Olio Extravergine d'Oliva, la Calamarata all'Eleganza del Mare è un invito a gustare l'autentico sapore del mare italiano in ogni boccone.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Esecuzione Raffinata:<br>
    - La Calamarata è cotta al dente, preservando la sua consistenza avvolgente.<br>
    - I Calamari, puliti e tagliati con maestria, si fondono armoniosamente con la pasta.<br>
    - Aglio, peperoncino fresco e prezzemolo, dosati con precisione, arricchiscono il piatto di aromi mediterranei.<br>
    - Una nota di vino bianco e triplo concentrato di pomodoro aggiungono complessità e profondità.<br><br>
    Presentazione Sofisticata:<br>
    - Gli ingredienti freschi sono disposti con eleganza sulla Calamarata, creando un'opulenza visiva.<br>
    - Il piatto è impreziosito da un filo di Olio Extravergine d'Oliva, completando l'esperienza con la sua delicatezza.<br>
    <br>Un Viaggio Gustativo nel Mare Italiano:<br>
    La Calamarata all'Eleganza del Mare è una celebrazione della cucina italiana e dei suoi tesori marini. Un piatto dove<br>
    la pasta artigianale abbraccia il pesce appena pescato, creando un'esperienza culinaria che incarna la freschezza del Mediterraneo.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "mare";
    $prezzo = 75 ;
    $foto = "../media/piatti/calamarata.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);



    $nome = "Mafalde marine";
    $lista_ingredienti = "pasta fatta a mano dai nostri prestigiosi chef, cime di rapa fresche e succulente, spicchi d'aglio per un tocco aromatico, peperoncino rosso a risvegliare il palato,  mandorle pelate croccanti e aromatiche,  pecorino grattugiato per una nota di robustezza, filetti di acciughe sott'olio del pesce azzurro di prima qualità, burrata cremosa e avvolgente,  scorza di   limone grattugiata per un tocco di freschezza, Olio extravergine di oliva per la sublimazione degli aromi.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Mafalde all'uovo avvolte in un pesto di cime di rapa, abbracciate dalla cremosità della stracciatella di bufala e accarezzate dalle note intense delle acciughe di prima qualità. Un viaggio gustativo che celebra il mare in ogni morso.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Un'ode ai sapori del mare si dispiega in questa creazione gastronomica esclusiva: le Mafalde marine. Preparate con <br>
    maestria, le mafalde, pasta all'uovo di prima qualità, abbracciano un mare di delicatezze che elevano questa pietanza a <br>
    un'autentica sinfonia culinaria.<br><br>
    Preparazione Artistica:<br>
    Le mafalde, avvolte con cura, fungono da tela per il capolavoro culinario che segue. Il pesto di cime di rapa, sapientemente <br>
    amalgamato con aglio, peperoncino e mandorle, si sposa in un connubio di sapori che cattura l'essenza del Mediterraneo.<br>
    A coronare questa sinfonia marina, la stracciatella di bufala, lussuosa e cremosa, si fonde con il profumo intenso degli acciughe<br>
    di prima qualità, mentre la scorza di limone grattugiata aggiunge una nota di freschezza raffinata.<br>
    Servito con maestria su un letto di elegante porcellana, Mafalde marine è un'esperienza sensoriale che incanta il palato e <br>
    delizia gli occhi. Un inno al pesce azzurro di prima qualità, questo piatto trasforma ogni boccone in un viaggio culinario <br>
    attraverso le acque cristalline del gusto.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "mare";
    $prezzo = 80;
    $foto = "../media/piatti/mafaldeMarine.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);

    
    $nome = "Rosso Rubino e Verde Sinfonia";
    $lista_ingredienti = "spaghetti di farro filamenti d'arte culinaria, barbabietole come rubini dolci che impreziosiscono il piatto, mandorle tostate croccanti gemme d'energia, parmigiano grattugiato che è il tocco di nobiltà che svela complessità, olio extravergine di oliva liquido d'oro che lega gli elementi, foglie di basilico la sinfonia verde che danza nel pesto, Succo di limone il tocco citrico che esalta ogni sfumatura.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Questo capolavoro è un inno all'equilibrio cromatico e gustativo. Un piatto che celebra la freschezza del verde e la profondità del rosso, offrendo un'esperienza culinaria che delizia gli occhi e conquista il palato. Un'opera d'arte gastronomica destinata a brillare sul palcoscenico di un ristorante prestigioso.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Presentazione Raffinata:<br>
    Gli spaghetti di farro, arrotolati con cura, compongono un nido elegante su un piatto di porcellana. Le barbabietole, <br>
    tagliate con precisione, emergono come gemme rubino su questo dipinto culinario. Il pesto di mandorle, con il suo colorito<br>
    verde vivace, avvolge gli spaghetti con grazia, creando un contrasto visivo che invita all'assaggio.<br><br>
    Un Viaggio nel Gusto:<br>
    Il primo morso svela la consistenza rustica degli spaghetti di farro, intrisi del sapore dolce e vibrante delle barbabietole.<br>
    Il pesto di mandorle, arricchito dal basilico e dal parmigiano, esplode in una sinfonia di aromi, mentre l'olio extravergine<br>
    di oliva completa l'esperienza con la sua morbidezza avvolgente. Il succo di limone, con la sua nota fresca, aggiunge una dimensione<br>
    citrica che eleva il piatto a un'esperienza sensoriale completa.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "ricercati";
    $prezzo = 100;
    $foto = "../media/piatti/rubinoRosso.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);


    $nome = "Lingue di Seta al Pesto di Pistacchio e Balletto di Salmone";
    $lista_ingredienti = "linguine, sottili fili di perfezione artigianale,  filetto di salmone norvegese fresco, prelibatezza marina senza pelle, pistacchi, gioielli croccanti di Sicilia, pomodori secchi sott’olio, il sole concentrato in ogni boccone, spicchio d’aglio, una carezza aromatica dosata con maestria, basilico, le foglie fresche che compongono l'orchestra di sapori.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Lingue di Seta al Pesto di Pistacchio e Balletto di Salmone è una creazione culinaria che va oltre il piacere del palato, trasformando ogni morso in un'esperienza sensoriale. Un piatto che incanta gli occhi e soddisfa i sensi, predestinato a brillare nel firmamento gastronomico di un ristorante di eccellenza.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = <<<DES
    Eleganza Linguistica:<br>
    Le linguine, disposte con cura su un letto di porcellana bianca, si presentano come sottili nastri di seta pronti a intraprendere<br>
    un viaggio culinario unico. Il filetto di salmone, tagliato con precisione, danza tra i fili di pasta, mentre i pistacchi, come <br>
    gemme verdi, conferiscono un tocco di croccantezza.<br><br>
    Pesto di Pistacchio: Un'Armonia di Sapori:<br>
    Il pesto di pistacchio, realizzato con maestria, avvolge delicatamente le linguine, donando loro una veste verde vibrante. I pomodori<br>
    secchi sott’olio, con la loro intensità concentrata, aggiungono una nota complessa e avvolgente. L'aglio e il basilico completano<br>
    questa sinfonia di sapori, creando un connubio perfetto tra freschezza e profondità.<br><br>
    Balletto del Salmone:
    Il filetto di salmone norvegese, cotto alla perfezione, si presenta a dadini, invitando a un balletto di consistenze e sapori. <br>
    La delicatezza del pesce si fonde con l'intensità del pesto di pistacchio, creando un'esperienza che si distingue per la sua <br>
    raffinatezza e armonia.
    DES;
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "ricercati";
    $prezzo = 100;
    $foto = "../media/piatti/";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);

    if($result)
        echo "ok";
    else
        echo "no ok";

    pg_close($db);
?>