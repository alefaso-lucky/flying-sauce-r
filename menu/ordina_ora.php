<?php
    session_start();
    if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
        $logged = $_SESSION['loggato'];
        $email_user = $_SESSION['email'];
    }
    else {
        $logged = false;
        $email_user = "";
    }

    if(isset($_POST['update_cart']) && $_POST['update_cart']) { //la pagina sta ricevendo la richiesta AJAX da ordina_ora.js, il contenuto di questo if poteva essere ospitato da un'altra pagina e il risultato sarebbe stato il medesimo
        if(!$logged) {
            exit("NOT LOGGED");
        }
        
        require '../connessionedb.php';

        $alert="";
        if(isset($_POST['name_piatto'])) {
            $piatto = $_POST['name_piatto'];
            $name_piatto = pg_escape_string($db, $piatto);
            
            //logica per aumentare il numero
            $check = "SELECT quantita FROM carrello WHERE piatto = '$name_piatto' AND email = '$email_user'"; //manca il modo per far arrivare l'email qui
            $ret_select = pg_query($db, $check);

            if(isset($_POST['delete'])) {
                //if the dish quantity is more than one then we must update the entry in the database, otherwise
                //it would be the case to removerlo.
                $row = pg_fetch_array($ret_select);
                if($row['quantita'] == 1) {
                    //deletion
                    $deletionQuery = "DELETE FROM carrello WHERE piatto = '$name_piatto' AND email = '$email_user'";
                    pg_query($db, $deletionQuery);
                }
                else {
                    //update
                    $quantita = $row['quantita'] - 1;
                    $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = '$email_user'";
                    pg_query($db, $updateQuery);
                }
            }
            else {
                if(pg_num_rows($ret_select) > 0) {
                    //update logic
                    $row = pg_fetch_array($ret_select);
                    if($row['quantita'] < 99) {
                        $quantita = $row['quantita'] + 1;
                        $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = '$email_user'";
                        pg_query($db, $updateQuery);
                    }
                    else {
                        $alert = "<p>Siamo italiani, amiamo la pasta... ma sei sicuro di non stare esagerando?<br>Hai già aggiunto al carrello 99 piatti come questo!</p>";
                    }
                }
                else {
                    //add logic
                    $sql = "INSERT INTO carrello (piatto, email, quantita) VALUES ('$name_piatto', '$email_user', 1)";
                    $ret_insert = pg_query($db, $sql); /* viene eseguita la query */
                }
            }
        }
        
        //questa parte serve a ricaricare la lista visibile all'utente, la parte precedente deve aggiornare la lista stessa
        $list = "";
        $list_fetch = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'";
        $ret_list_fetch = pg_query($db, $list_fetch);
        while($row = pg_fetch_array($ret_list_fetch)) {
            $list .=  "<li><img src='media/remove_from_cart.png' alt='remove item from cart button' class='remover' height=20px width=auto/>" . $row[1] . "x " . $row[0] . "</li>";
        }
        pg_close($db);
        echo $alert . $list;
        exit();
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
                                            <div class="adder" name="<?=$nome?>"> <!--anchor perché cliccando si deve aggiungere al carrello (WORK IN PROGRESS, ancora non implementato)-->
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
            <div class="columnside dx"> <!--colonna destra WORK IN PROGRESS-->
                <div id="pay_button_form">
                    <a class="menu_buttons" id="pay_button" href="http://localhost/Flying_Sauce_r/carrello/resoconto.php">VAI AL PAGAMENTO</a>
                </div>
                <ul id="cart-list">
                    <!--AJAX inserisce i List Items sulla base del contenuto del carrello dell'utente ma comunque al primo
                    caricamento bisogna mostrare i valori-->
                    <?php
                        $sql = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'"; /* interrogazione SQL
                        sulla tabella menu delle informazioni specificate dopo SELECT del piatto che ha il nome ricevuto dal form */
                        $ret = pg_query($db, $sql); /* viene eseguita la query */
                        $list = "";
                        if(pg_num_rows($ret) == 0)
                            $list = "<li>Carrello vuoto</li>";
                        while( $row = pg_fetch_array($ret) ) {
                            $list .= "<li><img src='media/remove_from_cart.png' alt='remove item from cart button' class='remover' height=20px width=auto/>" . $row[1] . "x " . $row[0] . "</li>";
                        }
                        echo $list;
                        pg_close($db); /* chiusura della connessione al database */
                    ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript" src="menu/ordina_ora.js"></script>
        <?php require "../base/footer.php"; ?> <!--inserimento footer-->
    </body>

</html>