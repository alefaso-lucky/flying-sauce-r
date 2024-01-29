<?php
$host = "localhost";
$port = '5432';
$dbname = 'lezione_14';
$username = 'www';
$password = '1320';

$connection_string = "host=$host port=$port dbname=$dbname user=$username password=$password";
$db = pg_connect($connection_string) or die('Impossibile connetersi al database');

?>
