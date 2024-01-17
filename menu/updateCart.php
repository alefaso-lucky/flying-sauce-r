<?php
    /*connessione al database*/
    $host="localhost";
    $db='GruppoXX';
    $user="www";
    $password="password";
    $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */

    if(isset($_POST['name_piatto'])) {
        echo "ciao";
        $name_piatto = $_POST['name_piatto'];
        $sql = "INSERT INTO carrello (piatto, email) VALUES ('$name_piatto', 'test')";
        $ret = pg_query($db, $sql); /* viene eseguita la query */
        if($ret) {
            echo "successo";
        }
    }
    
    pg_close($db);
?>