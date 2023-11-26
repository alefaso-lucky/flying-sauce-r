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
    $cate = "classici";
    $prezzo = 50;
    $foto = "../media/piatti/carbonara.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    if($result)
        echo "ok";
    else
        echo "no ok";

    pg_close($db);
?>