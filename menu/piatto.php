<!DOCTYPE html>
<html>
    <head>
        <title>Piatto Selezionato</title> <!--titolo della scheda-->
        <meta character="utf-8"> <!--character encoding-->
        <base href="http://localhost/Flying_Sauce_r/"> <!--base per gli href del documento-->
        <link rel="stylesheet" href="menu/piatto.css"> <!--collegamento al foglio di stile-->
    </head>
    <body>
        <?php require '../base/navFINITA.php'; ?> <!--Inserimento della navbar-->
        <!--Connessione al database-->
        <?php
            require '../connessionedb.php';
            
            /*fetch dell'elemento desiderato*/
            if(isset($_GET['name']))
                $nome = $_GET['name']; /* questa pagina è la action di un form con metodo post quindi è possibile accedere
                                        alla variabile super globale $_GET per accedere all'unica informazione passata che
                                        è il name del piatto sul quale l'utente vuole più informazioni */
            else
                $nome = "Spaghetti Cacio e Pepe"; /* valore di default */

            $sql = "SELECT nome, lista_ingredienti, descrizione_lunga, prezzo, foto  FROM menu WHERE nome = '$nome'"; /* interrogazione SQL
                                    sulla tabella menu delle informazioni specificate dopo SELECT del piatto che ha il nome ricevuto dal form */
            $ret = pg_query($db, $sql); /* viene eseguita la query */
            
            $row = pg_fetch_array($ret); /* con pg_fetch_array si ottiene un array che contiene le informazioni relative alla prima
                                    (e in questo caso unica) riga del risultato della query */

            if(!$row) {
                $nome = "Spaghetti Cacio e Pepe"; /* se l'utente modifica l'URL comunque viene caricato un piatto, quello di default */
                $sql = "SELECT nome, lista_ingredienti, descrizione_lunga, prezzo, foto  FROM menu WHERE nome = '$nome'";
                $ret = pg_query($db, $sql);
                $row = pg_fetch_array($ret);
            }

            $nome = $row[0]; /* vengono inserite in variabili dal nome indicativo le informazioni estratte dal database */
            $lista_ingredienti = $row[1];
            $descrizione_lunga = $row[2];
            $prezzo = $row[3];
            $foto = $row[4];
        ?>

        <!--la pagina è organizzata concettualmente in due righe identificate dai due div con id rowUno e rowDue
        buona parte del contenuto di queste due righe consiste di informazioni lette dal database-->
        <!--prima riga della pagina-->
        <div id="rowUno">
            <!--la parte sinistra della prima riga della pagina contiene il nome del piatto, la lista
            ingredienti e un tasto per tornare al menu-->
            <div id="rowUno_leftside">
                <h1><?php echo $nome ?></h1>
                <p id="ingredienti"><?php echo $lista_ingredienti ?></p>
                <div>
                    <!--<a class="submit-field" href="#">ORDINA ORA</a>-->
                    <a class="menu_button" href="menu/ordina_ora.php">TORNA AL MENU</a>
                </div>
            </div>
            <!--la parte destra della prima riga è un'immagine del piatto-->
            <img id="rowUno_rightside" src="<?php echo $foto ?>" alt="piatto di pasta" width="400px">
        </div>
        <!--seconda riga della pagina-->
        <div id="rowDue">
            <div id="sinGlu"> <!--questo div contiene un logo che spiega che il prodotto è disponibile anche senza glutine-->
                <img src="media/gluten-free-label.png" alt="gluten free" width="70px" height="70px">
                <p>Questo prodotto è<br>disponibile anche in<br>versione gluten free</p>
            </div>
            <p><?php echo $descrizione_lunga; ?></p>
        </div>

        <?php require '../base/footer.php'; ?> <!--Inserimento del footer-->
    </body>
</html>