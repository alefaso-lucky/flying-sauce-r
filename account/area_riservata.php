<!DOCTYPE html>
<?php
  session_start();
  if(isset($_POST['newpass']))
			$newpass = $_POST['newpass'];
	else
			$newpass = "";

  function aggiorna_password() {
  require_once "./logindb.php";
  $db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());

  $sql = "SELECT * FROM utenti WHERE email=$1;";
  $prep = pg_prepare($db, "selectUtente", $sql);
  $utente = pg_execute($db, "selectUtente", array($_SESSION["email"]));
  if (!$utente) {
    echo "ERRORE QUERY: " . pg_last_error($db);
  } else {
    $row = pg_fetch_assoc($utente);
    $pass = $row['password'];
  }

  if (! empty($newpass)) {
    if (password_verify($pass, $newpass)) {
      $alert = "<p class='alert'><strong><br/>La nuova password non può coincidere con la vecchia password. Riprova</strong></p>";
    } else {
      $sql_update = <<<_QUERY
      UPDATE utenti
      SET
      password = $1
      WHERE email = $2;
      _QUERY;

      $prep = pg_prepare($db, "updatePassword", $sql_update);
      if (!$prep) {
        echo pg_last_error($db);
      } else {
        echo "<p>Prepared Statement Creato</p>";

        $hash = password_hash($newpass, PASSWORD_DEFAULT);
        $ret_update = pg_execute($db, "updatePassword", array($hash, $_SESSION["email"]));
        if (!$ret_update) {
          echo "ERRORE AGGIORNAMENTO. RICARICARE LA PAGINA E RIPROVARE - " . pg_last_error($db);
        } else {
          echo "<p>Aggiornamento riuscito con Prepared Statement</p>";
          return true;
        }
      }
    }
  }

    pg_close($db);
    return false;
}

if (!empty($_POST) && $_POST["submitPass"] == "Aggiorna password") {
  if (aggiorna_password()) {
    $alert = "<p class='alert'><strong><br/>Password aggiornata con successo.</strong></p>";
  } else {
    $alert = "<p class='alert'><strong><br/>Errore durante l'aggiornamento. Riprova</strong></p>";
  }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="./area_riservata.css">
    <title></title>
    <script type="text/javascript">
        function switchDiv(visibleDiv){
          var specialDiv = document.getElementById(visibleDiv);
          var allSections = document.getElementsByClassName("sezione");

          for(var i=0; i< allSections.length; i++){
            allSections[i].style.display= "none";     /*rendo invisibili prima tutti i div che appartengono alla classe sezione*/
          }
          specialDiv.style.display= "block";    /*procedo poi a rendere nuovamente visibile il div che è stato selezionato*/

          coloreSelezionato(visibleDiv);      /*per rendere più particolare il colore della sezione in cui ti trovi*/
        }

        function coloreSelezionato(visibleDiv){
          var specificSel = document.querySelector(".selezione[href='#"+visibleDiv+"']");
          var otherSel = document.getElementsByClassName('selezione');

          for(var i=0; i<otherSel.length; i++){
            otherSel[i].style.background= "#46666D";
          }
          specificSel.style.background="rgb(255, 174, 88)";
        }

        function validaModulo_pass(form){
  				//non effettuo controlli se i campi sono pieni poichè ho esplicitato con html la parola required
  				if (form.newpass.value != form.repassword.value) {					//controllo se password e conferma coincidono
  					alert("Le due password non corrispondono");
  					form.newpass.focus();
  					form.newpass.select();
  					return false;
  				}else{			//se coincidono procedo a controllare se la password rispetta i canoni
  					password = form.newpass.value;
  	        // Almeno 8 caratteri, una lettera maiuscola, un numero e un simbolo speciale
  	        const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=\+{};:,<\.>]).{8,}$/;
  	        if(passwordRegex.test(password) == false){
  	          alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.");
  	          return false;
  	        }
  	        return true;
  				}
  			}
    </script>
  </head>
  <body onload="switchDiv('Anagrafica')">     <!-- al caricamento del body il div mostrato è quello con id anagrafica -->
    <?php
      if(isset($_SESSION["loggato"]) && $_SESSION["loggato"]==True) {

    require "./navSimple.php" ; ?>
    <div class="fullbody">
      <div class="container">
          <div class="columnside">
                <h1><?php echo "<em>Benvenuto ".$_SESSION["email"]."!</em>"; ?></h1> <!--titolo di questa sezione della pagina e collegamenti alle varie parti della sezione account-->
                <a href="#Anagrafica" class="selezione" onclick="switchDiv('Anagrafica')"><img src="./info_personali.png" alt="info_icon" width="20px" height="20px">Informazioni personali</a>
                <a href="#Sicurezza" class="selezione" onclick="switchDiv('Sicurezza')"><img src="./sicurezza.png" alt="sec_icon" width="20px" height="20px">Sicurezza</a>
                <a href="#Spedizione" class="selezione" onclick="switchDiv('Spedizione')"><img src="./spedizione.png" alt="sped_icon" width="20px" height="20px">Spedizione</a>
                <!-- <a href="#Storico" class="selezione" onclick="switchDiv('Storico')"><img src="./ordini.png" alt="ordine_icon" width="20px" height="20px">Storico ordini</a> -->
                <form class="" action="./logout.php" method="post">
                  <input id ="logout" type="submit" name="Logout" value="Logout">
                </form>
                <!--aggiungi volte in cui hai effettuato l'accesso oggi/ultimo accesso-->
        </div>
        <div class="account_content">
          <?php
            require "./logindb.php";
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
            <h3>Informazioni personali</h3>
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
            <h3>Mantieni sicuro il tuo account</h3>
            <div class="brief-description">
              La tua tranquillità è la nostra priorità, mantieni il controllo della tua privacy e rafforza
              la tua protezione digitale con un processo semplice e sicuro per la modifica della password.
            </div>
            <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post" onSubmit="return validaModulo_pass(this)">
              <input class="input-field" name="newpass" type="password" placeholder="Nuova password"/>
              <input class="input-field" name="repassword" type="password" placeholder="Conferma nuova password"/>
              <input class="submit_buttons" type="submit" name="submitPass" value="Aggiorna password">
            </form>
            <?php
              if(isset($alert))
                echo $alert;
             ?>
          </div>

          <div id="Spedizione" class="sezione">
            <h3>Il mio indirizzo di consegna</h3>
            <div class="brief-description">
              Consegne sicure, informazioni chiare. Visualizza e gestisci la tua spedizione in un attimo.
            </div>
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

            <p>Vuoi cambiare il tuo indirizzo di spedizione? <a href="#">Modifica subito</a></p>        <!--vorrei che venisse reso visibile solo
             in quel caso un form al di sotto per modificare le info, e all'invio del form un messaggio con scritto "indirizzo modificato con successo"-->
          </div>
      </div>
    </div>
  </div>
  <div class="else-container">
    <?php
    }
    else {
      echo "Non puoi accedere a questa sezione del sito<br/>";
      echo '<img src="./divieto.jpg" alt="sezione vietata" width="800px" height="900px">';
    }
   ?>
  </div>
  </body>
</html>
