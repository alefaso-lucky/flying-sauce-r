<?php
    /*connessione al database*/
    $host="localhost";
    $db='gruppo08';
    $user="www";
    $password="password";
    $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error());
?>