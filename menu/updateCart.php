<?php
    /*connessione al database*/
    $host="localhost";
    $db='GruppoXX';
    $user="www";
    $password="password";
    $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */

    if(isset($_POST['name_piatto'])) {
        $name_piatto = $_POST['name_piatto'];

        //logica per aumentare il numero
        $check = "SELECT quantita FROM carrello WHERE piatto = '$name_piatto' AND email = 'test'"; //manca il modo per far arrivare l'email qui
        $ret_select = pg_query($db, $check);
        if(pg_num_rows($ret_select) > 0) {
            //update logic
            $row = pg_fetch_array($ret_select);
            $quantita = $row['quantita'] + 1;
            $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = 'test'";
            pg_query($db, $updateQuery);
        }
        else {
            $sql = "INSERT INTO carrello (piatto, email, quantita) VALUES ('$name_piatto', 'test', 1)";
            $ret_insert = pg_query($db, $sql); /* viene eseguita la query */
            if($ret_insert) {
                //echo "successo";
            }
        }
    }
    
    $list = "";
    $list_fetch = "SELECT piatto, quantita FROM carrello WHERE email = 'test'";
    $ret_list_fetch = pg_query($db, $list_fetch);
    while($row = pg_fetch_array($ret_list_fetch)) {
        $list .= "<li>" . $row[1] . "x " . $row[0] . "</li><br>";
    }
    pg_close($db);
    echo $list;
?>