<!DOCTYPE html>
<html>
    <head>
        <title>Componi il tuo piatto</title>
        <link rel="stylesheet" href="./cPiattoDef.css" type="text/css">
        <base href="http://localhost/Flying_Sauce_r/">
        <meta charset="utf-8">
    </head>
    <body>
        <?php require '../base/navSimple.php'; ?>
        <div id="composizione">
            <div id="contenitore">
                <form action="#" method="post" id="form_grid">
                        <span id="quantita" class="name_of_options">Quantità</span>
                        <label for="piccolo-field" id="piccolo_opt" class="options options_left" onclick="printImage('quantita_1.png', 50, 442)">
                            <input id="piccolo-field" name="quantita" type="radio"/><span>Piccolo(60g)</span>
                        </label>
                        <label for="medio-field" id="medio_opt" class="options" onclick="printImage('quantita_2.png', 50, 442)">
                            <input id="medio-field" name="quantita" type="radio"/><span>Medio(90g)</span>
                        </label>
                        <label for="Grande-field" id="grande_opt" class="options options_right" onclick="printImage('quantita_3.png', 50, 442)">
                            <input id="Grande-field" name="quantita" type="radio"/><span>Grande(130g)</span>
                        </label>
                        
                        <span id="pasta" class="name_of_options">Pasta</span>
                        <label for="ravioli-field" id="ravioli_opt" class="options options_left" onclick="printImage('pasta_1.png', 50, 307)">
                            <input id="ravioli-field" name="pasta" type="radio"/><span>Ravioli</span>
                        </label>
                        <label for="tagliatelle-field" id="tagliatelle_opt" class="options" onclick="printImage('pasta_2.png', 50, 307)">
                            <input id="tagliatelle-field" name="pasta" type="radio"/><span>Tagliatelle</span>
                        </label>
                        <label for="orecchiette-field" id="orecchiette_opt" class="options options_right" onclick="printImage('pasta_3.png', 50, 307)">
                            <input id="orecchiette-field" name="pasta" type="radio"/><span>Orecchiette</span>
                        </label>

                        <span id="sugo" class="name_of_options">Sugo</span>
                        <label for="pomodoro-field" id="pomodoro_opt" class="options options_left" onclick="printImage('sugo_1.png', 50, 172)">
                            <input id="pomodoro-field" name="sugo" type="radio"/><span>Pomodoro</span>
                        </label>
                        <label for="panna-field" id="panna_opt" class="options" onclick="printImage('sugo_2.png', 50, 172)">
                            <input id="panna-field" name="sugo" type="radio"/><span>Panna</span>
                        </label>
                        <label for="pesto-field" id="pesto_opt" class="options options_right" onclick="printImage('sugo_3.png', 50, 172)">
                            <input id="pesto-field" name="sugo" type="radio"/><span>Pesto</span>
                        </label>
                        
                        <span id="topping" class="name_of_options">Topping</span>
                        <label for="guanciale-field" id="guanciale_opt" class="options options_left" onclick="printImage('topping_1.png', 50, 37)">
                            <input id="guanciale-field" name="topping" type="radio"/><span>Guanciale</span>
                        </label>
                        <label for="avocado-field" id="avocado_opt" class="options" onclick="printImage('topping_2.png', 50, 37)">
                            <input id="avocado-field" name="topping" type="radio"/><span>Avocado</span>
                        </label>
                        <label for="noci-field" id="noci_opt" class="options options_right" onclick="printImage('topping_3.png', 50, 37)">
                            <input id="noci-field" name="topping" type="radio"/><span>Noci</span>
                        </label>
                </form>
                <p id="bottoni">
                    <a href="menu/ordina.php/" id="menu" class="choice_buttons">VAI AL MENU</a>
                    <input id="carrello" class="choice_buttons" name="submit" type="submit" value="AGGIUNGI AL CARRELLO"/>
                </p>
            </div>
            <canvas id="piattoComposto" width="597px" height="618px" style="border:1px solid #d3d3d3;">canvas non disponibile su questo browser</canvas>
            <script type="text/javascript" src="componi%20piatto/cPiattoDef.js"></script>
        </div>
        <?php require "../base/footer.php"; ?>
    </body>

</html>