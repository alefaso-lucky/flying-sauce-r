/* con l'aggiunta di un eventListener che attende l'evento DOMContentLoaded si assicura che il codice in questione
venga eseguito solo quando il contenuto del DOM è completamente caricato e disponibile*/
document.addEventListener('DOMContentLoaded', function () {
    const cartList = document.getElementById('cart-list'); /* cartList contiene la reference alla ul che contiene il carrello */

    /* adderElements contiene la reference ad una lista di tutti gli elementi che fanno parte della classe adder */
    const adderElements = document.querySelectorAll('.adder');
    /* per ogni elemento della lista viene eseguita una funzione */
    adderElements.forEach(function (clickPiatto) {
        /* la funzione aggiunge all'elemento un eventListener per l'evento 'click' */
        clickPiatto.addEventListener('click', function () {
            /* l'evento 'click' provoca l'esecuzione di una funzione che tramite AJAX aggiorna il carrello 
            visibile all'utente senza il bisogno di ricaricare la pagina */

            const name = clickPiatto.getAttribute("name"); /* il nome del piatto è il valore del suo attributo name */
    
            //richiesta AJAX per aggiungere elemento al database
            const xmlhttp = new XMLHttpRequest(); /*  */
            xmlhttp.open('POST', 'menu/ordina_ora.php', true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // la chiamata al metodo setRequestHeader è necessaria in caso si usi POST
            xmlhttp.onload = function () { //onload quindi quando readyState è 4
                if(xmlhttp.status === 200) {
                    if(xmlhttp.responseText == "NOT LOGGED") {
                        window.location = "membership/account.php"; 
                    }
                    else {
                        cartList.innerHTML = xmlhttp.responseText;
                        addListenerToRemovers();
                    }
                }
            };
            var stringa = "name_piatto=" + name + "&update_cart=" + true;
            xmlhttp.send(stringa);
        });
    });

    addListenerToRemovers();
    function addListenerToRemovers() {
        const removerElements = document.querySelectorAll('.remover');
        removerElements.forEach(function(listItemButton) {
            listItemButton.addEventListener('click', function() {
                const listItem = listItemButton.parentNode;
                var piatto_to_remove = listItem.textContent;
                var number_of_characters_to_ignore = 3;
                if(!isNaN(piatto_to_remove[1]))
                    number_of_characters_to_ignore = 4;
                piatto_to_remove = piatto_to_remove.substring(number_of_characters_to_ignore, piatto_to_remove.length);
                //chiamata AJAX per rimuovere il piatto
                const xmlhttpd = new XMLHttpRequest();
                xmlhttpd.open('POST', 'menu/ordina_ora.php', true);
                xmlhttpd.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // la chiamata al metodo setRequestHeader è necessaria in caso si usi POST
                xmlhttpd.onload = function () { //onload quindi quando readyState è 4
                    if(xmlhttpd.status === 200) {
                        if(xmlhttpd.responseText == "NOT LOGGED") {
                            window.location = "membership/account.php"; 
                        }
                        else {
                            cartList.innerHTML = xmlhttpd.responseText;
                            addListenerToRemovers(); //dopo aver cambiato il contenuto della lista bisogna riaggiungere i listener a tutti i bottoni
                        }
                    }
                };
                var stringa = "name_piatto=" + piatto_to_remove + "&delete=" + true + "&update_cart=" + true;
                xmlhttpd.send(stringa);
            });
        });
    }
});
/*
function updateList(xmlhttp) {
    const cartList = document.getElementById('cart-list');
    xmlhttp.onreadystatechange = checkForDone;
    function checkForDone() {
        if(xmlhttp.readyState == 4)
            cartList.innerHTML = xmlhttp.responseText;
    }
}*/