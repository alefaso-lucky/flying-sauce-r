<meta charset="UTF-8">
<!-- questo link usato al posto di definire le immagini per carrello e login -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<base href="http://localhost/Flying_Sauce_r/"> <!--fa partire tutte le href del documento da questa base-->
<link rel="stylesheet" href="./base/navFINITA.css">
<script type="text/javascript">
  function myFunction() {
    var nav = document.getElementById("myNav");
    if (nav.className === "topnav") {
      nav.className += " responsive";
    } else {
      nav.className = "topnav";
    }
  }
</script>
<!-- il tag header può essere usato per contenere il logo o un insieme di collegamenti di navigazione. -->
<header>
  <div class="important-elem">
    <img src="./media/logo.png" alt="logo img" width="200px">
    <span id="hamb" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </span>
  </div>
  <!-- nav: elemento destinato solo ai blocchi principali di collegamenti di navigazione. -->
  <nav class="topnav" id="myNav">
    <a href="nhome.php">Home</a>
    <a href="menu/ordina_ora.php">Ordina</a>
    <a href="#fantasie">Fantasie</a>
    <a href="#chi_siamo">Chi siamo</a>
    <div class="nav-right">
      <?php
        if (session_id() == "") {
          session_start();
        }  
        if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
          $logged = $_SESSION['loggato'];
          $email_user = $_SESSION['email'];
          $nav_name = $email_user;
          $nav_name_anchor = "membership/area_riservata/profilo.php";
        }
        else {
            $logged = false;
            $email_user = "";
            $nav_name = "Login";
            $nav_name_anchor = "membership/account.php";
        }
      ?>
      <a href="<?php echo $nav_name_anchor ?>"><?php echo $nav_name ?> <i class="fa fa-user-circle-o"></i></a>
      <a href="carrello/resoconto.php"><i class="fa fa-shopping-cart"></i></a>
    </div>
  </nav>
</header>
