<!DOCTYPE HTML>
<html>
	<head>
		<title>crea un nuovo account</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../base/generic.css">
		<link rel="stylesheet" href="creaAccount.css">
	</head>
	<body>
		<form action="#" method="post" id="main-form">
				<h1>CREA UN NUOVO ACCOUNT</h1>
				<fieldset>
                	<legend>Informazioni di Accesso</legend>
					<input class="e-mail-field insert" name="e-mail" type="email" placeholder="e-Mail" required/>
					<input class="password-field insert" name="Password" type="password" placeholder="Password"/>
					<input class="password-field insert" name="Password" type="password" placeholder="Conferma password"/>
				</fieldset>
				<fieldset>
                	<legend>Dati Personali</legend>
					<input class="name-field insert" name="name" placeholder="Nome" required/>
					<input class="name-field insert" name="surname" placeholder="Cognome"/>
					Genere:
					<label for="male-field">
						<input id="male-field" name="sesso" type="radio" checked/>Uomo
					</label>
					<label for="female-field">
						<input id="female-field" name="sesso" type="radio"/>Donna
					</label>
					<label for="noGender-field">
						<input id="noGender-field" name="sesso" type="radio"/>Non specificato
					</label>
					<label for="data-field">
						Data di nascita:<input id="data-field" name="data" type="date">
					</label>
				</fieldset>
				<fieldset>
					<legend>Indirizzo</legend>
					<input class="indirizzo-field insert" name="nation" placeholder="Nazione"/>
					<input class="indirizzo-field insert" name="region" placeholder="Regione"/>
					<input class="indirizzo-field insert" name="city" placeholder="Città"/>
					<input class="indirizzoSpec-field insert" name="street" placeholder="Via o piazza"/>
					<input class="indirizzoSpec-field insert" name="number" placeholder="Numero civico"/>
				</fieldset>
			<p id="informativa">
            Cliccando su Iscriviti, accetti le nostre <a href="./informative/condizioni.php">Condizioni</a>. Scopri in che modo
            raccogliamo, usiamo e condividiamo i tuoi dati nella nostra <a href="./informative/infoPrivacy.php">Informativa
            sulla privacy</a>. Potresti ricevere notifiche tramite e-Mail da noi.
			</p>
			<div>
				<input class="submit-field" name="submit" type="submit" value="Iscriviti"/>
			</div>
		</form>
	</body>
</html>
