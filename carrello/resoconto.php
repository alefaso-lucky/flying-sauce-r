<?php
        session_start(); /* viene inizializzata la sessione */
        if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
            $logged = $_SESSION['loggato'];
            $email_user = $_SESSION['email'];
        }
        else { /* se l'utente non è loggato non può accedere al carrello, viene quindi portato alla pagina per il login */
            header("Location: http://localhost/Flying_Sauce_r/membership/account.php");
            exit();
        }

        /* se si entra in questo if significa che resoconto.php sta ricevendo una richiesta AJAX, come per ordina_ora.php
        lo script PHP in questione poteva essere in una pagina separata ma per compattezza, visto che lo script JavaScript
        che esegue la richiesta AJAX è legato a resoconto.php, è stato integrato tutto nella stessa pagina */
        if(isset($_POST['finalize_order']) && $_POST['finalize_order']) {
            require "../connessionedb.php"; /*connessione al database*/
            $cart = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'"; /* viene eseguita la query per estrarre il carrello dell'utente */
            $cart_query = pg_query($db, $cart);
            
            $totale = 0; /* inizialmente il totale dell'ordine è 0 */
            $tipo_spedizione = $_POST['spedizione']; /* vengono estratti i parametri ricevuti dallo script JavaScript che ha eseguito la richiesta AJAX */
            $prezzo_spedizione = $_POST['prezzo_spedizione'];

            /* viene effettuata una query per creare un ordine, l'identificativo dell'ordine è un ordine crescente 
            che viene assegnato in automatico, di conseguenza inizialmente è ignoto, per questo l'ordine creato ha totale -1,
            una condizione che può essere verificata solo per un ordine in fase di creazione, poiché un singolo utente può stare
            creando un solo ordine alla volta la combinazione di email e totale uguale a -1 permette di identificare univocamente
            l'ordine e permette quindi di effettuare un'altra query al fine di scoprire l'identificativo che servirà poi per
            impostare il vero totale dell'ordine */
            $create_order = "INSERT INTO ordinazioni (id, email, total, tipo_spedizione) VALUES (nextval('ordinazioni_id_seq'::regclass), '$email_user', '-1', '$tipo_spedizione')";
            $create_order_query = pg_query($db, $create_order);
            $order_id = "SELECT id FROM ordinazioni WHERE email = '$email_user' AND total = '-1'";
            $order_id_query = pg_query($db, $order_id);
            $id = pg_fetch_array($order_id_query);
            $id = $id[0];

            /* per ogni elemento del carrello viene creata una entry 
            nella tabella ordinazioni_elementi che contiene gli elementi di tutte le ordinazioni
            legate alla ordinazione di appartenenza dall'identificativo univoco*/
            while($row = pg_fetch_array($cart_query)) {
                $piatto = $row[0]; /* si estraggono piatto e quantità */
                $quantita = $row[1];
                $price_menu = "SELECT prezzo FROM menu WHERE nome = '$piatto'"; /* una query sulla tabella menu evidenzia il prezzo del piatto */
                $price_menu_query = pg_query($db, $price_menu);
                $row_price = pg_fetch_array($price_menu_query);
                /* se la query va a buon fine viene calcolato il prezzo totale di questa entry del carrello moltiplicando il prezzo per la quantità */
                if( $row_price != false ) {
                    $price = $row_price[0] * $quantita;
                    /* noto il nome, del piatto, l'id ordinazione, la quantità e il totale relativo a questo specifico piatto si può
                    effettuare la query per aggiungere una entry alla tabella ordinazioni_elementi */
                    $create_order_item = "INSERT INTO ordinazioni_elementi (piatto, id_ordinazione, quantita, subtotale) VALUES ('$piatto', '$id', '$quantita', '$price')";
                    $create_order_item_query = pg_query($db, $create_order_item);
                    $totale += $price; /* si aggiunge il prezzo di questo prodotto al prezzo totale che andrà nella tabella ordinazioni */
                }
            }
            $totale += $prezzo_spedizione; /* si aggiunge il prezzo della spedizione al prezzo totale che andrà nella tabella ordinazioni*/
            $order_price = "UPDATE ordinazioni SET total = '$totale' WHERE id = '$id'";
            $order_price_query = pg_query($db, $order_price);

            $deletionQuery = "DELETE FROM carrello WHERE email = '$email_user'"; /* si effettua una query per pulire il carrello dell'utente */
            pg_query($db, $deletionQuery);

            pg_close($db); /* viene chiusa la connessione al database */
            exit("Orderd placed"); /* return a resoconto.js che ha generato la richiesta Ajax */
        }

?>
<!DOCTYPE html>
<head>
    <title>Flying Sauce&reg; - Carrello</title>
    <meta charset="utf-8">
	<base href="http://localhost/Flying_Sauce_r/">
    <meta name="author" content="Gruppo08">
    <meta name="description" content="pagina per finalizzare l'ordine">
    <meta name="keywords" content="pasta, droni, Italia, cucina italiana, FlyingSauce, spaghetti">
    <link rel="stylesheet" href="carrello/resoconto.css">
    <script src="carrello/resoconto.js"></script>
</head>
<body>
    <?php require "../base/navFINITA.php" ?> <!--inserimento navbar-->
    <div id="row">
        <div id="internal-row">
            <ul><!--indica la sezione corrente della pagina: carrello, spedizione, pagamento-->
                <li id="titolo-sezione1">CARRELLO</li>
                <li id="titolo-sezione2">&#x26AC;</li>
                <li id="titolo-sezione3">&#x26AC;</li>
            </ul>
            <div id="sezione1"> <!--sezione mostrata inizialmente, contiene il resoconto del carrello dettagliato e il totale della spesa-->
                <table id="tabella-carrello"> <!--la tabella è popolata sulla base del contenuto del database-->
                    <?php
                        require "../connessionedb.php"; /*connessione al database*/
                        
                        /* viene effettuata una query per leggere il carrello dell'utente */
                        $cart = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'";
                        $cart_query = pg_query($db, $cart);
                        $totale = 0; /* il totale della spesa dell'utente viene impostato a 0 */
                        /* se non ci sono elementi nel carrello all'utente viene mostrato un alert e poi viene riportato al menu */
                        if(!(pg_num_rows($cart_query) > 0)) {
                            pg_close($db);
                            echo "<script>alert("."'Carrello Vuoto, scegli dei prodotti dal nostro menu prima di procedere alla finalizzazione dell\'ordine'"."); window.location = "."'http://localhost/Flying_Sauce_r/menu/ordina_ora.php';"."</script>";
                            exit();
                        }

                        /* per ogni elemento del carrello viene creata una riga della tabella */
                        while($row = pg_fetch_array($cart_query)) {
                            $piatto = $row[0];
                            $quantita = $row[1];
                            /* una query sulla tabella menu permette di scoprire il prezzo del piatto */
                            $piatto = pg_escape_literal($db, $piatto);
                            $price_menu = "SELECT prezzo FROM menu WHERE nome = '$piatto'";
                            $price_menu_query = pg_query($db, $price_menu);
                            $row_price = pg_fetch_array($price_menu_query);
                            if(!$row_price) { /* laddove per un problema tecnico la query per leggere il prezzo non andasse a buon fine viene scritto al posto del prezzo il messaggio "data not available" */
                                echo "<tr><td>".$piatto."</td><td>".$quantita."</td><td>"."data not available"."</td></tr>";
                            }
                            else { /* viene calcolato il totale relativo alla entry del carrello corrente e viene stampata una righa della tabella */
                                $price = $row_price[0] * $quantita;
                                echo "<tr><td>".$piatto."</td><td>".$quantita."</td><td>".$price."</td></tr>";
                                $totale += $price; /* viene aggiornato il totale da mostrare all'utente */
                            }
                        }
                        pg_close($db); /* viene chiusa la connessione al database */
                    ?>
                </table>
                <p id="totale" >Totale: <?php echo $totale; ?></p> <!--dopo la tabella viene mostrato il totale della spesa-->
            </div>
            <div id="sezione2"><!--seconda sezione mostrata, illustra le diverse possibilità di spedizione con relative specifiche tecniche-->
                <p class=spiegazione>
                    Il servizio di spedizione di Flying Sauce offre un'esperienza di consegna unica, consentendo 
                    di gustare le pietanze tipiche italiane comodamente a casa propria, ovunque nel mondo, grazie 
                    all'utilizzo avanzato dei droni. Il nostro sistema di spedizione è suddiviso in tre categorie 
                    per soddisfare le esigenze di ogni cliente:
                </p><br>
                <div id=tipi_spedizione>
                    <div class=proposta_sp><!--prima proposta di spedizione, tipo medio-->
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
                    <div class=proposta_sp id=sp_lampo><!--seconda proposta di spedizione, tipo più rapido-->
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
                    <div class=proposta_sp><!--terza proposta di spedizione, tipo basilare-->
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
            <div id="sezione3"><!--terza sezione mostrata, illustra la modalità di pagamento in contrassegno-->
                <p class=spiegazione>
                    L’ordine è andato a buon fine, buon appetito!</br>
                    Arriverà il drone all’indirizzo indicato al momento della iscrizione, il pagamento sarà svolto al momento 
                    della consegna  e sarà possibile pagare in contanti o con carta direttamente al drone della consegna.
                </p>
                <img src="./media/carrello/bollinoVerde.png" alt="ordine stornato con successo">
            </div>
            <div id=bottoni><!--bottoni per spostarsi tra le diverse sezioni sopraelencate-->
                <p id="bottone_secondario" onclick="cambiaSezione('-')">INDIETRO</p> <!--bottone per andare alla pagina precedente-->
                <p class="bottone_primario" id="avanti" onclick="cambiaSezione('+')">AVANTI</p> <!--bottone per andare alla pagina successiva-->
            </div>
            <a id="final_button" class="bottone_primario" href="menu/ordina_ora.php">VAI AL MENU</a> <!--bottone per andare alla pagina successiva-->
        </div>
    </div>
    <?php require "../base/footer.php"; ?> <!--inserimento footer-->
</body>

</html>