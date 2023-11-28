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
        <link rel="stylesheet" href="accedi.css"/>
        <link rel="stylesheet" href="generic.css">
    </head>
    <body>
        <div class="dati">
            <h1 id="accesso">ACCESSO</h1>

            <form action="pagina2.php" method="post">
                <p>
					<input class="insert" name="email" type="email" required placeholder="e-Mail" accesskey="m"/>
		        </p>
                <p>
                    <input class="insert" name="password" type="password" placeholder="Password" accesskey="p"/>
                    <br/>			
                    <a href="#">Password dimenticata?</a>
                    <br/>	
                    <input class="submit-field" name="submit" type="submit" value="ACCEDI" accesskey="s"/>
                </p>
            </form>

            <p>
            Non sei ancora iscritto? <a href="#">Iscriviti ora</a>
            </p>  
            
        </div>
    </body>
</html>
