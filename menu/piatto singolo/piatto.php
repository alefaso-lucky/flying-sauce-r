<!DOCTYPE html>
<html>
    <head>
        <title>piatto selezionato</title>
        <meta character="utf-8">
        <link rel="stylesheet" href="./piatto.css">
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
            $sql = "SELECT nome, lista_ingredienti, descrizione_lunga, prezzo, foto  FROM menu WHERE nome = 'Spaghetti alla Carbonara'";
            $ret = pg_query($db, $sql);
            $row = pg_fetch_array($ret);    
            $nome = $row[0];
            $lista_ingredienti = $row[1];
            $descrizione_lunga = $row[2];
            $prezzo = $row[3];
            $foto = $row[4];
        ?>
        <div id="rowUno">
            <div id="rowUno_leftside">
                <h1><?php echo $nome ?></h1>
                <p><?php echo $lista_ingredienti ?></p>
                <a href="#">ORDINA ORA</a>
                <a href="#">TORNA AL MENU</a>    
            </div>
            <img id="rowUno_rightside" src="../<?php echo $foto ?>" alt="piatto di pasta" width="400px">
        </div>
        <!-- 
            <div id="rowDue">
            <div id="sinGlu">
                <img src="../../media/sinGlu.jpg" alt="gluten free" width="30px">
                <p>Questo prodotto disponibile anche in versione gluten free</p>
            </div>
            <?php //echo $descrizione_lunga ?>
            </div>
         -->
        
    </body>
</html>