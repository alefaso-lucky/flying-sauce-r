<!DOCTYPE html>
<?php 
	/*anche qui come per la sezione di accedi non mi occupo di rendere sticky gli input di tipo password poichè di default essi non lo sono*/
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
	if(!empty($_POST) && $_POST["submit"]=="Iscriviti"){
		if(email_exist($email)){
			$alert = "<p class='alert'>"."<strong><br/>Email $email già esistente. Riprova</strong>"."</p>";
		}
		else{
			//ORA posso inserire il nuovo utente nel db
			if(insert_utente($nome, $cognome, $pass, $email, $genere, $nazione, $regione, $citta, $via, $civico, $numero)){
					$alert = "<p class='alert'>"."<strong><br/>Utente registrato con successo.</strong>"."</p>";
					session_start();
					$_SESSION["loggato"] = True;
					$_SESSION["email"] = $email;
					header("refresh:0.3;URL=./area_riservata.php");
			}
			else{
				$alert = "<p class='alert'>"."<strong><br/>Errore durante la registrazione. Riprova</strong>"."</p>";
			}
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<base href="http://localhost/progetto/FlyingSauce-r-/">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="./registrati/registrati.css">
	<script type="text/javascript">
			function validaModulo(form){
				//non effettuo controlli se i campi sono pieni poichè ho esplicitato con html la parola required
				if (form.pass.value != form.repassword.value) {					//controllo se password e conferma coincidono
					alert("Le due password non corrispondono");
					form.pass.focus();
					form.pass.select();
					return false;
				}else{			//se coincidono procedo a controllare se la password rispetta i canoni
					password = form.pass.value;
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
<body>
<?php require "../base/navSimple.php"; ?>
<div class="fullbody">
	<div class="container">
		<div class="leftpanel">
			<div class="content">
				<h3>Esplora la cucina italiana con Flying Sauce!</h3>
					<p>Iscriviti per gustare la pasta stellata e scoprire i sapori
						genuini dell'Italia.
					</p>
			</div>
		<img src="media/reg_img.jpg" alt="registrati_img">
		</div>
		<form action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="post" onSubmit="return validaModulo(this)">
		<h2>Sign-up</h2>
			<fieldset>
				<legend>Dati Personali</legend>
				<div class="input-container">
					<input class="input-field" name="nome" placeholder="Nome*" value="<?php echo $nome ?>" required/>
					<input class="input-field" name="cognome" placeholder="Cognome*" value="<?php echo $cognome ?>" required/>
					<input class="input-field" name="numero" placeholder="Numero telefonico" type="tel" pattern="[0-9]{10}" value="<?php echo $numero ?>"/>
					<input class="input-field" name="email" type="email" placeholder="E-mail*" value="<?php echo $email ?>" required/>
					<input class="input-field" name="pass" type="password" placeholder="Password*" required/>
					<input class="input-field" name="repassword" type="password" placeholder="Conferma password*" required/>
				</div>
				<div id="gender-radio">
					<legend>Genere:</legend>
					<label for="male-field">
						<input name="genere" type="radio" id="male-field" value="M" <?php if($genere == 'M') echo 'checked';?>/><span>Uomo</span>
					</label>
					<label for="female-field">
						<input name="genere" type="radio" id="female-field" value="F" <?php if($genere == 'F') echo 'checked';?>/><span>Donna</span>
					</label>
					<label for="noGender-field">
						<input name="genere" type="radio" id="noGender-field" value="" <?php if($genere == '') echo 'checked';?>/><span>Non specificato</span>
					</label>
				</div>
			</fieldset>
			<fieldset>
				<legend>Indirizzo</legend>
				<div class="input-container">
					<input class="input-field" name="nazione" placeholder="Nazione*" value="<?php echo $nazione ?>" required/>
					<input class="input-field" name="citta" placeholder="Città*" value="<?php echo $citta ?>" required/>
					<input class="input-field" name="via" placeholder="Via o piazza*" value="<?php echo $via ?>" required/>
					<input type="number" class="input-field" name="civico" placeholder="Numero civico*" min="1" value="<?php echo $civico ?>" required/>
				</div>
			</fieldset>
			<input id="submit" name="submit" type="submit" value="Iscriviti"/>
			<p id="info" style="text-align: center;">
				Cliccando su Iscriviti, accetti le nostre <a href="crea%20account/informative/condizioni.php">Condizioni</a>. Scopri in che modo
				raccogliamo, usiamo e condividiamo i tuoi dati nella nostra <a href="crea%20account/informative/infoPrivacy.php">Informativa
				sulla privacy</a>.
				<br/>Fai già parte della nostra famiglia? <a href="accedi/accedi.php">Accedi ora</a>
			</p>
				<?php
					if(isset($alert))
						echo $alert;
				?>
		</form>
	</div>
</div>
<?php require "../base/footer.php"; ?>
</body>
</html>

<?php
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
