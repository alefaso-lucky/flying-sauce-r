<!DOCTYPE html>
<?php
if(isset($_POST['email'])){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $dominio=mb_substr($_POST['email'], mb_strpos($_POST['email'], "@")+1);
        if(checkdnsrr($dominio, "MX"));
        else{
            echo "Dominio $dominio non esistente";
            header("refresh:2;URL=./accedi.php");
        }
    }
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./accedi.css">
    <script language="javascript" type="text/javascript">
      function validatePassword() {
        password = document.getElementById("psw").value;
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
    <?php require "../base/navSimple.php"?>
    <section class= "background">
      <div class="content">
        <h2>Cibo veloce, gusto eccezionale: accedi e vola con FlyingSauce!</h2>
        <p>"Entra nel cielo della pasta da asporto di FlyingSauce: accedi subito
          per gustare la comodità della consegna tramite droni, portando la freschezza
          dei nostri piatti direttamente sulla tua tavola!"</p>
      </div>
      <div class="wrapper-login">
        <form class="" action=<?php echo $_SERVER["PHP_SELF"] ; ?> onSubmit="return validatePassword();" method="post">
            <h2>Member Login</h2>
            <div class="input-field">
              <span class="fas fa-envelope"></span>
              <input type="email" name="email" placeholder="Email" required value="<?php echo isset($_POST['email']) ?  $_POST['email'] : '' ; ?>"><br/>
            </div>
            <div class="input-field">
              <span class="fas fa-lock"></span>
              <input type="password" id ="psw" name="password" placeholder="Password" onblur="validatePassword()" value="<?php echo isset($_POST['password']) ?  $_POST['password'] : '' ; ?>"><br/>
            </div>
            <input type="submit" id="login" name="login" value="Login"><br/>
            <p class="register-link">Non sei ancora iscritto? <a href="">Iscriviti ora</a></p>
        </form>
      </div>
    </section>

    <?php
      if(!empty($_POST) && $_POST["login"]=="Login") {
        require_once "./logindb.php";
        $em = pg_escape_literal($_POST["email"]);
        $psw = pg_escape_literal($_POST["password"]);
        $sql = "SELECT * FROM utenti WHERE email=".$em."and password=".$psw;
        $ret = pg_query($db, $sql);

        if($row = pg_fetch_array($ret)) {
          session_start();
          $_SESSION["username"] = $row['username'];
          $_SESSION["loggato"] = True;
          header("refresh:0.01;URL=./area_riservata.php");
        }
        else {
          echo "<strong> L'indirizzo email o la password che hai inserito non sono corretti </strong>";
        }

        pg_close($db);
      }

    ?>

  </body>
