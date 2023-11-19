<!DOCTYPE html>
<html>
    <head>
        <title>Componi il tuo piatto</title>
        <link rel="stylesheet" href="./componiPiatto.css" type="text/css">
    </head>
    <body>
        <div id="contenitore">
            <form action="#" method="post">
                <p class="selettori">
                    Quantità<br/>
                    <label for="piccolo-field">
                        <input id="piccolo-field" name="quantita" type="radio"/>Piccolo(60g) 
                    </label>
                    <label for="medio-field">
                        <input id="medio-field" name="quantita" type="radio"/>Medio(90g)
                    </label>
                    <label for="Grande-field">
                        <input id="Grande-field" name="quantita" type="radio"/>Grande(130g)
                    </label>
                </p>
                <p class="selettori">
                    Pasta<br/>
                    <label for="ravioli-field">
                        <input id="ravioli-field" name="pasta" type="radio"/>Ravioli
                    </label>
                    <label for="tagliatelle-field">
                        <input id="tagliatelle-field" name="pasta" type="radio"/>Tagliatelle
                    </label>
                    <label for="orecchiette-field">
                        <input id="orecchiette-field" name="pasta" type="radio"/>Orecchiette
                    </label>
                </p>
                <p class="selettori">
                    Sugo<br/>
                    <label for="pomodoro-field">
                        <input id="pomodoro-field" name="sugo" type="radio"/>Sugo
                    </label>
                    <label for="panna-field">
                        <input id="panna-field" name="sugo" type="radio"/>Panna
                    </label>
                    <label for="pesto-field">
                        <input id="pesto-field" name="sugo" type="radio"/>Pesto
                    </label>
                </p>
                <p class="selettori">
                    Topping<br/>
                    <label for="guancia-field">
                        <input id="guanciale-field" name="topping" type="radio"/>Guanciale
                    </label>
                    <label for="avocado-field">
                        <input id="avocado-field" name="topping" type="radio"/>Avocado
                    </label>
                    <label for="noci-field">
                        <input id="noci-field" name="topping" type="radio"/>Noci
                    </label>
                </p>
                <p>
                    <input id="carrello" name="submit" type="submit" value="AGGIUNGI AL CARRELLO"/>
                    <a href="#" id="menu" name="menu">MENU'</a>
                </p>
            </form>
            <div id="foto">
                <div class="toppingFoto">
                    <img src="media/topping1" alt="topping guanciale" width="200"/>
                    <img src="media/topping2" alt="topping avocado" width="200"/>
                    <img src="media/topping3" alt="topping noci" width="200"/>
                </div>
                <div class="sugoFoto">
                    <img src="media/sugo1" alt="sugo pomodoro" width="200"/>
                    <img src="media/sugo2" alt="sugo panna" width="200"/>
                    <img src="media/sugo3" alt="sugo pesto" width="200"/>
                </div>
                <div class="pastaFoto">
                    <img src="media/pasta1" alt="pasta ravioli" width="200"/>
                    <img src="media/pasta2" alt="pasta tagliatelle" width="200"/>
                    <img src="media/pasta3" alt="pasta orecchiette" width="200"/>
                </div>
                <div class="quantitaFoto">
                    <img src="media/quantita1" alt="quantità piccolo(60g)" width="200"/>
                    <img src="media/quantita2" alt="quantità medio(90g)" width="200"/>
                    <img src="media/quantita3" alt="quantità grande(130g)" width="200"/>
                </div>
            </div>
        </div>
    </body>

</html>