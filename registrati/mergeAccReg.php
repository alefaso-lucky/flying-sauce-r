<!DOCTYPE html>
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
    if(isset($_GET['accedi']))                  /*variabile get resa sticky*/ 
        $accedi = $_GET['accedi'];
    else
        $accedi = "true";
    if(!empty($_POST)){
        if(isset($_POST["iscriviti"]) && $_POST["iscriviti"]=="Iscriviti"){
            if(email_exist($email)){
                $alert = "<p class='alert'>"."<strong><br/>Email $email già esistente. Riprova</strong>"."</p>";
            }
            else{
                //ORA posso inserire il nuovo utente nel db
                if(insert_utente($nome, $cognome, $pass, $email, $genere, $nazione, $citta, $via, $civico, $numero)){
                        $alert = "<p class='alert'>"."<strong><br/>Utente registrato con successo.</strong>"."</p>";
                        session_start();
                        $_SESSION["loggato"] = True;
                        $_SESSION["email"] = $email;
                        header("refresh:0.3;URL=./account/area_riservata.php");
                }
                else{
                    $alert = "<p class='alert'>"."<strong><br/>Errore durante la registrazione. Riprova</strong>"."</p>";
                }
            }
        }

        if(isset($_POST["login"]) && $_POST["login"]=="Login") {
            $dominio=mb_substr($_POST['email'], mb_strpos($_POST['email'], "@")+1);
            if(checkdnsrr($dominio, "MX")){
                $password = $_POST['password'];
                $hash = get_pwd($email);
                if(!$hash){
                    $alert = "<span class='alert'>"."<strong><br/>L'utente associato all'email $email non esiste.</strong>"."</span>";
                    echo "$alert";
                }
                else{
                    if(password_verify($password, $hash)){
                        session_start();
                        $_SESSION["loggato"] = True;
                        $_SESSION["email"] = $email;
                        header("refresh:0.01;URL=./account/area_riservata.php");
                    }
                    else{
                        $alert = "<span class='alert'>"."<strong><br/>L'indirizzo email o la password che hai inserito non sono corretti. </strong>"."</span>";
                        echo "$alert";
                        }
                    }
            }
            else{
                $alert = "<span class='alert'>"."<strong><br/>Dominio inesistente.</strong>"."</span>";
                echo "$alert";
            }
        }
    }

    if(isset($_GET["switch_iscriviti"]) && $_GET["switch_iscriviti"] == "Iscriviti ora"){
        $accedi = false;
        header("refresh:0;URL=./mergeAccReg.php?accedi=false");
    }

    if(isset($_GET["switch_accedi"]) && $_GET["switch_accedi"] == "Accedi ora"){
        $accedi = true;
        header("refresh:0;URL=./mergeAccReg.php?accedi=true");
    }
?>

<html>
<head>
	<meta charset="utf-8">
	<base href="http://localhost/progetto/FlyingSauce-r-/">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="./registrati/validazioneInput.js"></script>
</head>
<body>
<?php require "../base/navSimple.php"; ?>
<div class="fullbody">
    <?php if($accedi=='true'){?>
        <link rel="stylesheet" href="./accedi/accedi.css">
        <div class="container">
            <div class="leftpanel">
                <div class="content">
                    <h3>Accedi e vola con FlyingSauce!</h3>
                    <p>Entra nel cielo della pasta da asporto di FlyingSauce
                        per gustare la comodità della consegna tramite droni,
                        portando la freschezza dei nostri piatti direttamente sulla tua tavola!
                    </p>
                </div>
            <img src="media/accedi_img.jpg" alt="accedi_img" width="1500px">
            </div>
            <div class="rightpanel">
                <h2>Member Login</h2>
                <form action=<?php echo $_SERVER["PHP_SELF"] ; ?> onSubmit="return validatePassword();" method="post">
                    <div class="input-field">
                        <span><img src="media/email_icon.png" width="20px" height="20px"></span>
                        <input type="email" name="email" placeholder="Email" required value="<?php echo $email; ?>"><br/>
                    </div>
                    <div class="input-field">
                        <span><img src="media/pass_icon.png" width="20px" height="20px"></span>
                        <input type="password" id ="psw" name="password" placeholder="Password"><br/>
                    </div>
                    <input type="submit" id="login" name="login" value="Login"><br/>
                </form>
                <p id="iscriviti">Non sei ancora iscritto? 
                <form action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="get">
                    <input type="hidden" name="accedi" value="<?php echo $accedi; ?>">
                    <input type="submit" name="switch_iscriviti" value="Iscriviti ora" id="switch_button">
                </form>
                </p>
                    <?php
                        if(isset($alert))
                            echo $alert;
                    ?>
                </p>
            </div>
        </div>
    <?php
    }else { ?>     
        <link rel="stylesheet" href="./registrati/registrati.css">
        <div class="container">
            <div class="leftpanel">
                <div class="content">
                    <h3>Esplora la cucina italiana con Flying Sauce!</h3>
                        <p>Iscriviti per gustare la pasta stellata e scoprire i sapori
                            genuini dell'Italia.
                        </p>
                </div>
            <img src="media/reg_img.jpg" alt="registrati_img" width="1500px">
            </div>
            <div class="rightpanel">
                <h2>Sign-up</h2>
                <form action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="post" onSubmit="return validaModulo(this)">
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
                    <input id="submit" name="iscriviti" type="iscriviti" value="Iscriviti"/>
                    <p style="text-align: center;">
                        Cliccando su Iscriviti, accetti le nostre <a href="crea%20account/informative/condizioni.php">Condizioni</a>. Scopri in che modo
                        raccogliamo, usiamo e condividiamo i tuoi dati nella nostra <a href="crea%20account/informative/infoPrivacy.php">Informativa
                        sulla privacy</a>.
                    </p>
                </form>
                <p>Fai già parte della nostra famiglia?
                    <form action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="get">
                        <input type="hidden" name="accedi" value="<?php echo $accedi; ?>">
                        <input type="submit" name="switch_accedi" value="Accedi ora" id="switch_button">
                    </form>
                    <?php
                        if(isset($alert))
                            echo $alert;
                    ?>
                </p>
            </div>
        </div>
    <?php }?>
</div>
<?php require "../base/footer.php"; ?>
</body>
</html>

<?php

function get_pwd($email){
    require ".\logindb.php";
    //CONNESSIONE AL DB
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
    $sql = "SELECT password FROM utenti WHERE email=$1;";
    $prep = pg_prepare($db, "sqlPassword", $sql);
    $ret = pg_execute($db, "sqlPassword", array($email));
    if(!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db);
        pg_close($db);
        return false;
    }else{
        if ($row = pg_fetch_assoc($ret)){
            $pass = $row['password'];
            pg_close($db);
            return $pass;
        }else{
            pg_close($db);
            return false;
        }
    }
}

function email_exist($email){
	require "./logindb.php";
	//CONNESSIONE AL DB
	$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
	$sql = "SELECT email FROM utenti WHERE email=$1";
	$prep = pg_prepare($db, "sqlEmail", $sql);
	$ret = pg_execute($db, "sqlEmail", array($email));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
        pg_close($db);
		return false;
	}
	else{
		if ($row = pg_fetch_assoc($ret)){
            pg_close($db);
			return true;
		}
		else{
            pg_close($db);
			return false;
		}
	}
}

function insert_utente($nome, $cognome, $pass, $email, $genere, $nazione, $citta, $via, $civico, $numero){
	require "./logindb.php";
	//CONNESSIONE AL DB
	$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO utenti(nome, cognome, password, email, genere, nazione, citta, via, civico, telefono) VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)";
	$prep = pg_prepare($db, "insertUser", $sql);
	$ret = pg_execute($db, "insertUser", array($nome, $cognome, $hash, $email, $genere, $nazione, $citta, $via, $civico, $numero));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
        pg_close($db);
		return false;
	}
	else{
        pg_close($db);
		return true;
	}
}
?>
