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

    $nome = "Spaghetti alla Carbonara Vegetariana";
    $lista_ingredienti = "spaghetti, zucchine scure, tuorli d'uovo, scaglie di pecorino grattugiato, Olio extravergine di oliva, Sale e pepe nero.";
    $lista_ingredienti = pg_escape_string($db, $lista_ingredienti);
    $breve_descrizione = "Un'armonia di sapori che celebra la freschezza della natura. Un piatto che sfida
      le convenzioni con eleganza, invitando gli ospiti a sperimentare una nuova dimensione
      di gusto. Un'opera culinaria destinata a catturare l'attenzione e il palato degli
      intenditori gastronomici.";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = "**Eleganza Spaghetto:**
        Gli spaghetti, attentamente posati su un piatto di ceramica bianca, si presentano come fili d'arte pronti a catturare il palato dei buongustai più raffinati. La loro lunghezza si avvolge con grazia, creando una sinfonia visiva che anticipa la ricetta.

        **Zucchine in Protagonista:**
        Le zucchine scure, tagliate con precisione, incarnano l'essenza della carbonara vegetale. Il verde intenso si sposa con il giallo dei tuorli, creando un tableau cromatico che esalta la freschezza del piatto. Questi ortaggi, sapientemente preparati, aggiungono una nota croccante e leggera, trasformando la tradizionale carbonara in un'esperienza unica.

        **Tuorli d'Uovo: Il Cuore della Carbonara Vegetariana:**
        I tuorli d'uovo, ricchi e cremosi, sono il cuore pulsante di questa reinterpretazione della carbonara. Si amalgamano con il pecorino grattugiato, creando una vellutata salsa che abbraccia gli spaghetti con delicatezza. L'olio extravergine di oliva, con il suo aroma fruttato, contribuisce a elevare la cremosità del piatto.";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "vegetariani";
    $prezzo = 50;
    $foto = "../media/piatti/carbonaraVegetariana.png";

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
    $lunga_descrizione = "**Esecuzione Raffinata:**
    - La Pasta Corta, cucinata al punto giusto, mantiene la sua consistenza artigianale.
    - Il Pesto di Cavolo Nero, preparato con maestria, avvolge la pasta con il suo colore intenso e il suo sapore vibrante.
    - Un filo di Olio Extravergine d'Oliva, come un abbraccio dorato, completa la base del piatto.
    - Il Caviale, disposto con precisione, aggiunge una nota di lusso e raffinatezza.

    **Presentazione Sofisticata:**
    - La pasta è disposta con grazia, abbracciata dal verde del pesto e decorata con le perle di caviale.
    - Un leggero filo d'olio ricama la superficie, anticipando la ricchezza dei sapori.
    - Il caviale è posato con eleganza, creando un effetto tricolore che delizia gli occhi e il palato.

    **Un'Esperienza Tricolore di Gusto:**
    Il Pesto di Eleganza Tricolore con Caviale è un inno alla raffinatezza italiana,
    dove il verde intenso del cavolo nero si fonde con la lucentezza dell'olio e la prelibatezza del caviale.
    Un piatto che celebra il tricolore, non solo visivamente, ma anche attraverso una sinfonia di sapori in ogni boccone.";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "vegetariani";
    $prezzo = 65;
    $foto = "../media/piatti/pestoConCaviale.png";

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
    $lunga_descrizione = "**Eleganza Vegetale:**
    I broccoli, collocati con precisione su un piatto di ceramica bianca, si ergono come fiori di verde lussureggiante. Le loro teste, raccolte con attenzione, anticipano una composizione culinaria di eleganza vegetale.

    **Linguine Tessute: Un Arazzo di Pasta Fresca:**
    Le linguine, sapientemente intrecciate, si presentano come una cascata di fili d'arte pronti a catturare il palato. La loro consistenza al dente, combinata con la delicatezza della crema di broccoli, promette un'esperienza unica di ogni boccone.

    **Crema di Broccoli e Mandorle: Un'Esplosione di Consistenze:**
    La crema di broccoli, arricchita dalle mandorle a scaglie, crea un equilibrio di consistenze sorprendente. I broccoli offrono una consistenza morbida e vellutata, mentre le mandorle aggiungono un tocco croccante che scintilla come gemme preziose nel piatto.

    **Un Finale di Complessità:**
    Il pecorino, con la sua complessità di sapori, è il tocco finale che corona la melodia del verde. La sua presenza nobilita il piatto, aggiungendo strati di gusto che persistono delicatamente sul palato, completando questa composizione ";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "vegetariani";
    $prezzo = 45;
    $foto = "../media/piatti/melodiaVerde.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    $nome = "Eleganza Trionfante";
    $lista_ingredienti = "Trofie fresche, scaglie di noci, spinaci novelli, mollica di pane, parmigiano reggiano grattugiato,
    olio extravergine di oliva, latte, sale.";
    $breve_descrizione = "Le Trofie alla Crema di Noci e Balletto di Spinaci Novelli sono una
      creazione culinaria culminante, destinata a essere il gioiello di ogni tavolo.
      Un piatto che celebra la raffinatezza della dieta vegetariana";
    $breve_descrizione = pg_escape_string($db, $breve_descrizione);
    $lunga_descrizione = "**Trofie in Vortice Elegante:**
    Le trofie, disposte con cura su un piatto di ceramica, sono una sinfonia di forme che anticipa l'esperienza gustativa. La loro freschezza e consistenza al dente sono il preludio a un vortice di sapori e sensazioni.

    **Pesto di Noci e Spinaci: Un Raccogliersi di Delicatezza
    Il pesto di noci, preparato con maestria, avvolge le trofie come una carezza di autunno. Gli spinaci novelli, puri e teneri, si fondono con la mollica di pane, creando una crema vellutata che avvolge ogni boccone. Il parmigiano reggiano, con la sua complessità, aggiunge un tocco di nobiltà, mentre l'olio extravergine di oliva completa la composizione con la sua morbidezza.

    **Balletto di Sapori:**
    Il Balletto di Spinaci Novelli è la scena culinaria principale. Le foglie verdi, come ballerine leggere, danzano tra le trofie, creando un equilibrio di freschezza e cremosità. Il gusto pronunciato delle noci, unito alla delicatezza degli spinaci, si fonde in un balletto di sapori che lascia un'impronta memorabile";
    $lunga_descrizione = pg_escape_string($db, $lunga_descrizione);
    $cate = "vegetariani";
    $prezzo = 52;
    $foto = "../media/piatti/eleganzaTrionfante.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);
 ?>
