<!DOCTYPE html>
<html>
    <head>
        <title>Componi il tuo piatto</title>
        <link rel="stylesheet" href="./compPiattosimple.css" type="text/css">
    </head>
    <body>
        <div id="contenitore">
            <form action="#" method="post" id="form_grid">
                    <span id="quantita" class="name_of_options">Quantità</span>
                    <label for="piccolo-field" id="piccolo_opt" class="options options_left">
                        <input id="piccolo-field" name="quantita" type="radio"/>Piccolo(60g)
                    </label>
                    <label for="medio-field" id="medio_opt" class="options">
                        <input id="medio-field" name="quantita" type="radio"/>Medio(90g)
                    </label>
                    <label for="Grande-field" id="grande_opt" class="options options_right">
                        <input id="Grande-field" name="quantita" type="radio"/>Grande(130g)
                    </label>
                    
                    <span id="pasta" class="name_of_options">Pasta</span>
                    <label for="ravioli-field" id="ravioli_opt" class="options options_left">
                        <input id="ravioli-field" name="pasta" type="radio"/>Ravioli
                    </label>
                    <label for="tagliatelle-field" id="tagliatelle_opt" class="options">
                        <input id="tagliatelle-field" name="pasta" type="radio"/>Tagliatelle
                    </label>
                    <label for="orecchiette-field" id="orecchiette_opt" class="options options_right">
                        <input id="orecchiette-field" name="pasta" type="radio"/>Orecchiette
                    </label>

                    <span id="sugo" class="name_of_options">Sugo</span>
                    <label for="pomodoro-field" id="pomodoro_opt" class="options options_left">
                        <input id="pomodoro-field" name="sugo" type="radio"/>Sugo
                    </label>
                    <label for="panna-field" id="panna_opt" class="options">
                        <input id="panna-field" name="sugo" type="radio"/>Panna
                    </label>
                    <label for="pesto-field" id="pesto_opt" class="options options_right">
                        <input id="pesto-field" name="sugo" type="radio"/>Pesto
                    </label>
                    
                    <span id="topping" class="name_of_options">Topping</span>
                    <label for="guanciale-field" id="guanciale_opt" class="options options_left">
                        <input id="guanciale-field" name="topping" type="radio"/>Guanciale
                    </label>
                    <label for="avocado-field" id="avocado_opt" class="options">
                        <input id="avocado-field" name="topping" type="radio"/>Avocado
                    </label>
                    <label for="noci-field" id="noci_opt" class="options options_right">
                        <input id="noci-field" name="topping" type="radio"/>Noci
                    </label>
            </form>
        </div>
    </body>

</html>