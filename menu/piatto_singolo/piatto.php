<!DOCTYPE html>
<html>
    <head>
        <title>piatto selezionato</title>
        <meta character="utf-8">
        <base href="http://localhost/Flying_Sauce_r/">
        <link rel="stylesheet" href="menu/piatto_singolo/piatto.css">
    </head>
    <body>
        <?php require '../../base/navSimple.php'; ?>
        <!--Connessione al database-->
        <?php
            $host="localhost";
            $db='GruppoXX';
            $user="www";
            $password="password";
            $connection_string = "host=$host dbname=$db user=$user password=$password";
            $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error());
        ?>
        <!-- portare in qualche modo il piatto selezionato in $curr_nom -->
        <!--fetch dell'elemento desiderato-->
        <?php
            $nome = $_POST['name'];
            $sql = "SELECT nome, lista_ingredienti, descrizione_lunga, prezzo, foto  FROM menu WHERE nome = '$nome'";
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
                <p id="ingredienti"><?php echo $lista_ingredienti ?></p>
                <div>
                    <!--<a class="submit-field" href="#">ORDINA ORA</a>-->
                    <a class="menu_button" href="menu/ordina.php/">TORNA AL MENU</a>
                </div>
            </div>
            <img id="rowUno_rightside" src="<?php echo $foto ?>" alt="piatto di pasta" width="400px">
        </div>
        <div id="rowDue">
            <div id="sinGlu">
                <img src="media/gluten-free-label.png" alt="gluten free" width="70px" height="70px">
                <p>Questo prodotto è<br>disponibile anche in<br>versione gluten free</p>
            </div>
            <p><?php echo $descrizione_lunga; ?></p>
        </div>
        <?php require '../../base/footer.php'; ?>
    </body>
</html>