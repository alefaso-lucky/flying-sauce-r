<!DOCTYPE html>
<?php
if(isset($_POST['email']))
  $email = $_POST['email'];
else
  $email = "";

if(isset($_POST['password']))
  $password = $_POST['password'];
else
  $password = "";
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
  <?php require "./navSimple.php" ; ?>
  <div class="fullbody">
    <div class="container">
      <div class="panel">
        <div class="leftpanel">
          <div class="content">
            <h3>Accedi e vola con FlyingSauce!</h3>
              <p>Entra nel cielo della pasta da asporto di FlyingSauce
                per gustare la comodità della consegna tramite droni,
                portando la freschezza dei nostri piatti direttamente sulla tua tavola!
              </p>
          </div>
        <img src="accedi_img.jpg" alt="accedi_img">
        </div>
        <form action=<?php echo $_SERVER["PHP_SELF"] ; ?> onSubmit="return validatePassword();" method="post">
          <h2>Member Login</h2>
          <div class="input-field">
            <span class="fas fa-envelope"></span>
            <input type="email" name="email" placeholder="Email" required value="<?php echo $email; ?>"><br/>
          </div>
          <div class="input-field">
            <span class="fas fa-lock"></span>
            <input type="password" id ="psw" name="password" placeholder="Password" value="<?php echo $password; ?>"><br/>
          </div>
          <input type="submit" id="login" name="login" value="Login"><br/>
          <p id="iscriviti">Non sei ancora iscritto? <a href="">Iscriviti ora</a></p>
          <?php
            if(isset($_POST['email'])){
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $dominio=mb_substr($_POST['email'], mb_strpos($_POST['email'], "@")+1);
                    if(checkdnsrr($dominio, "MX"));
                    else{
                        $alert = "<span class='alert'>"."<strong><br/>Dominio inesistente.</strong>"."</span>";
                        echo "$alert";
                        header("refresh:2;URL=./accedi.php");
                    }
                }
            }

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
                $alert = "<span class='alert'>"."<strong><br/>L'indirizzo email o la password che hai inserito non sono corretti. </strong>"."</span>";
                echo "$alert";
              }

              pg_close($db);
            }
          ?>
      </form>
      </div>
    </div>
  </div>
  </body>
