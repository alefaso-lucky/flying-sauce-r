<!DOCTYPE html>
<head>
    <meta charset="utf-8">
	<base href="http://localhost/Flying_Sauce_r/">
	<link rel="stylesheet" href="./menu/carrello/resoconto.css">
    <?php
    
        session_start();
        if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
            $logged = $_SESSION['loggato'];
            $email_user = $_SESSION['email'];
        }
        else {
            header("Location: http://localhost/Flying_Sauce_r/accedi/accediSimple.php"); 
            exit();
        }
    
    ?>
    <script src="menu/carrello/resoconto.js"></script>
</head>
<body>
    <div id="row">
        <div id="internal-row">
            <ul>
                <li id="titolo-sezione1">CARRELLO</li>
                <li id="titolo-sezione2">SPEDIZIONE</li>
                <li id="titolo-sezione3">PAGAMENTO</li>
            </ul>
            <div id="sezione1">
                <table id="tabella-carrello">
                    <tr><th>Pietanza</th><th>Quantità</th><th>Prezzo</th>
                    </tr>
                    <!--
                    <tr>
                        <td>Alfreds Futterkiste</td>    <td>Maria Anders</td>     <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Centro comercial Moctezuma</td>     <td>Francisco Chang</td>     <td>Mexico</td>
                    </tr>
                    <tr>
                        <td>Ernst Handel</td>     <td>Roland Mendel</td>     <td>Austria</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>     <td>Helen Bennett</td>     <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>    <td>Yoshi Tannamuri</td>    <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>    <td>Giovanni Rovelli</td>    <td>Italy</td>
                    </tr> -->
                    <?php
                        /*connessione al database*/
                        $host="localhost";
                        $db='GruppoXX';
                        $user="www";
                        $password="password";
                        $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
                        $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */

                        $cart = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'";
                        $cart_query = pg_query($db, $cart);
                        $totale = 0;
                        while($row = pg_fetch_array($cart_query)) {
                            $piatto = $row[0];
                            $quantita = $row[1];
                            $price_menu = "SELECT prezzo FROM menu WHERE nome = '$piatto'";
                            $price_menu_query = pg_query($db, $price_menu);
                            $row_price = pg_fetch_array($price_menu_query);
                            if(!$row_price) {
                                echo "<tr><td>".$piatto."</td><td>".$quantita."</td><td>"."data not available"."</td></tr>";
                            }
                            else {
                                $price = $row_price[0] * $quantita;
                                echo "<tr><td>".$piatto."</td><td>".$quantita."</td><td>".$price."</td></tr>";
                                $totale += $price;
                            }
                        }
                        pg_close($db);
                    ?>
                </table>
                <p id="totale" >Totale: <?php echo $totale; ?></p>
            </div>
            <div id="sezione2">
                <p>
                    ciao ciao ciao
                </p>
            </div>
            <div id="sezione3">
                <p>
                    ciao ciao ciaofefefef
                </p>
            </div>
            <div id=bottoni>
                <p id="bottone_secondario" onclick="cambiaSezione('-')">INDIETRO</p> <!--bottone per andare alla pagina precedente-->
                <p class="bottone_primario" onclick="cambiaSezione('+')">AVANTI</p> <!--bottone per andare alla pagina successiva-->
            </div>
            <a id="final_button" class="bottone_primario" href="menu/ordina.php">VAI AL MENU</a> <!--bottone per andare alla pagina successiva-->
        </div>
    </div>
</body>

</html>