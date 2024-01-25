<?php /*
        session_start();
        if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
            $logged = $_SESSION['loggato'];
            $email_user = $_SESSION['email'];
        }
        else {
            header("Location: http://localhost/Flying_Sauce_r/accedi/accediSimple.php"); 
            exit();
        }

        if(isset($_POST['finalize_order']) && $_POST['finalize_order']) {
            /*connessione al database
            $host="localhost";
            $db='GruppoXX';
            $user="www";
            $password="password";
            $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione 
            $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione 

            $cart = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'";
            $cart_query = pg_query($db, $cart);
            $totale = 0;

            $create_order = "INSERT INTO ordinazioni (id, email, total) VALUES (nextval('ordinazioni_id_seq'::regclass), '$email_user', '$totale')";
            $create_order_query = pg_query($db, $create_order);
            /*if(true) {
                $create_order_query = pg_get_result($db);
                $create_order_query = pg_result_error($create_order_query);
                echo $create_order_query;
            }
            while($row = pg_fetch_array($cart_query)) {
                $piatto = $row[0];
                $quantita = $row[1];
                $price_menu = "SELECT prezzo FROM menu WHERE nome = '$piatto'";
                $price_menu_query = pg_query($db, $price_menu);
                $row_price = pg_fetch_array($price_menu_query);
                if(!$row_price) {
                    
                }
                else {
                    $price = $row_price[0] * $quantita;
                    
                    $create_order_item = "INSERT INTO ordinazioni_elementi (piatto, id_ordinazione, quantita, subtotale) VALUES ('$piatto')";

                    $totale += $price;
                }
            }
            pg_close($db);
            exit("COCOOOOOOOOOOOOOOO");
        }
*/
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
	<base href="http://localhost/Flying_Sauce_r/">
	<link rel="stylesheet" href="./menu/carrello/resoconto.css">
    <script src="menu/carrello/resoconto.js"></script>
</head>
<body>
    <div id="row">
        <div id="internal-row">
            <ul>
                <li id="titolo-sezione1">CARRELLO</li>
                <li id="titolo-sezione2">&#x26AC;</li>
                <li id="titolo-sezione3">&#x26AC;</li>
            </ul>
            <div id="sezione1">
                <table id="tabella-carrello">
                    <tr><th>Pietanza</th><th>Quantità</th><th>Prezzo</th>
                    </tr>
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
                    </tr>
                    <?php
                        /*connessione al database
                        $host="localhost";
                        $db='GruppoXX';
                        $user="www";
                        $password="password";
                        $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione 
                        $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione 

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
                        pg_close($db);*/
                    ?>
                </table>
                <p id="totale" >Totale: $100<?php /* echo $totale; */?></p>
            </div>
            <div id="sezione2">
                <p class=spiegazione>
                    Il servizio di spedizione di Flying Sauce offre un'esperienza di consegna unica, consentendo 
                    di gustare le pietanze tipiche italiane comodamente a casa propria, ovunque nel mondo, grazie 
                    all'utilizzo avanzato dei droni. Il nostro sistema di spedizione è suddiviso in tre categorie 
                    per soddisfare le esigenze di ogni cliente:
                </p>
                <div id=tipi_spedizione>
                    <div class=proposta_sp>
                        <label for="rbsx">
                            <input class=opzione id=rbsx name="spedizione" value="AVANZATA" type="radio" /> <!--radio button, i 3 radio button per la stessa caratteristica hanno lo stesso attributo name in modo da essere legati-->
                            <h1>AVANZATA</h1>
                        </label>
                        <h2>COSTO: $1500</h2>
                        <img src="./media/carrello./droneAvanzato.png" alt="drone spedizione avanzata">
                        <p>
                            Velocità : 111111km/h</br>
                            Tempo di arrivo medio : 1h 30min</br>
                            Modello : SRT333W</br>
                        </p>
                        <p class=slogan>
                            Ideale per chi desidera una deliziosa esperienza culinaria senza rinunciare alla 
                            rapidità.
                        </p>
                    </div>
                    <div class=proposta_sp id=sp_lampo>
                        <label for="rbcc">
                            <input class=opzione id=rbcc name="spedizione" value="LAMPO" type="radio" checked/> <!--radio button, i 3 radio button per la stessa caratteristica hanno lo stesso attributo name in modo da essere legati-->
                            <h1>LAMPO</h1>
                        </label>
                        <h2>COSTO: $3000</h2>
                        <img src="./media/carrello./droneLampo.png" alt="drone spedizione lampo">
                        <p>
                            Velocità : 111*10^5km/h</br>
                            Tempo di arrivo medio : 30min</br>
                            Modello : PFT443A</br>
                        </p>
                        <p class=slogan>
                            Un'opzione perfetta per chi vuole gustare subito l'eccellenza della cucina italiana.
                        </p>
                    </div>
                    <div class=proposta_sp>
                        <label for="rbdx">
                            <input class=opzione id=rbdx name="spedizione" value="BASE" type="radio" /> <!--radio button, i 3 radio button per la stessa caratteristica hanno lo stesso attributo name in modo da essere legati-->
                            <h1>BASE</h1>
                        </label>
                        <h2>COSTO: $1000</h2>
                        <img src="./media/carrello./droneBase.png" alt="drone spedizione base">
                        <p>
                            Velocità : 11Km/h</br>
                            Tempo di arrivo medio : 3h</br>
                            Modello : PQZ408B</br>
                        </p>
                        <p class=slogan>
                            Un compromesso perfetto tra velocità e convenienza.
                        </p>
                    </div>
                </div>
                <p class=spiegazione>
                    Con Flying Sauce, non solo vi garantiamo la freschezza delle nostre pietanze, ma vi offriamo anche
                    la flessibilità di scegliere il livello di rapidità che meglio si adatta alle vostre esigenze. 
                    Deliziate il vostro palato con la nostra pasta, consegnata con efficienza e precisione grazie alla
                    nostra avanzata tecnologia di droni.
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