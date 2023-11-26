<!DOCTYPE html>
<?php 
if(isset($_POST['email'])){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $sottoparti=explode('@', $_POST['email']);
        if(checkdnsrr(end($sottoparti), "MX"))
            $emailValida=true;
        else
            $emailValida=false;
    }
    else
        $emailValida=false;
}
?>
<html>
	<head>
        <title>login</title>
		<meta charset="utf-8"/>
    </head>
    <body>
        <h1>ACCESSO</h1>
        <form action="pagina2.php" method="post">
            <p>
				<label for="email-field">
					<input id="email-field" name="email" type="email" required placeholder="e-Mail"/>
				</label>
		    </p>
            <p>
                <input id="password" name="password" type="password" placeholder="Password"/>
                <br/>			
                <a href="#">Password dimenticata?</a>
                <br/>	
                <a href="./pagina2.php"><input id="submit-field" name="submit" type="submit" value="ACCEDI"/></a>
            </p>
        </form>
        <p>
            Non sei ancora iscritto?<a href="#">Iscriviti ora</a>
        </p>  
    </body>
</html>
