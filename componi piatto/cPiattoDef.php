<!DOCTYPE html>
<html>
    <head>
        <title>Componi il tuo piatto</title>
        <link rel="stylesheet" href="./cPiattoDef.css" type="text/css"> <!--collega il foglio di stile per questa pagina-->
        <base href="http://localhost/Flying_Sauce_r/"> <!--fa partire tutte le href del documento da questa base-->
        <meta charset="utf-8">
    </head>
<?php
    if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
        echo "<p id="."logged"." style="."'display: none'".">";
    }

    /*la pagina deve rielaborare il form perche è sticky quindi la invia a se stessa e si ricarica*/
    /*se le informazioni del form sono disponibili bisogna aggiungere il prodotto al carrello e poi portare l'utente
    al menu in modo che possa aggiungere altri prodotti ed eventualmente procedere al pagamento*/
    if(isset($_POST['quantita'])) {
        /*connessione al database*/
        $host="localhost";
        $db='GruppoXX';
        $user="www";
        $password="password";
        $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
        $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */
        
        /*preleva le informazioni dal form*/
        $quantita = $_POST['quantita'];
        $pasta = $_POST['pasta'];
        $sugo = $_POST['sugo'];
        $topping = $_POST['topping'];
        $name_piatto = "Piatto " . "$quantita " . "di " . "$pasta " . "con " . "$sugo " . "e " . "$topping";/*viene crato il nome del piatto composto*/
        $name_piatto = pg_escape_string($db, $name_piatto);/*inserisce caratteri di escape qualora fosse necessario*/
        $check = "SELECT quantita FROM carrello WHERE piatto = '$name_piatto' AND email = 'test'"; //manca il modo per far arrivare l'email qui
        $ret_select = pg_query($db, $check); /*viene eseguita la query*/

        /*aggiornare l'elenco del carrello*/
        if(pg_num_rows($ret_select) > 0) {
            /*già è stato inserito un piatto personalizzato con queste caratteristiche*/
            $row = pg_fetch_array($ret_select);
            if($row['quantita'] < 99) {/*viene aumentata la quantità relativa al piatto*/
                $quantita = $row['quantita'] + 1;/*viene incrementata quantità*/
                $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = 'test'";/*viene preparata la query */
                pg_query($db, $updateQuery);/*viene eseguita la query */
                $result_feedback = "<script>" . "window.location =" . "'http://localhost/Flying_Sauce_r/menu/ordina.php/'" . ";" . "</script>";/*sposta l'utente dalla pagina corrente a ordina.php*/
            }
            else {/*viene mostarto un alert perchè sono stati inseriti troppi piatti uguali*/
                $result_feedback = "<script>alert('Siamo italiani, amiamo la pasta... ma sei sicuro di non stare esagerando? 
                Hai già aggiunto al carrello 99 piatti personalizzati uguale a questo!');</script>";
            }
        }
        else {/*il piatto composto viene aggiunto per la prima volta in questo carrello*/
            $sql = "INSERT INTO carrello (piatto, email, quantita) VALUES ('$name_piatto', 'test', 1)";
            $ret_insert = pg_query($db, $sql); /* viene eseguita la query */
        }

        pg_close($db);
        echo $result_feedback;
    }
?>
    <body>
        <?php require '../base/navSimple.php'; ?> <!--aggiunge la navbar in testa alla pagina-->
        <div id="composizione"> <!--container di tutti gli elementi grafici di questa pagina-->
            <div> <!--contenitore del form di composizione del piatto-->
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="form_grid" onSubmit="return isUserLogged()"> <!--form per la composizione del piatto-->

                <!--la seguente porzione di codice è composta da 4 parti che permettono di scegliere i 4 attributi del piatto-->
                        <!--prima scelta-->
                        <span id="quantita" class="name_of_options">Quantità</span> <!--nome della caratteristica da scegliere-->
                        <label for="piccolo-field" id="piccolo_opt" class="options options_left" onclick="printImage('quantita_1.png', 50, 442)"> <!--label che se cliccata lancia un metodo JS che "dipinge" sul canvas la scelta effettuata-->
                            <input id="piccolo-field" name="quantita" value="Piccolo" type="radio" checked/><span>Piccolo(60g)</span> <!--radio button, i 3 radio button per la stessa caratteristica hanno lo stesso attributo name in modo da essere legati-->
                        </label>
                        <label for="medio-field" id="medio_opt" class="options" onclick="printImage('quantita_2.png', 50, 442)">
                            <input id="medio-field" name="quantita" value="Medio" type="radio"/><span>Medio(90g)</span>
                        </label>
                        <label for="Grande-field" id="grande_opt" class="options options_right" onclick="printImage('quantita_3.png', 50, 442)">
                            <input id="Grande-field" name="quantita" value="Grande" type="radio"/><span>Grande(130g)</span>
                        </label>
                        <!--seconda scelta-->
                        <span id="pasta" class="name_of_options">Pasta</span>
                        <label for="ravioli-field" id="ravioli_opt" class="options options_left" onclick="printImage('pasta_1.png', 50, 307)">
                            <input id="ravioli-field" name="pasta" value="Ravioli" type="radio" checked/><span>Ravioli</span>
                        </label>
                        <label for="tagliatelle-field" id="tagliatelle_opt" class="options" onclick="printImage('pasta_2.png', 50, 307)">
                            <input id="tagliatelle-field" name="pasta" value="Tagliatelle" type="radio"/><span>Tagliatelle</span>
                        </label>
                        <label for="orecchiette-field" id="orecchiette_opt" class="options options_right" onclick="printImage('pasta_3.png', 50, 307)">
                            <input id="orecchiette-field" name="pasta" value="Orecchiette" type="radio"/><span>Orecchiette</span>
                        </label>
                        <!--terza scelta-->
                        <span id="sugo" class="name_of_options">Sugo</span>
                        <label for="pomodoro-field" id="pomodoro_opt" class="options options_left" onclick="printImage('sugo_1.png', 50, 172)">
                            <input id="pomodoro-field" name="sugo" value="Pomodoro" type="radio" checked/><span>Pomodoro</span>
                        </label>
                        <label for="panna-field" id="panna_opt" class="options" onclick="printImage('sugo_2.png', 50, 172)">
                            <input id="panna-field" name="sugo" value="Panna" type="radio"/><span>Panna</span>
                        </label>
                        <label for="pesto-field" id="pesto_opt" class="options options_right" onclick="printImage('sugo_3.png', 50, 172)">
                            <input id="pesto-field" name="sugo" value="Pesto" type="radio"/><span>Pesto</span>
                        </label>
                        <!--quarta scelta-->
                        <span id="topping" class="name_of_options">Topping</span>
                        <label for="guanciale-field" id="guanciale_opt" class="options options_left" onclick="printImage('topping_1.png', 50, 37)">
                            <input id="guanciale-field" name="topping" value="Guanciale" type="radio" checked/><span>Guanciale</span>
                        </label>
                        <label for="avocado-field" id="avocado_opt" class="options" onclick="printImage('topping_2.png', 50, 37)">
                            <input id="avocado-field" name="topping" value="Avocado" type="radio"/><span>Avocado</span>
                        </label>
                        <label for="noci-field" id="noci_opt" class="options options_right" onclick="printImage('topping_3.png', 50, 37)">
                            <input id="noci-field" name="topping" value="Noci" type="radio"/><span>Noci</span>
                        </label>
                </form>
                <p id="bottoni"> <!--bottoni per tornare al menu e aggiungere al carrello il piatto composto-->
                    <a href="menu/ordina.php/" id="menu" class="choice_buttons">VAI AL MENU</a>
                    <input id="carrello" class="choice_buttons" form="form_grid" name="submit" type="submit" value="AGGIUNGI AL CARRELLO"/> <!--WORK IN PROGRESS-->
                </p>
            </div>
            <canvas id="piattoComposto" width="597px" height="618px" style="border:1px solid #d3d3d3;">canvas non disponibile su questo browser</canvas> <!--Canvas sul quale mostrare le scelte effettuate-->
            <script type="text/javascript" src="componi%20piatto/cPiattoDef.js"></script> <!--script che alimenta il canvas-->
        </div>
        <?php require "../base/footer.php"; ?> <!--aggiunge il footer in calce alla pagina-->
    </body>

</html>