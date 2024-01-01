<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <base href="http://localhost/Flying_Sauce_r/">
    <link rel="stylesheet" href="menu/ordina.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>

<body>
    <?php require "../base/navSimple.php"?>
    <div class="row">
        <div class="columnside sx">
            <h1>I nostri piatti</h1>

            <a href="menu/ordina.php/#classici" class="piatti">CLASSICI</a>
            <a href="menu/ordina.php/#rossi" class="piatti">ROSSI</a>
            <a href="menu/ordina.php/#bianchi" class="piatti">BIANCHI</a>
            <a href="menu/ordina.php/#mare" class="piatti">MARE</a>
            <a href="menu/ordina.php/#vegetariani" class="piatti">VEGETARIANI</a>
            <a href="menu/ordina.php/#vegani" class="piatti">VEGANI</a>

            <p class="domanda">
                Non hai trovato ciò che fa per te?
            </p>
            <a class="menu_buttons" href="componi%20piatto/cPiattoDef.php">COMPONI ORA IL TUO PIATTO</a>

            <!-- era equivalente, anzi anche più flessibile fare <button type="submit"> se magari volevi risaltare solo una parola nel bottone -->
        </div>
        <div class="content">
            <div class="scrollable_content">
                <?php
                    $host="localhost";
                    $db='GruppoXX';
                    $user="www";
                    $password="password";
                    $connection_string = "host=$host dbname=$db user=$user password=$password";
                    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error());
                    
                    $categories = array("Classici", "Rossi", "Bianchi", "Mare", "Vegetariani", "Vegani");
                    foreach( $categories as $curr_cat ) {
                        ?>
                        <h1 class="titolo" id="<?php echo strtolower($curr_cat); ?>"><?php echo $curr_cat; ?></h1>
                        <div class="categoria">

                        <?php
                        $sql = "SELECT nome, descrizione_breve, foto FROM menu WHERE categoria = '$curr_cat'";
                        $ret = pg_query($db, $sql);
                        
                        while( $row = pg_fetch_array($ret) ) {    
                            $nome = $row[0];
                            $descrizione_breve = $row[1];
                            $foto = $row[2];
                        ?>
                            <div class="primi">
                                <form action="menu/piatto_singolo/piatto.php" method="post" id="to_piatto_singolo">
                                    <button type="submit" id="info_button">
                                        <input type="hidden" name="name" value="<?=$nome?>">
                                        <img src="media/info_button" alt="info-dish" width="24px" height="24px"/>
                                    </button>
                                </form>
                                <a href="#">
                                    <img src="<?php echo $foto ?>" alt="piatto di pasta" width="230px">
                                    <div class="nomepiatto"><?php echo $nome ?></div>
                                    <?php echo $descrizione_breve ?>
                                </a>
                            </div>
                        <?php        
                        }
                        ?>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="columnside dx">
            <form action="componi">
                <input type="submit" value="VAI AL PAGAMENTO" name="pagamento" class="menu_buttons" />
            </form>
            <ul>
                <li>Spaghetti alla carbonara x2</li>
                <li>pasta alla norma x3</li>
            </ul>
        </div>
    </div>
    <?php
        require "../base/footer.php";
    ?>
</body>

</html>