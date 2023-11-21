<!DOCTYPE HTML>
<html>
	<head>
		<title>crea un nuovo account</title>
	</head>
	<body>
		<h1>CREA UN NUOVO ACCOUNT</h1>
		<form action="#" method="post" id="main-form">
				<p>
					<input id="name-field" name="name" placeholder="Nome"/>
					<input id="surname-field" name="surname" placeholder="Cognome"/>
				</p>
                <p>
                    <input id="e-mail-field" name="e-mail" type="email" placeholder="e-Mail" required/>
                </p>
				<p>
					<input id="Password-field" name="Password" type="password" placeholder="Password"/>
                    <input id="Password-field" name="Password" type="password" placeholder="Conferma password"/>
				</p>
                <fieldset>
                <legend>Dati personali</legend>
				<p>
					Genere:
					<label for="male-field">
						<input id="male-field" name="sesso" type="radio" checked/>M
					</label>
					<label for="female-field">
						<input id="female-field" name="sesso" type="radio"/>F
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
                    <input id="Nation-field" name="nation" placeholder="Nazione"/>
                </p>
                <p>
                    <input id="Region-field" name="region" placeholder="Regione"/>
                </p>
                <p>
                    <input id="City-field" name="city" placeholder="Città"/>
				</p>
                <p>
                    <input id="Steet-field" name="street" placeholder="Via o piazza"/>
				</p>
                <p>
                    <input id="Number-field" name="number" placeholder="Numero civico"/>
				</p>
			</fieldset>

			<p>
            Cliccando su Iscriviti, accetti le nostre <a href="#">Condizioni</a>. Scopri in che modo
            raccogliamo, usiamo e condividiamo i tuoi dati nella nostra <a href="./infoPrivacy.php">Informativa
            sulla privacy</a> e in che modo usiamo cookie e tecnologie simili nella nostra 
            <a href="#">Normativa sui cookie</a>. Potresti ricevere notifiche tramite SMS da noi, ma
            puoi disattivarle in qualsiasi momento.
			</p>
			<p>
				<input id="submit-field" name="submit" type="submit" value="Iscriviti"/>
			</p>
		</form>
	</body>
</html>
