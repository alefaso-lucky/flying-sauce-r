<!DOCTYPE html>
<?php
	/* variabili per rendere sticky i form presenti nella pagina */
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

		/* variabile get resa sticky utilizzata per determinare se visualizzare "accedi" oppure "registrati" */
    if(isset($_GET['accedi']))
        $accedi = $_GET['accedi'];
    else
        $accedi = "true";

    if(!empty($_POST)){
				// si entra nell'if seguente se è stato compilato il form per registrare un nuovo utente
        if(isset($_POST["iscriviti"]) && $_POST["iscriviti"]=="Iscriviti"){
						// controllo della validità della mail inserita, estrae il dominio dalla mail e controlla che sia valido verficando con il metodo checkdnsrr()
            $dominio = mb_substr($_POST['email'], mb_strpos($_POST['email'], "@")+1);
            if(checkdnsrr($dominio, "MX")){
								// se il dominio è valido controlla se l'email sia già associata ad un utente registrato
                if(email_exist($email)){
										// se l'email è già associata ad un utente allora aggiorna la variabile $alert con un testo che sarà utilizzato per notificare l'errore
                    $alert = "<span class='alert'>"."<strong>Email $email già esistente. Riprova</strong>"."</span>";
                }
                else{
                    // ORA posso inserire il nuovo utente nel db utilizzando la funzione insert_utente (definita in fondo al documento)
                    if(insert_utente($nome, $cognome, $pass, $email, $genere, $nazione, $citta, $via, $civico, $numero)){
												/* se l'inserimento è andato a buon fine allora inizia una sessione, e imposta la variabile di sessione loggato
												 	ed email, successivamente viene visualizzata la pagina dell'area riservata */
                        session_start();
                        $_SESSION["loggato"] = True;
                        $_SESSION["email"] = $email;
                        header("refresh:0.1;URL=./area_riservata/profilo.php");
                    }
                    else{
												// se l'inserimento dell'utente non è andato a buon fine sarà notificato l'errore
                        $alert = "<span class='alert'>"."<strong>Errore durante la registrazione. Riprova</strong>"."</span>";
                    }
                }
            }
            else{
								// se il dominio della mail inserita non è valido sarà notificato l'errore
                $alert = "<span class='alert'>"."<strong>Dominio inesistente.</strong>"."</span>";
            }
        }

				// se si entra nell'if swguente allora è stato compilato il form per il login
        if(isset($_POST["login"]) && $_POST["login"]=="Login") {
						// controllo della validità della mail inserita, estrae il dominio dalla mail e controlla che sia valido verficando con il metodo checkdnsrr
            $dominio=mb_substr($_POST['email'], mb_strpos($_POST['email'], "@")+1);
            if(checkdnsrr($dominio, "MX")){
								// se il dominio è valido procede verificando che la password inserita corretta
                $password = $_POST['password'];
								// ottiene dal db l'hash memorizzato corrispondente alla email inserita
                $hash = get_pwd($email);
                if(!$hash){
										// in caso di errore viene notificato
                    $alert = "<span class='alert'>"."<strong>L'utente associato all'email $email non esiste.</strong>"."</span>";
                }
                else{
										// verifica che l password inserita dall'utente sia corretta utilizzando password_verify() che confronta la password insrita e l'hash della password presente nel db associata alla email
                    if(password_verify($password, $hash)){
												// nel caso in cui la password sia corretta allora il login è effettuato, dunque inizia la sessione e vengono impostate delle variabili di sessione che memorizzano lo stato dell'utente
                        session_start();
                        $_SESSION["loggato"] = True;
                        $_SESSION["email"] = $email;
												// riporta all'area riservata
                        header("refresh:0.01;URL=./area_riservata/profilo.php");
                    }
                    else{
												// in caso di email o password errati viene notificato l'errore
                        $alert = "<span class='alert'>"."<strong>L'indirizzo email o la password che hai inserito non sono corretti. </strong>"."</span>";
                    }
                }
            }
            else{
								// in caso di email errata viene notificato l'erroer
                $alert = "<span class='alert'>"."<strong>Dominio inesistente.</strong>"."</span>";
            }
        }
    }

		/* Questa pagina contiene in realtà due "corpi", associati a due differenti css, uno il login dell'utente e uno per la registrazione di un nuovo utente.
		 Per visualizzare uno o l'altro è stata utilizzato un parametro dell'URL nominato 'accedi' aggiornato tramite query string (?accedi=).
		 Per implementare questo comportamento sono stati creati dei form, che utilizzano il metodo get, per impostare il valore delle variabili
		 "switch_iscriviti" e "switch_accedi" utilizzate per aggiornare il parametro accedi */
    if(isset($_GET["switch_iscriviti"]) && $_GET["switch_iscriviti"] == "Iscriviti ora"){
				// si entra in questo if se è stato premuto l'input submit per visualizzare il form di iscrizione, in questo caso accedi è impostato a false
        $accedi = false;
        header("refresh:0;URL=./account.php?accedi=false");
    }
    if(isset($_GET["switch_accedi"]) && $_GET["switch_accedi"] == "Accedi ora"){
				// si entra in questo if se è stato premuto l'input submit per visualizzare il form di login, in questo caso accedi è impostato a true
        $accedi = true;
        header("refresh:0;URL=./account.php?accedi=true");
    }
?>

<html>
<head>
    <!--obbligatorie per ogni pagina prodotta-->
	<meta charset="utf-8">
    <title>Flying Sauce&reg; - Autenticazione</title>
    <meta name="author" content="Gruppo08">
    <meta name="description" content="Visualizzazione delle sezioni di accesso e registrazione">
    <meta name="keywords" content="pasta, droni, Italia, cucina italiana, FlyingSauce, spaghetti">
    <link rel="icon" href="./media/favicon.ico" type="image/x-icon">
    <!--fine parte obbligatoria-->
	<base href="http://localhost/Flying_Sauce_r/">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="membership/validazioneInput.js"></script>
</head>
<body>
		<!-- richiede la navbar -->
    <?php include "../base/navFINITA.php"; ?>
    <div class="fullbody">
				<!-- se la variabile accedi è impostata a true allora visualizza il corpo per il login utente -->
        <?php if($accedi=='true') {?>
						<!-- style sheet per il login  -->
            <link rel="stylesheet" href="membership/accedi.css">
						<!-- il div seguente contieiene due pannelli: uno sinistro che conterrà un'immagine e un testp; uno desgtro che conterà il form di login -->
            <div class="container">
								<!-- pannello di sinistra -->
                <div class="leftpanel">
                    <div class="content">
                        <h1>Accedi e vola con FlyingSauce!</h1>
                        <p>Entra nel cielo della pasta da asporto di FlyingSauce
                            per gustare la comodità della consegna tramite droni,
                            portando la freschezza dei nostri piatti direttamente sulla tua tavola!
                        </p>
                    </div>
                <img src="media/accedi_img.jpg" alt="accedi_img" width="1500px">
                </div>
								<!-- pannello di destra che contiene il form di login -->
                <div class="rightpanel">
                    <h2>Member Login</h2>
										<!-- si noti come il form di login abbia nell'action una query string che aggiorna il valore del parametro 'accedi'.
									 		Si noti inoltre che al submit del form viene chiamato il metodo validatePassword() che validerà il corretto formato della passwordinserita -->
                    <form action="<?php echo $_SERVER["PHP_SELF"] . "?accedi=" . $accedi; ?>" onSubmit="return validatePassword(password.value);" method="post"> <!-- form sticky -->
												<!-- div che contiene un'icona e un input field per l'email -->
												<div class="input-field">
                            <span><img src="media/email_icon.png" width="20px" height="20px"></span>
                            <input type="email" name="email" placeholder="Email" required value="<?php echo $email; ?>"><br/>
                        </div>
												<!-- div che contiene un'icona e un input fiel per la password -->
                        <div class="input-field">
                            <span><img src="media/pass_icon.png" width="20px" height="20px"></span>
                            <input type="password" id ="psw" name="password" placeholder="Password">
                        </div>
												<!-- al submit del form viene aggiornata la varaibile login che sarà controllata da della logica per l'accesso -->
                        <input type="submit" id="login" name="login" value="Login">
                    </form>
										<!-- il seguente paragrafo si trova al di sotto del form di login -->
                    <p id="iscriviti">Non sei ancora iscritto?</p>
										<!-- il seguente form è utilizzato per cambiare visualizzazione della pagina e passare al form di registrazione,
									 		ciò viene effettuato aggiornanto il valore della variabile "switch_iscriviti" che aggiornerà il parametro 'accedi' -->
                    <form action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="get">
                        <input type="hidden" name="accedi" value="<?php echo $accedi; ?>">
                        <input type="submit" name="switch_iscriviti" value="Iscriviti ora" id="switch_button">
                    </form>
										<!-- qui verrà visualizzata la notifica di errore in caso di errore -->
                    <?php
                        if(isset($alert))
                            echo "$alert";
                    ?>
                </div>
            </div>
        <?php
        }
        else { ?>
					<!-- se la variabilea accedi è false allora visualizza il corpo per la registrazione dell'utente -->
            <link rel="stylesheet" href="membership/registrati.css">
						<!--  il div seguente contieiene due pannelli: uno sinistro che conterrà un'immagine e un testp; uno desgtro che conterà il form di registrazione -->
            <div class="container">
								<!-- pannello di sinistra -->
                <div class="leftpanel">
                    <div class="content">
                        <h1>Esplora la cucina italiana con Flying Sauce!</h1>
                            <p>Iscriviti per gustare la pasta stellata e scoprire i sapori
                                genuini dell'Italia.
                            </p>
                    </div>
                <img src="media/reg_img.jpg" alt="registrati_img" width="1500px">
                </div>
								<!-- pannello di destra che contiene il form di login -->
                <div class="rightpanel">
                    <h2>Sign-up</h2>
										<!-- si noti come il form di registrazione abbia nell'action una query string che aggiorna il valore del parametro 'accedi'
											Si noti inoltre che al submit del form viene chiamato il metodo validatePassword() che validerà il corretto formato della passwordinserita -->
                    <form action="<?php echo $_SERVER["PHP_SELF"] . "?accedi=" . $accedi; ?>" method="post" onSubmit="return validaModulo(this)"> <!-- form sticky -->
												<!-- il form di registrazione è diviso in diversi campi (fieldset), uno per categoria di informazioni -->
												<!-- il primo fieldset è per l'anagrafica -->
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
												<!-- il secondo fieldset è per l'indirizzo di spedizione -->
                        <fieldset>
                            <legend>Indirizzo</legend>
                            <div class="input-container">
                                <input class="input-field" name="nazione" placeholder="Nazione*" value="<?php echo $nazione ?>" required/>
                                <input class="input-field" name="citta" placeholder="Città*" value="<?php echo $citta ?>" required/>
                                <input class="input-field" name="via" placeholder="Via o piazza*" value="<?php echo $via ?>" required/>
                                <input type="number" class="input-field" name="civico" placeholder="Numero civico*" min="1" value="<?php echo $civico ?>" required/>
                            </div>
                        </fieldset>
												<!-- al submit del form viene aggiornata la variabile 'iscriviti' che sarà utilizzata per la logica di iscrizione del nuovo utente -->
                        <input id="submit" name="iscriviti" type="submit" value="Iscriviti"/>
												<!-- disclaimer per l'informativa sulla privacy -->
                        <p style="text-align: center;">
                            Cliccando su Iscriviti, accetti le nostre <a href="informative/condizioni.php">Condizioni</a>. Scopri in che modo
                            raccogliamo, usiamo e condividiamo i tuoi dati nella nostra <a href="informative/infoPrivacy.php">Informativa
                            sulla privacy</a>.<br/>Ti sei già seduto alla nostra tavola?
                        </p>
                    </form>
										<!-- il seguene form è utilizzato per cambiare visualizzazione della pagina e passare al form di login,
											ciò viene effettuato aggiornanto il valore della variabile "switch_accedi" che aggiornerà il parametro 'accedi' -->
                    <form action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="get">
                        <input type="hidden" name="accedi" value="<?php echo $accedi; ?>">
                        <input type="submit" name="switch_accedi" value="Accedi ora" id="switch_button">
                    </form>
										<!-- qui verrà visualizzata la notifica di errore in caso di errore -->
                    <?php
                        if(isset($alert))
                            echo "$alert";
                    ?>
                </div>
            </div>
        <?php }?>
    </div>
    <?php include "../base/footer.php"; ?>
    </body>
</html>

<?php
		// questa funzione ottiene l'hash della password associata all'email passata come parametro
    function get_pwd($email){
	      //CONNESSIONE AL DB
        require "../connessionedb.php";
				// query per ottenere l'hash
        $sql = "SELECT password FROM utenti WHERE email=$1;";
        $prep = pg_prepare($db, "sqlPassword", $sql);
        $ret = pg_execute($db, "sqlPassword", array($email));
        if(!$ret) {
            //echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false;
        }else{
            if ($row = pg_fetch_assoc($ret)){
								// in caso di successo restituisce l'hash
                $pass = $row['password'];
                pg_close($db);
                return $pass;
            }else{
								// in caso di fallimento restituisfe false
                pg_close($db);
                return false;
            }
        }
    }

		// questa funzione verifica se l'email passsata è già associata ad un account nel db
    function email_exist($email){
			//CONNESSIONE AL DB
        require "../connessionedb.php";

				// query per verificare se esiste la mail nel db
        $sql = "SELECT email FROM utenti WHERE email=$1";
        $prep = pg_prepare($db, "sqlEmail", $sql);
        $ret = pg_execute($db, "sqlEmail", array($email));
        if(!$ret) {
            //echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false;
        }
        else{
            if ($row = pg_fetch_assoc($ret)){
								// nel caso in cui la mail passta sia associata ad un utente restituisce true
                pg_close($db);
                return true;
            }
            else{
								// nel caso in cui la mail passata non sia associata ad un utente restituisce false
                pg_close($db);
                return false;
            }
        }
    }

		// questa funzione inserisce un nuovo utente nel db
    function insert_utente($nome, $cognome, $pass, $email, $genere, $nazione, $citta, $via, $civico, $numero){
        require "../connessionedb.php";
				// esegue l'hash della password
        $hash = password_hash($pass, PASSWORD_DEFAULT);
				// script per inserire tutte le informazioni dell'utente 
        $sql = "INSERT INTO utenti(nome, cognome, password, email, genere, nazione, citta, via, civico, telefono) VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)";
        $prep = pg_prepare($db, "insertUser", $sql);
        $ret = pg_execute($db, "insertUser", array($nome, $cognome, $hash, $email, $genere, $nazione, $citta, $via, $civico, $numero));
        if(!$ret) {
            //echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false;
        }
        else{
            pg_close($db);
            return true;
        }
    }
?>
