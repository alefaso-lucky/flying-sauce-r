<!DOCTYPE html>
<?php
  session_start(); // inizializza la sessione
  /* i seguenti controlli sono effettuati per rendere sticky i form di cambio password e cambio indirizzo di spedizione */
  if(isset($_POST['newpass']))
			$newpass = $_POST['newpass'];
	else
			$newpass = "";
  if(isset($_POST['nazione']))
      $nazione = $_POST['nazione'];
  else
      $nazione = "";
  if(isset($_POST['citta']))
      $citta = $_POST['citta'];
  else
      $citta = "";
  if(isset($_POST['via']))
      $via = $_POST['via'];
  else
      $via = "";
  if(isset($_POST['civico']))
      $civico = $_POST['civico'];
  else
      $civico = "";

  /* questo controllo è effettuato nel caso in cui sia stata cambiata la password o l'indirizzo.
    Si noti l'utilizzo delle variabili php $alertPass e $alertAddr che verranno usate per notificare all'utente lo stato della richiesta effettuata con i form */
  if (!empty($_POST)) {
    /* la variabile submitPass è impostata a "Aggiotna password" se l'utente ha utilizzato il form di modifica password */
    if(isset($_POST["submitPass"]) && $_POST["submitPass"] == "Aggiorna password") {
      $valPass = aggiorna_password($newpass);
      /* valPass può assumere tre valori differenti a seconda della situazione, in ogni caso $alertPass è aggiornata di conseguenza */
      if ($valPass == 1) {
        /* vale 1 se l'aggiornamento della password è andato a buon fine */
        $alertPass = "<p class='alert'><strong>Password aggiornata con successo.</strong></p>";
      } else {
        /* vale -1 se si è verificato un errore nel tentativo di aggiornare la password */
        if($valPass == -1)
          $alertPass = "<p class='alert'><strong>Errore durante l'aggiornamento. Riprova</strong></p>";
        else // <=> valPass == 0
          /* vale 0 se la nuova password coincide con la vecchia password */
          $alertPass = "<p class='alert'><strong>La nuova password non può coincidere con la vecchia password. Riprova.</strong></p>";
      }
    }

    /* la variabile submitAdd è impostata a "Aggiorna indirizzo" se l'utente ha utilizzato il form di modifica indirizzo */
    if(isset($_POST["submitAdd"]) && $_POST["submitAdd"] == "Aggiorna indirizzo"){
      if (aggiorna_indirizzo($nazione, $citta, $via, $civico)) {
        /* se l'aggiornamento dell'indirizzo è andato a buon fine aggiorna la variabile $alertAddr di conseguenza */
        $alertAddr = "<p class='alert'><strong>Il tuo indirizzo di spedizione è stato aggiornato con successo.</strong></p>";
      } else {
        /* se l'aggiornamento dell'indirizzo NON è andato a buon fine aggiorna la variabile $alertAddr di conseguenza */
        $alertAddr = "<p class='alert'><strong>Errore durante l'aggiornamento. Riprova</strong></p>";
      }
    }
  }

  /* questa funzione è chiamata se è stato compilato il form per aggiornare la password */
  function aggiorna_password($newpass) {
  /*require_once "../../logindb.php";*/  require_once "../../connessionedb.php";
  //$db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());

  // per ottenere dal database l'utente corrente che ha effettuato la richiesta viene utilizzata la sua email
  $sql = "SELECT * FROM utenti WHERE email=$1;";
  $prep = pg_prepare($db, "selectUtente", $sql);
  $utente = pg_execute($db, "selectUtente", array($_SESSION["email"]));
  if (!$utente) {
    //echo "ERRORE QUERY: " . pg_last_error($db);
  } else {
    $row = pg_fetch_assoc($utente);
    $pass = $row['password'];
  }

  if (!empty($newpass)) {
    if (password_verify($newpass, $pass)) { // controlla se il primo parametro (la nuova password) e il secondo (l'hash di password dal db) coinciono
      // restituisce 0 nel caso in cui la nuova password e la vecchia siano uguali
      return 0;
    } else {
      // query per aggiornare la password dalla tabella del database
      $sql_update = <<<_QUERY
      UPDATE utenti
      SET
      password = $1
      WHERE email = $2;
      _QUERY;

      // crea il prepared statement per aggiornare la password
      $prep = pg_prepare($db, "updatePassword", $sql_update);
      if (!$prep) {
        // in caso di errore $alertPass viene aggiornato per notificare l'errore avvenuto
        $alertPass = "<p class='alert'><strong>pg_last_error($db).</strong></p>";
      } else {
          // esegue lo statment dunque aggiorna la password
          $hash = password_hash($newpass, PASSWORD_DEFAULT);
          $ret_update = pg_execute($db, "updatePassword", array($hash, $_SESSION["email"]));
          if (!$ret_update) {
            // se l'aggiornamento non è andato a buon fine aggiorna $alertPass di conseguenza, successivamente restituirà -1
            $alertPass = "<p class='alert'><strong>ERRORE AGGIORNAMENTO. RICARICARE LA PAGINA E RIPROVARE - " . pg_last_error($db)."</strong></p>";
          } else {
            // se l'aggiornamento è andato a buon fine chiude la connessione col db e restituisce 1
            pg_close($db);
            return 1;
          }
        }
      }
    }
    return -1;
  }

  /* questa funzione è chiamata se è stato compilato il form per aggiornare l'indirizzo di spedizione */
  function aggiorna_indirizzo($nazione, $citta, $via, $civico){
    /*require_once "../../logindb.php";*/     require_once "../../connessionedb.php";
    //$db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());

    // per ottenere dal database l'utente corrente che ha effettuato la richiesta viene utilizzata la sua email
    $sql = "SELECT * FROM utenti WHERE email=$1;";
    $prep = pg_prepare($db, "selectUtente", $sql);
    $utente = pg_execute($db, "selectUtente", array($_SESSION["email"]));
    if (!$utente) {
      echo "ERRORE QUERY: " . pg_last_error($db);
    }

    /* si entra in questo if se le informazioni di spedizione somno state inserite nel form apposito */
    if (!empty($nazione) && !empty($citta) && !empty($via) && !empty($civico)) {
        // query per aggiornare le informazioni di spedizione
        $sql_update = <<<_QUERY
        UPDATE utenti
        SET
        nazione = $1,
        citta = $2,
        via = $3,
        civico = $4
        WHERE email = $5;
        _QUERY;

        // prepara lo statment
        $prep = pg_prepare($db, "updateAddress", $sql_update);
        if (!$prep) {
          // in caso di errore aggiorna $alertAddr per notificare l'errore
          $alertAddr = "<p class='alert'><strong>pg_last_error($db).</strong></p>";
        } else {
            // esegue lo statment preparato inserendo come valori i nuovu dati inseriti dall'utente
            $ret_update = pg_execute($db, "updateAddress", array($nazione, $citta, $via, $civico, $_SESSION["email"]));
            if (!$ret_update) {
              // in caso di non riuscita della modifica viene aggiornata la variabilr $alertAddr per notificare l'errore
              $alertAddr = "<p class='alert'><strong>ERRORE AGGIORNAMENTO. RICARICARE LA PAGINA E RIPROVARE - " . pg_last_error($db)."</strong></p>";
            } else {
              // in caso di successo chiude la connessione col db e restituisce true
              pg_close($db);
              return true;
            }
          }
      }
      // in caso di errore restituisce false
      return false;
  }
  /*
   La gestione delle seguenti variabili di sessione è effettuata con JavaScript
  */
  /* questa variabile di sessione memorizza quale sezoine tra Anagrafica, Sicurezza e Spedizione è selezionata per la visualizzazione */
  if(!isset($_SESSION["selected"])) {
    // di base la variabile "selected" è impostata su Anagrafica
    $_SESSION["selected"] = "Anagrafica";
  }
  /* La sezione Spedizione ha due modalità di visualizzazione: info e aggiorna.
     La variabile di sessione visibleSpedizione memorizza l'id di quale modalità delle informazioni di spedizione visualizzare.
     Di base è impostato su 'info', può cambiare in 'modifica' con le azione dell'utente. */
  if(!isset($_SESSION["visibleSpedizione"])) {
    $_SESSION["visibleSpedizione"] = "info-indirizzo";
  }

?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Flying Sauce&reg; - Area Riservata</title>
    <meta name="author" content="Gruppo08">
    <meta name="description" content="Visualizzazione dell'area riservata se sei autenticato">
    <meta name="keywords" content="pasta, droni, Italia, cucina italiana, FlyingSauce, spaghetti">
    <link rel="icon" href="./media/favicon.ico" type="image/x-icon">
	  <base href="http://localhost/Flying_Sauce_r/">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="membership/area_riservata/profilo.css">
    <script src="membership/area_riservata/profilo.js" charset="utf-8"></script>
  </head>
  <body>
    <?php
    // Questo if permette di visualizzare la pagina solo se l'utente è loggato
    if(isset($_SESSION["loggato"]) && $_SESSION["loggato"]==True) {
    // carica la navbar
    require "../../base/navFINITA.php" ; ?>
    <div class="fullbody">
      <div class="container">
        <!-- Il seguente div è utilizzato per contenere le barre di soluzione delle informazioni da visualizzare nel div di classe "account_content" -->
        <div class="columnside">
          <p><?php echo "<em>Benvenuto ".$_SESSION["email"]."!</em>"; ?></p> <!--titolo di questa sezione della pagina e collegamenti alle varie parti della sezione account-->
          <!-- i seguenti div sono le barre di selezione, al loro clik è associata una funzione JS che cambia le informaioni visualizzate -->
          <div class="selezione" id="selAnagrafica" onclick="switchDiv('Anagrafica')"><img src="media/info_personali.png" alt="info_icon" width="20px" height="20px">Informazioni personali</div>
          <div class="selezione" id="selSicurezza" onclick="switchDiv('Sicurezza')"><img src="media/sicurezza.png" alt="sec_icon" width="20px" height="20px">Sicurezza</div>
          <div class="selezione" id="selSpedizione" onclick="switchDiv('Spedizione')"><img src="media/spedizione.png" alt="sped_icon" width="20px" height="20px">Spedizione</div>
          <!-- Questo form aggiorna la variabile di sessione Logout e invia le informazioni alla homepage dove è presente la logica per il logout -->
          <form action="http://localhost/Flying_Sauce_r/nhome.php" method="post">
            <input id ="logout" type="submit" name="Logout" value="Logout">
          </form>
        </div>
        <!-- il seguente div mostra le informaioni dell'account utente -->
        <div class="account_content">
          <?php
            /*require "../../logindb.php";  */      require_once "../../connessionedb.php";
            //$db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());

            // query per ottenere le informazioni di anagrafica dell'utente dal sb
            $sql = "SELECT nome, cognome, genere, email, nazione, citta, via, civico, telefono FROM utenti WHERE email = '" . $_SESSION['email'] . "';";
            $ret = pg_query($db, $sql); /* viene eseguita la query */

            // inserisco in delle variabili di sessione
            if($row = pg_fetch_array($ret)) {
              $_SESSION["nome"] = $row['nome'];
              $_SESSION["cognome"] = $row['cognome'];
              $_SESSION["genere"] = $row['genere'];
              $_SESSION['nazione'] = $row['nazione'];
              $_SESSION['citta'] = $row['citta'];
              $_SESSION['via'] = $row['via'];
              $_SESSION['civico'] = $row['civico'];
              $_SESSION['telefono'] = $row['telefono'];
            }
          ?>

          <!-- Il seguente div mostra all'utente le informaioni di anagrafica registrate -->
          <div id="Anagrafica" class="sezione"> <!--div che contiene i dati non modificabili, dunque gli input type sono disabled-->
            <h1>Informazioni personali</h1>
            <div class="brief-description">
              Scopri la comodità di visualizzare in modo chiaro i tuoi dati fondamentali in un unico luogo.
            </div>
            <div class="input-element">
              <span>Nome:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['nome']; ?>" disabled>
            </div>
            <div class="input-element">
              <span>Cognome:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['cognome']; ?>" disabled>
            </div>
            <div class="input-element">
              <span>Genere:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['genere']; ?>" disabled>
            </div>
            <div class="input-element">
              <span>Email:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['email']; ?>" disabled>
            </div>
            <div class="input-element">
              <span>Numero di cellulare:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['telefono']; ?>" disabled>
            </div>
          </div>

          <!-- Il seguente div mostra all'utente un form per modificare la password del suo account -->
          <div id="Sicurezza" class="sezione">
            <h1>Mantieni sicuro il tuo account</h1>
            <div class="brief-description">
              La tua tranquillità è la nostra priorità, mantieni il controllo della tua privacy e rafforza
              la tua protezione digitale con un processo semplice e sicuro per la modifica della password.
            </div>
            <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post" onsubmit="return validaModulo_pass(this)">
              <input class="input-field" name="newpass" type="password" placeholder="Nuova password"/>
              <input class="input-field" name="repassword" type="password" placeholder="Conferma password"/>
              <input class="buttons" type="submit" name="submitPass" value="Aggiorna password">
            </form>
            <?php
              /* questa logica php visualizza la notifica dello stato della richiesta di modifica della password */
              if(isset($alertPass))
                echo $alertPass;
            ?>
          </div>

          <!-- Il seguente div mostra le informazioni sull'indirizzo di spedizione registrate, ha due modalità visualizzabili mutuamente esclusive: info e modifica -->
          <div id="Spedizione" class="sezione">
            <h1>Indirizzo di consegna</h1>
            <div class="brief-description">
              Consegne sicure, informazioni chiare. Visualizza e gestisci la tua spedizione in un attimo.
            </div>

            <!-- se è visualizzabile 'info' allora vengono mostrate le informazioni di spedizione, questa modalità è quella di base  -->
            <div id="info-indirizzo">
              <div class="input-element">
                <span>Nazione:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['nazione']; ?>" disabled>
              </div>
              <div class="input-element">
                <span>Città:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['citta']; ?>" disabled>
              </div>
              <div class="input-element">
                <span>Via o piazza:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['via']; ?>" disabled>
              </div>
              <div class="input-element">
                <span>Numero civico:</span><input type="text" class="disabled_input" value="<?php echo $_SESSION['civico']; ?>" disabled>
              </div>

              <!-- per cambiare modalità e passare al form di aggiornamento delle informazioni di spedizione è possibile cliccare sullo span seguente,
                con il click dello span viene chiamata la funzione JS visibileForm() che si occupa di rendere invisibili le informazioni di spedizione e di rendere visibile il form per aggiornare le informazioni -->
              <p>Vuoi cambiare il tuo indirizzo di spedizione? <span id="changeToAggiorna" onclick="visibleForm('aggiorna-indirizzo', 'info-indirizzo')">Modifica subito</span></p>
            </div>

            <!-- questa modalità di visualizzazione mostra un form per aggiornare le informazioni di spedizione -->
            <div id="aggiorna-indirizzo" style="display: none">
              <!-- questo form invia le informaioni inserite a questa stessa pagina in cui è presente la logica per aggiornare le informazioni dell'utente nel db -->
              <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">
                <!-- nota: il form è sticky -->
                <input class="input-field" name="nazione" placeholder="Nazione*" value="<?php echo $nazione ?>" required/>
                <input class="input-field" name="citta" placeholder="Città*" value="<?php echo $citta ?>" required/>
                <input class="input-field" name="via" placeholder="Via o piazza*" value="<?php echo $via ?>" required/>
                <input type="number" class="input-field" name="civico" placeholder="Numero civico*" min="1" value="<?php echo $civico ?>" required/> <!-- input type number permette solo di inserire valori numerici interi -->
                <input class="buttons" type="submit" name="submitAdd" value="Aggiorna indirizzo">
                <!-- per cambiare modalità e passare alla visualizzazioni delle informazioni di spedizione è possibile cliccare sullo span seguente -->
                <p>Hai cambiato idea? <span id="changeToInfo" onclick="visibleForm('info-indirizzo', 'aggiorna-indirizzo')">Torna indietro</span></p>
              </form>
              <?php
                // questa logica php serve per visualizzare la notifica dello stato della richiesta di aggiornamento delle informazioni di spedizione
                if(isset($alertAddr))
                  echo $alertAddr;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- richiede il footer -->
  <?php require "../../base/footer.php"; ?>
  <div class="else-container">
    <?php
    } else {
      /* nel caso in cui si acceda alla pagina senza essere loggati allora si riporta alla pagina di login */
      header("Location: http://localhost/Flying_Sauce_r/membership/account.php");
      exit();
    }
   ?>
  </div>
  </body>
</html>
