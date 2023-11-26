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

    $nome = "spaghetti";
    $lista_ingredienti = "pane e acqua";
    $breve_descrizione = "buoni gli spaghetti";
    $lunga_descrizione = "ok";
    $cate = "classici";
    $prezzo = 30;
    $foto = "../media/piatti/carbonara.png";

    $query = "INSERT INTO menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) VALUES ('$nome', '$lista_ingredienti', '$breve_descrizione', '$lunga_descrizione', '$cate', '$prezzo', '$foto')";

    $result = pg_query($db, $query);

    if($result)
        echo "ok";
    else
        echo "no ok";

    pg_close($db);
?>