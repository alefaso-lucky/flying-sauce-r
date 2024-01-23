<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Menu</title> <!--titolo della scheda-->
        <meta charset="utf-8"> <!--character encoding-->
        <base href="http://localhost/Flying_Sauce_r/"> <!--base degli href della pagina-->
        <link rel="stylesheet" href="menu/ordina.css"> <!--collegamento al foglio di stile-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"> <!--collegamento al font-->
    </head>

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
    ?>

    <body>
        <?php require "../base/navSimple.php" ?> <!--inserimento navbar-->
        
        <div class="row"> <!--righa con tutto il contenuto della pagina-->
            <div class="columnside sx"> <!--colonna di sinistra della pagina-->
                <h1>I nostri piatti</h1> <!--titolo di questa sezione della pagina e collegamenti alle varie parti del menu-->
                <a href="menu/ordina.php/#classici" class="piatti">CLASSICI</a>
                <a href="menu/ordina.php/#rossi" class="piatti">ROSSI</a>
                <a href="menu/ordina.php/#bianchi" class="piatti">BIANCHI</a>
                <a href="menu/ordina.php/#mare" class="piatti">MARE</a>
                <a href="menu/ordina.php/#vegetariani" class="piatti">VEGETARIANI</a>
                <a href="menu/ordina.php/#vegani" class="piatti">VEGANI</a>
                <p class="domanda"> <!--paragrafo che introduce il bottone per andare alla pagina Componi Piatto-->
                    Non hai trovato ciò che fa per te?
                </p>
                <a class="menu_buttons" href="componi%20piatto/cPiattoDef.php">COMPONI ORA IL TUO PIATTO</a> <!--bottone per andare alla pagina Componi Piatto-->
            </div>

            <div class="content"> <!--contenuto centrale della pagina-->
                <div class="scrollable_content"> <!--div che identifica la parte di pagina "scrollabile"-->
                    <?php
                        /*connessione al database*/
                        $host="localhost";
                        $db='GruppoXX';
                        $user="www";
                        $password="password";
                        $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
                        $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */
                        
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
                                            <form action="menu/piatto_singolo/piatto.php" method="post" id="to_piatto_singolo"> <!--form per accedere alla pagina del singolo piatto selezionato-->
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
                <form id="pay_button_form" action="componi">
                    <input id="pay_button" type="submit" value="VAI AL PAGAMENTO" name="pagamento" class="menu_buttons" />
                </form>
                <ul id="cart-list">
                    <!--AJAX inserisce i List Items sulla base del contenuto del carrello dell'utente ma comunque al primo
                    caricamento bisogna mostrare i valori-->
                    <?php
                        $sql = "SELECT piatto, quantita FROM carrello WHERE email = 'test'"; /* interrogazione SQL
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
        <script type="text/javascript" src="menu/ordina.js"></script>
        <?php require "../base/footer.php"; ?> <!--inserimento footer-->
    </body>

</html>