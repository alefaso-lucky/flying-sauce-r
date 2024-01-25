<meta charset="UTF-8">
<!-- questo link usato al posto di definire le immagini per carrello e login -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="./navFINITA.css">
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
    <img src="../media/logo.png" alt="logo img" width="200px">
    <a href="#" id="hamb" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <!-- nav: elemento destinato solo ai blocchi principali di collegamenti di navigazione. -->
  <nav class="topnav" id="myNav">
    <a href="#home">Home</a>
    <a href="#ordina">Ordina</a>
    <a href="#fantasie">Fantasie</a>
    <a href="#chi_siamo">Chi siamo</a>
    <div class="nav-right">
      <a href="#">Login <i class="fa fa-user-circle-o"></i></a>
      <a href="#"><i class="fa fa-shopping-cart"></i></a>
    </div>
  </nav>
</header>
