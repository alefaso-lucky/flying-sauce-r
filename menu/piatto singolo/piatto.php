<!DOCTYPE html>
<html>
    <head>
        <title>piatto selezionato</title>
        <meta character="utf-8">
        <link rel="stylesheet" href="menusimple.css">
    </head>
    <body>
    <?php
        $host="localhost";
        $db='GruppoXX';
        $user="www";
        $password="password";
        $connection_string = "host=$host dbname=$db user=$user password=$password";
        $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error());
    ?>
    <!-- portare in qualche modo il piatto selezionato in $curr_nom -->
        <?php
            $sql = "SELECT nome, lista_ingredienti, descrizione_lunga, prezzo, foto,  FROM menu WHERE nome = '$curr_nom'";
            $ret = pg_query($db, $sql);
        ?>
        <div id="rowUno">
            <h1><?php echo $nome ?></h1>
            <?php echo $lista_ingredienti ?>
            <img src="<?php echo $foto ?>" alt="piatto di pasta" width="400px">
            <a href="#">TORNA AL MENU</a>
        </div>
        <div id="rowDue">
            <div id="sinGlu">
                <img src="../media/sinGlu.jpg" alt="gluten free" width="30px">
                <p>Questo prodotto disponibile anche in versione gluten free</p>
            </div>
            <?php echo $descrizione_lunga ?>
        </div>
    </body>
</html>