<!DOCTYPE html>
<?php
  session_start();
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
  if (!empty($_POST)) {
    if(isset($_POST["submitPass"]) && $_POST["submitPass"] == "Aggiorna password"){
      $valPass = aggiorna_password($newpass);
      if ($valPass == 1) {
        $alertPass = "<p class='alert'><strong>Password aggiornata con successo.</strong></p>";
      } else {
        if($valPass == -1)
          $alertPass = "<p class='alert'><strong>Errore durante l'aggiornamento. Riprova</strong></p>";
        else
          $alertPass = "<p class='alert'><strong>La nuova password non può coincidere con la vecchia password. Riprova.</strong></p>";
      }
    }

    if(isset($_POST["submitAdd"]) && $_POST["submitAdd"] == "Aggiorna indirizzo"){
      if (aggiorna_indirizzo($nazione, $citta, $via, $civico)) {
        $alertAddr = "<p class='alert'><strong>Il tuo indirizzo di spedizione è stato aggiornato con successo.</strong></p>";
      } else {
        $alertAddr = "<p class='alert'><strong>Errore durante l'aggiornamento. Riprova</strong></p>";
      }
    }


  }

  function aggiorna_password($newpass) {
  require_once "../../logindb.php";  /*require_once "../../connessionedb.php";*/
  $db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());

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
    if (password_verify($newpass, $pass)) {     /*primo parametro la nuova password, il secondo è l'hash di password dal db*/
      return 0;
    } else {
      $sql_update = <<<_QUERY
      UPDATE utenti
      SET
      password = $1
      WHERE email = $2;
      _QUERY;

      $prep = pg_prepare($db, "updatePassword", $sql_update);
      if (!$prep) {
        $alertPass = "<p class='alert'><strong>pg_last_error($db).</strong></p>";
      } else {
          $hash = password_hash($newpass, PASSWORD_DEFAULT);
          $ret_update = pg_execute($db, "updatePassword", array($hash, $_SESSION["email"]));
          if (!$ret_update) {
            $alertPass = "<p class='alert'><strong>ERRORE AGGIORNAMENTO. RICARICARE LA PAGINA E RIPROVARE - " . pg_last_error($db)."</strong></p>";
          } else {
            pg_close($db);
            return 1;
          }
        }
      }
    }
    return -1;
  }

  function aggiorna_indirizzo($nazione, $citta, $via, $civico){
    require_once "../../logindb.php";     /*require_once "../../connessionedb.php";*/
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());

    $sql = "SELECT * FROM utenti WHERE email=$1;";
    $prep = pg_prepare($db, "selectUtente", $sql);
    $utente = pg_execute($db, "selectUtente", array($_SESSION["email"]));
    if (!$utente) {
      echo "ERRORE QUERY: " . pg_last_error($db);
    }

    if (!empty($nazione) && !empty($citta) && !empty($via) && !empty($civico)) {
        $sql_update = <<<_QUERY
        UPDATE utenti
        SET
        nazione = $1,
        citta = $2,
        via = $3,
        civico = $4
        WHERE email = $5;
        _QUERY;

        $prep = pg_prepare($db, "updateAddress", $sql_update);
        if (!$prep) {
          $alertAddr = "<p class='alert'><strong>pg_last_error($db).</strong></p>";
        } else {
            $ret_update = pg_execute($db, "updateAddress", array($nazione, $citta, $via, $civico, $_SESSION["email"]));
            if (!$ret_update) {
              $alertAddr = "<p class='alert'><strong>ERRORE AGGIORNAMENTO. RICARICARE LA PAGINA E RIPROVARE - " . pg_last_error($db)."</strong></p>";
            } else {
              pg_close($db);
              return true;
            }
          }
      }
      return false;
  }


  /*
   La gestione delle seguenti variabili di sessione è effettuata con JavaScript
  */
  /* questa variabile di sessione memorizza quale div è selezionato per la visualizzazione */
  if(!isset($_SESSION["selected"])) {
    $_SESSION["selected"] = "Anagrafica";
  }
  /* questa variabile di sessione memorizza l'id di quale versione delle informazioni di spedizione visualizzare. Di base è impostato su 'info', può cambiare in 'modifica' con le azione dell'utente */
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
    if(isset($_SESSION["loggato"]) && $_SESSION["loggato"]==True) {

    require "../../base/navFINITA.php" ; ?>
    <div class="fullbody">
      <div class="container">
        <div class="columnside">
          <p><?php echo "<em>Benvenuto ".$_SESSION["email"]."!</em>"; ?></p> <!--titolo di questa sezione della pagina e collegamenti alle varie parti della sezione account-->
          <div class="selezione" id="selAnagrafica" onclick="switchDiv('Anagrafica')"><img src="media/info_personali.png" alt="info_icon" width="20px" height="20px">Informazioni personali</div>
          <div class="selezione" id="selSicurezza" onclick="switchDiv('Sicurezza')"><img src="media/sicurezza.png" alt="sec_icon" width="20px" height="20px">Sicurezza</div>
          <div class="selezione" id="selSpedizione" onclick="switchDiv('Spedizione')"><img src="media/spedizione.png" alt="sped_icon" width="20px" height="20px">Spedizione</div>
          <!-- Questo form aggiorna la variabile di sessione Logout e invia le informazioni alla homepage dove è presente la logica per il logout -->
          <form action="http://localhost/Flying_Sauce_r/nhome.php" method="post">
            <input id ="logout" type="submit" name="Logout" value="Logout">
          </form>
        </div>
        <div class="account_content">
          <?php
            require "../../logindb.php";        /*require_once "../../connessionedb.php";*/
            $db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());
            $sql = "SELECT nome, cognome, genere, email, nazione, citta, via, civico, telefono FROM utenti WHERE email = '" . $_SESSION['email'] . "';";
            $ret = pg_query($db, $sql); /* viene eseguita la query */

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
              if(isset($alertPass))
                echo $alertPass;
            ?>
          </div>

          <div id="Spedizione" class="sezione">
            <h1>Indirizzo di consegna</h1>
            <div class="brief-description">
              Consegne sicure, informazioni chiare. Visualizza e gestisci la tua spedizione in un attimo.
            </div>

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

              <p>Vuoi cambiare il tuo indirizzo di spedizione? <span id="changeToAggiorna" onclick="visibleForm('aggiorna-indirizzo', 'info-indirizzo')">Modifica subito</span></p>
            </div>

            <div id="aggiorna-indirizzo" style="display: none">
              <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">
                <input class="input-field" name="nazione" placeholder="Nazione*" value="<?php echo $nazione ?>" required/>
                <input class="input-field" name="citta" placeholder="Città*" value="<?php echo $citta ?>" required/>
                <input class="input-field" name="via" placeholder="Via o piazza*" value="<?php echo $via ?>" required/>
                <input type="number" class="input-field" name="civico" placeholder="Numero civico*" min="1" value="<?php echo $civico ?>" required/>
                <input class="buttons" type="submit" name="submitAdd" value="Aggiorna indirizzo">
                <p>Hai cambiato idea? <span id="changeToInfo" onclick="visibleForm('info-indirizzo', 'aggiorna-indirizzo')">Torna indietro</span></p>
              </form>
              <?php
                if(isset($alertAddr))
                  echo $alertAddr;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
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
