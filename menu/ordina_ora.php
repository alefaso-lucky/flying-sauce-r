<?php
    session_start(); /* inizializza la sessione */
    if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
    /* se l'utente è loggato le informazioni di sessione sono salvate nelle variabili $logged e $email_user*/
        $logged = $_SESSION['loggato'];
        $email_user = $_SESSION['email'];
    }
    else {
    /* se l'utente non è loggato le variabili $logged e $email_user sono inizializzate di conseguenza */
        $logged = false;
        $email_user = "";
    }
    
    /* se si entra in questo if significa che la pagina sta ricevendo la richiesta AJAX da ordina_ora.js, il contenuto 
    di questo if con aggiunta l'inizializzazione della sessione poteva essere ospitato da un'altra pagina (originariamente 
    era così) e il risultato sarebbe stato il medesimo (a patto di aggiungere anche l'inizializzazione della sessione) 
    ma per "compattezza" è stato inserito all'interno di ordina_ora.php */
    if(isset($_POST['update_cart']) && $_POST['update_cart']) {
        /* se l'utente non è loggato risulta impossibile aggiornare il carrello, si restituisce a chi ha eseguito
        la richiesta AJAX (ordina_ora.js) la stringa "NOT LOGGED" che sarà appropriatamente interpretata */
        if(!$logged) {
            exit("NOT LOGGED");
        }
        
        require '../connessionedb.php'; /* connessione al database */

        $alert=""; /* eventuale messaggio di errore */
        /* $_POST['name_piatto'] dovrebbe essere sempre inizializzata ma per maggiore robustezza 
        viene comunque effettuato un controllo */
        if(isset($_POST['name_piatto'])) {
            $piatto = $_POST['name_piatto']; /* il valore di $_POST['name_piatto'] viene salvato in $piatto */
            $name_piatto = pg_escape_string($db, $piatto); /* in $name_piatto viene inserita la versione 'escaped' di
            $piatto per assicurare che non ci siano problemi con le query */
            
            /* viene effettuata una query per sapere quante istanze del piatto sono già presenti nel carrello */
            $check = "SELECT quantita FROM carrello WHERE piatto = '$name_piatto' AND email = '$email_user'";
            $ret_select = pg_query($db, $check);
            $row = pg_fetch_array($ret_select);
            
            /* si controlla se la richiesta AJAX è per l'eliminazione di un'istanza del piatto dal carrello */
            if(isset($_POST['delete'])) {
                if($row['quantita'] == 1) {
                    /* se la 'quantita' del piatto è 1 allora bisogna cancellare l'entry dal database con un'apposita query */
                    $deletionQuery = "DELETE FROM carrello WHERE piatto = '$name_piatto' AND email = '$email_user'";
                    pg_query($db, $deletionQuery);
                }
                else {
                    /* se la 'quantita' del piatto è maggiore di 1 allora bisogna aggiornarla con un'apposita query */
                    $quantita = $row['quantita'] - 1;
                    $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = '$email_user'";
                    pg_query($db, $updateQuery);
                }
            }
            else {
                /* se si entra in questo else la richiesta AJAX è di aggiunta */
                if(!$row) {
                    /* se il piatto non è stato trovato nel carrello allora bisogna creare una nuova entry */
                    $sql = "INSERT INTO carrello (piatto, email, quantita) VALUES ('$name_piatto', '$email_user', 1)";
                    $ret_insert = pg_query($db, $sql); /* viene eseguita la query */
                }
                else {
                    /* se il piatto è stato trovato nel carrello allora bisogna aggiornare la entry associata */
                    if($row['quantita'] < 99) { /* è possibile ordinare fino a 99 istanze dello stesso piatto per ordine */
                        /* si aggiorna la 'quantita' del piatto con un'apposita query */
                        $quantita = $row['quantita'] + 1;
                        $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = '$email_user'";
                        pg_query($db, $updateQuery);
                    }
                    else {
                        /* se l'utente ha già aggiunto al carrello 99 istanze dello stesso piatto allora viene stampato
                        un messaggio di errore in tema con il sito */
                        $alert = "<p>Siamo italiani, amiamo la pasta... ma sei sicuro di non stare esagerando?<br>Hai già aggiunto al carrello 99 piatti come questo!</p>";
                    }
                }
            }
        }
        
        /* le seguenti righe di codice servono a fornire allo script JS (ordina_ora.js) che ha effettuato la richiesta AJAX il 
        contenuto del carrello aggiornato, il codice JavaScript si occuperà di aggiornare (senza bisogno di ricaricare) 
        la pagina visibile */
        $list = "";
        /* query per estrarre tutti i prodotti dal carrello dell'utente loggato */
        $list_fetch = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'";
        $ret_list_fetch = pg_query($db, $list_fetch);
        while($row = pg_fetch_array($ret_list_fetch)) {
            /* per ogni elemento del carrello dell'utente si genera un list item che contiene quantita e nome del piatto
            ma anche una immagine che fa da tasto per la rimozione dei prodotti dal carrello */
            $list .=  "<li><img src='media/remove_from_cart.png' alt='remove item from cart button' class='remover' height=20px width=auto/>" . $row[1] . "x " . $row[0] . "</li>";
        }
        pg_close($db); /* chiusura connessione db */
        $return_js = $alert . $list;
        exit($return_js); /* return della lista a ordina_ora.js con anteposto l'alert (che potrebbe essere vuoto) */
    }
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Menu</title> <!--titolo della scheda-->
        <meta charset="utf-8"> <!--character encoding-->
        <base href="http://localhost/Flying_Sauce_r/"> <!--base degli href della pagina-->
        <link rel="stylesheet" href="menu/ordina_ora.css"> <!--collegamento al foglio di stile-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"> <!--collegamento al font-->
    </head>
    <body>
        <?php require "../base/navFINITA.php" ?> <!--inserimento navbar-->
        
        <div class="row"> <!--righa con tutto il contenuto della pagina-->
            <div class="columnside sx"> <!--colonna di sinistra della pagina-->
                <h1>I nostri piatti</h1> <!--titolo di questa sezione della pagina e collegamenti alle varie parti del menu-->
                <a href="menu/ordina_ora.php/#classici" class="piatti">CLASSICI</a>
                <a href="menu/ordina_ora.php/#rossi" class="piatti">ROSSI</a>
                <a href="menu/ordina_ora.php/#bianchi" class="piatti">BIANCHI</a>
                <a href="menu/ordina_ora.php/#mare" class="piatti">MARE</a>
                <a href="menu/ordina_ora.php/#vegetariani" class="piatti">VEGETARIANI</a>
                <a href="menu/ordina_ora.php/#vegani" class="piatti">VEGANI</a>
                <p class="domanda"> <!--paragrafo che introduce il bottone per andare alla pagina Componi Piatto-->
                    Non hai trovato ciò che fa per te?
                </p>
                <a class="menu_buttons" href="menu/ordina_ora/componi_piatto.php">COMPONI ORA IL TUO PIATTO</a> <!--bottone per andare alla pagina Componi Piatto-->
            </div>

            <div class="content"> <!--contenuto centrale della pagina-->
                <div class="scrollable_content"> <!--div che identifica la parte di pagina "scrollabile"-->
                    <?php
                        require '../connessionedb.php';
                        
                        $categories = array("Classici", "Rossi", "Bianchi", "Mare", "Vegetariani", "Vegani"); /* creazione di un array che contiene i nomi delle categorie del menu */
                        foreach( $categories as $curr_cat ) { /* un ciclo che inserisce i piatti per ogni categoria */
                            ?> <!--chiusura del blocco php perché bisogna eseguire ciclicamente codice che è misto html/php-->
                            <h1 class="titolo" id="<?php echo strtolower($curr_cat); ?>"><?php echo $curr_cat; ?></h1> <!--titolo della categoria-->
                            <div class="categoria"> <!--div che contiene tutti gli elementi della categoria corrente-->
                                <?php
                                    $sql = "SELECT nome, descrizione_breve, foto FROM menu WHERE categoria = '$curr_cat'"; /* interrogazione SQL
                                    sulla tabella menu delle informazioni specificate dopo SELECT del piatto che ha il nome ricevuto dal form */
                                    $ret = pg_query($db, $sql); /* viene eseguita la query */
                                    
                                    while( $row = pg_fetch_array($ret) ) { /* while che gira ogni piatto della categoria corrente */
                                        $nome = $row[0];
                                        $descrizione_breve = $row[1];
                                        $foto = $row[2];
                                ?>
                                        <div class="primi"> <!--div che contiene il singolo piatto-->
                                            <form action="menu/piatto.php" method="get" id="to_piatto_singolo"> <!--form per accedere alla pagina del singolo piatto selezionato-->
                                                <button type="submit" id="info_button"> <!--bottone di submit che è un'immagine-->
                                                    <input type="hidden" name="name" value="<?=$nome?>"> <!--per spedire l'informazione del nome del piatto c'è un input type hidden-->
                                                    <img src="media/info_button" alt="info-dish" width="24px" height="24px"/> <!--immagine "info" per eseguire la submit-->
                                                </button>
                                            </form>
                                            <div class="adder" name="<?=$nome?>"> <!--appartiene alla classe adder perché cliccando si deve aggiungere il piatto al carrello con AJAX-->
                                                <img src="<?php echo $foto ?>" alt="piatto di pasta" width="230px"> <!--immagine del piatto-->
                                                <div class="nomepiatto"><?php echo $nome ?></div> <!--nome del piatto-->
                                                <?php echo $descrizione_breve ?> <!--descrizione breve del piatto-->
                                            </div>
                                        </div>
                                <?php        
                                    } /* chiusura del while */
                                ?>
                            </div>
                    <?php
                        } /* chiusura del foreach */
                    ?>
                </div>
            </div>
            <div class="columnside dx"> <!--colonna destra-->
                <div id="pay_button_form"> <!--tasto per andare al pagamento-->
                    <a class="menu_buttons" id="pay_button" href="http://localhost/Flying_Sauce_r/carrello/resoconto.php">VAI AL PAGAMENTO</a>
                </div>
                <ul id="cart-list">
                    <!--AJAX inserisce i List Items sulla base del contenuto del carrello dell'utente ma comunque al primo
                    caricamento della pagina bisogna mostrare i valori-->
                    <?php
                        /* query per estrarre dal db il carrello dell'utente loggato */
                        $sql = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'";
                        $ret = pg_query($db, $sql);
                        if(pg_num_rows($ret) == 0) /* se l'utente non è loggato o il suo carrello è vuoto viene mostrato questo messaggio */
                            $list = "<li>Carrello vuoto</li>";
                        $list = "";
                        while( $row = pg_fetch_array($ret) ) {
                            /* per ogni elemento del carrello dell'utente si genera un list item che contiene quantita e nome del piatto
                            ma anche una immagine che fa da tasto per la rimozione dei prodotti dal carrello */
                            $list .= "<li><img src='media/remove_from_cart.png' alt='remove item from cart button' class='remover' height=20px width=auto/>" . $row[1] . "x " . $row[0] . "</li>";
                        }
                        echo $list;
                        pg_close($db); /* chiusura della connessione al database */
                    ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript" src="menu/ordina_ora.js"></script> <!--collegamento script che esegue la richiesta AJAX-->
        <?php require "../base/footer.php"; ?> <!--inserimento footer-->
    </body>

</html>