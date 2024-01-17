<!DOCTYPE html>			<!--vedere il comportamento quando si verificano situazioni di errore-->
<html>
<head>
	<meta charset="utf-8">
	<title>Registrati</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="./registrati.css">
	<script language="javascript" type="text/javascript">
		function validatePassword() {
			password = document.getElementById("pass").value;
			// Almeno 8 caratteri, una lettera maiuscola, un numero e un simbolo speciale tra . , ; ! ?
			const passwordRegex = /^^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>]){8,}.*$/;
			if(passwordRegex.test(password) == false){
				alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.");
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	<?php require "./navSimple.php" ; ?>
	<?php
		if(isset($_POST['nome']))
				$nome = $_POST['nome'];
		else
				$nome = "";
		if(isset($_POST['cognome']))
				$cognome = $_POST['cognome'];
		else
				$cognome = "";
		if(isset($_POST['email']))
				$email = $_POST['email'];
		else
				$email = "";
		if(isset($_POST['pass']))
				$pass = $_POST['pass'];
		else
				$pass = "";
		if(isset($_POST['repassword']))
				$repassword = $_POST['repassword'];
		else
				$repassword = "";
		if(isset($_POST['genere']))
				$genere = $_POST['genere'];
		else
				$genere = "";
		if(isset($_POST['numero']))
			  $numero = $_POST['numero'];
		else
			  $numero = "";
		if(isset($_POST['nazione']))
				$nazione = $_POST['nazione'];
	  else
				$nazione = "";
		if(isset($_POST['regione']))
				$regione = $_POST['regione'];
		else
	      $regione = "";
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
?>

<div class="fullbody">
	<div class="container">
		<div class="panel">
			<div class="leftpanel">
				<div class="content">
					<h3>Esplora la varietà culinaria italiana con Flying Sauce!</h3>
						<p>Iscriviti per gustare la pasta stellata e scoprire i sapori
							genuini dell'Italia.
						</p>
				</div>
			<img src="reg_img.jpg" alt="registrati_img">
			</div>
			<form action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="post" onSubmit="return validateForm();">
			<h2>Sign-up</h2>
				<fieldset>
					<legend>Dati Personali</legend>
						<input class="input-field" name="nome" placeholder="Nome" value="<?php echo $nome ?>" required/>
						<input class="input-field" name="cognome" placeholder="Cognome" value="<?php echo $cognome ?>" required/>
						<input class="input-field" name="numero" placeholder="Numero telefonico" type="tel" value="<?php echo $numero ?>"/>
						<input class="input-field" name="email" type="email" placeholder="E-mail" value="<?php echo $email ?>" required/>
						<input class="input-field" name="pass" type="password" placeholder="Password" required/>
						<input class="input-field" name="repassword" type="password" placeholder="Conferma password" required/>
					<legend>Genere:</legend>
						<label for="male-field">
							<input id="male-field" name="genere" type="radio" value="M" <?php if($genere == 'M') echo 'checked';?>/>Uomo
						</label>
						<label for="female-field">
							<input id="female-field" name="genere" type="radio" value="F" <?php if($genere == 'F') echo 'checked';?>/>Donna
						</label>
						<label for="noGender-field">
							<input id="noGender-field" name="genere" type="radio" value="" <?php if($genere == '') echo 'checked';?>/>Non specificato
						</label>
				</fieldset>
				<fieldset>
					<legend>Indirizzo</legend>
						<input  class="input-field" name="nazione" placeholder="Nazione" value="<?php echo $nazione ?>" required/>
						<input class="input-field" name="regione" placeholder="Regione" value="<?php echo $regione ?>" required/>
						<input class="input-field" name="citta" placeholder="Città" value="<?php echo $citta ?>" required/>
						<input class="input-field" name="via" placeholder="Via o piazza" value="<?php echo $via ?>" required/>
						<input type="number" min="1" class="input-field" name="civico" placeholder="Numero civico" value="<?php echo $civico ?>" required/>
				</fieldset>
				<input id="submit" name="submit" type="submit" value="Iscriviti"/>
				<p id="info" style="text-align: center;">
					Cliccando su Iscriviti, accetti le nostre <a href="./informative/condizioni.php">Condizioni</a>. Scopri in che modo
					raccogliamo, usiamo e condividiamo i tuoi dati nella nostra <a href="./informative/infoPrivacy.php">Informativa
					sulla privacy</a>.
					<br/>Fai già parte della nostra famiglia? <a href="./accedi.php">Accedi ora</a>
				</p>
			</form>
		</div>
	</div>
</div>
 </body>
</html>

<?php
function validateForm() {
	if (!empty($pass && validatePassword())) {
		if($pass != $repassword){
			echo "<p> Hai sbagliato a digitare la password. Riprova</p>";
			$pass = "";
		}
		else{
			// CONTROLLO CHE I CAMPI NON SIANO VUOTI
			if(!empty($nome) && !empty($cognome) && !empty($nazione) && !empty($regione) && !empty($citta) && !empty($via) && !empty($civico)) {
				// Controllo se l'email è valida
				if(!validateEmail($email)) {
					return;
				}
				//CONTROLLO SE L'UTENTE GIA' ESISTE
				if(email_exist($email)){
					echo "<p> Email $email già esistente. Riprova</p>";
				}
				else{
					//ORA posso inserire il nuovo utente nel db
					if(insert_utente($nome, $cognome, $pass, $email, $genere, $nazione, $regione, $citta, $via, $civico, $numero)){
						echo "<p> Utente registrato con successo.</p>";
						header("refresh:0.01;URL=./area_riservata.php");
					}
					else{
						echo "<p> Errore durante la registrazione. Riprova</p>";
					}
				}
			}
		}
	}
}

function validateEmail($email) {
	$dominio = mb_substr($email, mb_strpos($email, "@")+1);
	if(checkdnsrr($dominio, "MX"))
			return true;
	else {
			return false;
			echo "L'e-mail inserita non è valida";
	}
}

function email_exist($email){
	require "./logindb.php";
	//CONNESSIONE AL DB
	$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
		//echo "Connessione al database riuscita<br/>";
	$sql = "SELECT email FROM utenti WHERE email=$1";
	$prep = pg_prepare($db, "sqlEmail", $sql);
	$ret = pg_execute($db, "sqlEmail", array($email));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		if ($row = pg_fetch_assoc($ret)){
			return true;
		}
		else{
			return false;
		}
	}
}

function insert_utente($nome, $cognome, $pass, $email, $genere, $nazione, $regione, $citta, $via, $civico, $numero){
	require "./logindb.php";
	//CONNESSIONE AL DB
	$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
		//echo "Connessione al database riuscita<br/>";
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO utenti(nome, cognome, password, email, genere, nazione, regione, citta, via, civico, telefono) VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11)";
	$prep = pg_prepare($db, "insertUser", $sql);
	$ret = pg_execute($db, "insertUser", array($nome, $cognome, $hash, $email, $genere, $nazione, $regione, $citta, $via, $civico, $numero));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		return true;
	}
}
 ?>
