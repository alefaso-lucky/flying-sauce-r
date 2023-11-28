<!DOCTYPE HTML>
<html>
	<head>
		<title>crea un nuovo account</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="creaAccount.css">
		<link rel="stylesheet" href="../base/generic.css">
	</head>
	<body>
		<form action="#" method="post" id="main-form">
				<h1>CREA UN NUOVO ACCOUNT</h1>
				<p>
					<input class="name-field insert" name="name" placeholder="Nome" required/>
					<input class="name-field insert" name="surname" placeholder="Cognome"/>
				</p>
                <p>
                    <input id="e-mail-field insert" name="e-mail" type="email" placeholder="e-Mail" required/>
                </p>
				<p>
					<input class="password-field insert" name="Password" type="password" placeholder="Password"/>
                    <input class="password-field insert" name="Password" type="password" placeholder="Conferma password"/>
				</p>
                <fieldset>
                <legend>Dati personali</legend>
					<p>
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
					</p>
					<p>
						<label for="data-field">
							Data di nascita:<input id="data-field" name="data" type="date">
						</label>
					</p>
				</fieldset>
				<fieldset>
				<legend>Indirizzo</legend>
					<p>
						<input class="indirizzo-field insert" name="nation" placeholder="Nazione"/>
						<input class="indirizzo-field insert" name="region" placeholder="Regione"/>
						<input class="indirizzo-field insert" name="city" placeholder="Città"/>
					</p>
					<p>
						<input class="indirizzoSpec-field insert" name="street" placeholder="Via o piazza"/>
						<input class="indirizzoSpec-field insert" name="number" placeholder="Numero civico"/>
					</p>
				</fieldset>
			<p id="informativa">
            Cliccando su Iscriviti, accetti le nostre <a href="#">Condizioni</a>. Scopri in che modo
            raccogliamo, usiamo e condividiamo i tuoi dati nella nostra <a href="./informative/infoPrivacy.php">Informativa
            sulla privacy</a> e in che modo usiamo cookie e tecnologie simili nella nostra 
            <a href="#">Normativa sui cookie</a>. Potresti ricevere notifiche tramite SMS da noi, ma
            puoi disattivarle in qualsiasi momento.
			</p>
			<div>
				<input class="submit-field" name="submit" type="submit" value="Iscriviti"/>
			</div>
		</form>
	</body>
</html>
