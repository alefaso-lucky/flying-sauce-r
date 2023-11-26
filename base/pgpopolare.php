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

    $nome = "Spaghetti alla Carbonara";
    $lista_ingredienti = "pasta artigianale, guancuale croccante, uova a km0, pecorino romano D.O.P., pepe nero macinato al momento";
    $breve_descrizione = "Un'opera d'arte culinaria dello chef, con pasta al dente avvolta in una crema di uovo, pecorino e guanciale croccante, esaltata da una pioggia di pepe nero appena macinato.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = "*Ingredienti di Eccellenza:*
    - Pasta artigianale con spaghetti al dente, selezionati con cura.
    - Guanciale croccanteperfezione salata, per un tocco di autenticità.
    - Sei tuorli di uova medie, donando cremosità e rotondità al piatto.
    - Pecorino romano, grattugiati al momento, per una nota di robustezza.
    - Pepe nero macinato al momento, per la pungente eleganza che completa ogni boccone.
    
    *Esecuzione Raffinata:*
    - La pasta, lavorata con maestria, è cotta al dente per conservarne la consistenza artigianale.
    - Il guanciale è preparato con precisione, aggiungendo un tocco croccante e saporito.
    - I tuorli sono incorporati con cura, creando una crema avvolgente senza eguali.
    - Il pecorino romano, grattugiato al momento, si fonde armoniosamente con la pasta.
    - Il pepe nero, macinato al momento, è dosato con perizia per esaltare ogni sfumatura di gusto.
    
    *Presentazione Sofisticata:*
    - Gli spaghetti, decorati con guanciale croccante, sono disposti con eleganza sul piatto.
    - La crema di tuorli avvolge la pasta, creando un contrasto visivo e gustativo.
    - Il pecorino romano, sospeso tra i fili di spaghetti, offre un'opulenza visiva.
    - Una leggera spolverata di pepe nero completa la presentazione, anticipando la complessità dei sapori.
    
    *Un'Esperienza Gastronomica di Classe:*
    I nostri Spaghetti alla Carbonara incarnano la perfezione della cucina italiana, dall'ingredienti al piatto. Un'esperienza culinaria che unisce la tradizione alla raffinatezza, invitandovi a gustare l'autentica eccellenza italiana.";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "classici";
    $prezzo = 50;
    $foto = "../media/piatti/carbonara.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);


    $nome = "Spaghetti Cacio e Pepe";
    $lista_ingredienti = "spaghetti fatti a mano, pecorino romano D.O.P., pepe nero in grani";
    $breve_descrizione = "Un'opera d'arte culinaria dello chef, con pasta al dente avvolta in una crema di uovo, pecorino e guanciale croccante, esaltata da una pioggia di pepe nero appena macinato.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = "**Esecuzione Raffinata:**
    - Gli spaghetti, lavorati con maestria, sono cotti al punto perfetto di consistenza artigianale.
    - Il Pecorino Romano, grattugiato al momento, si fonde in una crema vellutata che avvolge ogni singolo filo di pasta.
    - Il pepe nero, macinato delicatamente, è dosato con precisione per esaltare senza dominare i sapori.
    
    **Presentazione Sofisticata:**
    - Gli spaghetti sono attentamente disposti, svelando la ricchezza del Pecorino Romano grattugiato.
    - Una leggera spolverata di pepe nero in grani danza sulla superficie della pasta, anticipando il suo carattere vibrante.
    - La presentazione, semplice ed elegante, celebra la bellezza della cucina romana tradizionale.
    
    **Un Viaggio Sensoriale Unico:**
    I nostri Spaghetti Cacio e Pepe incarnano la quintessenza della tradizione romana. Un piatto dove la maestria nella pasta fatta a mano si unisce alla ricchezza del Pecorino Romano e al pungente aroma del pepe nero. Un'esperienza gastronomica che rende omaggio alla storia culinaria dell'Italia.
    ";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "classici";
    $prezzo = 45;
    $foto = "../media/piatti/cacioEPepe.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);


    $nome = "Tagliatelle di Seta alla Lupara";
    $lista_ingredienti = "pasta fresca, soppressata irpina, panna Bio, pomodoro, parmiggiano D.O.P., peperoncino fresco";
    $breve_descrizione = "La cremosità raggiunge l'apice grazie alla fusione di panna e due noci
    di burro, che avvolgono le tagliatelle come un abbraccio avvolgente. 
    Un tocco audace di peperoncino fresco aggiunge una nota vivace, mentre 
    il parmigiano grattugiato completa l'esperienza con la sua elegante complessità.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = "**Presentazione Raffinata:**
    Le tagliatelle di seta si intrecciano con grazia su un piatto di porcellana bianca, pronte a ospitare il maestoso connubio di sapori. La soppressata, disposta con cura, danza tra le ondulazioni della pasta, mentre la panna e il burro abbracciano ogni nastro con una carezza di cremosità.
    **Un Viaggio nel Gusto:**    
    Il primo morso rivela l'armonia della soppressata, seguita dalla cremosità avvolgente della panna e del burro. La passata di pomodoro, intensa e avvolgente, si fonde con la piccantezza del peperoncino fresco, creando un crescendo di sapori che culminano nel retrogusto ricco e persistente del parmigiano grattugiato.
    **Una Creazione Senza Paragoni:**
    Le Tagliatelle di Seta alla Lupara incarnano l'eccellenza culinaria, un'esperienza gastronomica pensata per i palati più raffinati. Un capolavoro di equilibrio tra cremosità e piccantezza, destinato a rimanere impresso nei ricordi dei buongustai più esigenti.
    ";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "rossi";
    $prezzo = 60;
    $foto = "../media/piatti/lupara.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);


    $nome = "";
    $lista_ingredienti = "";
    $breve_descrizione = "";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = "";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "";
    $prezzo = ;
    $foto = "";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";
    
    $result = pg_query($db, $query);

    if($result)
        echo "ok";
    else
        echo "no ok";

    pg_close($db);
?>