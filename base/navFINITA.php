<!-- questo link è uno stylesheet esterno usato per definire le icone di carrello e login invece di utilizzare immagini apposite -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<base href="http://localhost/Flying_Sauce_r/"> <!--fa partire tutte le href del documento da questa base-->
<link rel="stylesheet" href="./base/navFINITA.css">
<script type="text/javascript">
  /* questa funzione viene chiamata quando si clicca sull'"hamburger" presente nella navbar, visibile solo sotto una certa dimensione della finestra.
    Permette di rendere la navbar responsiva facendo in modo che le varie voci appaiano o scompaiano con un click sull'hamburger. Per implementare
    questo comportamento viene aggiunto la classe di stile 'resposnive' al tag <nav> */
  function showElements() {
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
  <!-- questo div contiene il logo e il menù ad amburger -->
  <div class="important-elem">
    <img src="./media/logo.png" alt="logo img" width="200px">
    <span id="hamb" onclick="showElements()">
      <!-- le classi di stile 'fa' e 'fa-bars' fanno parte del foglio di stile esterno, permettono di rappresetare un "hamburger" -->
      <i class="fa fa-bars"></i>
    </span>
  </div>
  <!-- nav: elemento destinato solo ai blocchi principali di collegamenti di navigazione. -->
  <nav class="topnav" id="myNav">
    <!-- le varie voci della navbar, ognuna di esse porta alla pagina indicata -->
    <a href="homepage.php">Home</a>
    <a href="menu/ordina_ora.php">Ordina</a>
    <a href="menu/ordina_ora/componi_piatto.php">Componi</a>
    <a href="chi%20siamo/chi%20siamo.php">Chi siamo</a>
    <div class="nav-right">
      <?php
        // questo if serve per iniziare una sessione se non è ancora stato fatto
        if (session_id() == "") {
          session_start();
        }
        /* il seguente costrutto if-else è utilzzato per differenziare la visualizzazione della navbar a seconda che l'utente sia registrato o meno,
          se è regostrato allora l'utente visualizzera la mail associata al proprio account invece che l'invito ad accedere con la scritta 'Login'.
          Nelle due situazioni cliccando sulla mail o su login l'utente sarà reindirizzato rispettivamente all'area riservata o alla pagina per l'accesso. */
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
      <!-- questo link visualizza la mail o 'Login' nella navbar e il link a cui porta varia rispettando il comportamento descritto in orecedenza -->
      <a href="<?php echo $nav_name_anchor ?>"><?php echo $nav_name ?> <i class="fa fa-user-circle-o"></i></a>
      <!-- questo link visualizza l'icona del carrello, al click porta al carrello sassociato all'account -->
      <a href="carrello/resoconto.php"><i class="fa fa-shopping-cart"></i></a>
    </div>
  </nav>
</header>
