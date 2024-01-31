/* con l'aggiunta di un eventListener che attende l'evento DOMContentLoaded si assicura che il codice in questione
venga eseguito solo quando il contenuto del DOM è completamente caricato e disponibile*/
document.addEventListener('DOMContentLoaded', function () {
    const cartList = document.getElementById('cart-list'); /* cartList contiene la reference alla ul che contiene il carrello */

    const adderElements = document.querySelectorAll('.adder'); /* adderElements contiene la reference ad una lista di tutti gli elementi che fanno parte della classe adder */
    adderElements.forEach(function (clickPiatto) { /* per ogni elemento della lista viene eseguita una funzione */
        clickPiatto.addEventListener('click', function () { /* la funzione aggiunge all'elemento un eventListener per l'evento 'click' */
            /* l'evento 'click' provoca l'esecuzione di una funzione che tramite AJAX aggiorna il carrello 
            visibile all'utente senza il bisogno di ricaricare la pagina */

            const name = clickPiatto.getAttribute("name"); /* il nome del piatto è il valore del suo attributo name */
    
            /* richiesta AJAX per aggiungere elemento al database */
            const xmlhttp = new XMLHttpRequest(); /* creazione dell'oggetto XMLHttpRequest */
            xmlhttp.open('POST', 'menu/ordina_ora.php', true); /* specificazione della tipologia di richiesta al server e di chi riceverà la richiesta */
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); /* la chiamata al metodo setRequestHeader è necessaria in caso si usi POST */
            xmlhttp.onload = function () { /* onload quindi quando readyState è 4, la risposta è pronta, quindi deve essere eseguito del codice */
                if(xmlhttp.status === 200) { /* se lo status-number della request è 200 significa che tutto procede senza errori */
                    if(xmlhttp.responseText == "NOT LOGGED") { /* se la risposta del server è "NOT LOGGED" allora l'utente sta provando ad aggiungere prodotti al carrello senza aver fatto l'accesso */
                        window.location = "membership/account.php"; /* l'utente viene redirezionato alla pagina per effettuare il login o eventualmente registrarsi */
                    }
                    else {
                        cartList.innerHTML = xmlhttp.responseText; /* se l'utente è loggato allora la response text deve essere impostata come innerHTML dell'elemento ul che mostra il carrello */
                        addListenerToRemovers();/* l'aggiunta di item al carrello comporta la sostituzione di tutto il contenuto della lista con una copia aggiornata 
                        è quindi necessario riaggiungere i listener ai tasti per la rimozione degli items */
                    }
                }
            };
            /* i parametri da passare al server sono il nome del piatto interessato e un booleano che serve 
            alla pagina ricevente, ordina_ora.php, per sapere che deve elaborare una richiesta AJAX 
            in quanto ordina_ora.php contiene lo script PHP di elaborazione della richiesta AJAX ma questa non 
            è la sua unica funzione. Volendo la pagina ricevente poteva essere distinza da ordina_ora.php (originariamente era così) 
            e non ci sarebbe quindi stato bisogno di questo parametro ma per compattezza si è deciso di integrare le due pagine */
            var stringa = "name_piatto=" + name + "&update_cart=" + true;
            xmlhttp.send(stringa); /* viene inviata la richiesta AJAX con parametro stringa */
        });
    });

    addListenerToRemovers(); /* al caricamento del DOM bisogna aggiungere i listener ai tasti di rimozione degli items */

    function addListenerToRemovers() {
        const removerElements = document.querySelectorAll('.remover'); /* removerElements contiene la reference ad una lista di tutti gli elementi che fanno parte della classe remover */
        removerElements.forEach(function(listItemButton) { /* per ogni elemento della lista viene eseguita una funzione */
            listItemButton.addEventListener('click', function() { /* la funzione aggiunge all'elemento un eventListener per l'evento 'click' */
                /* l'evento 'click' provoca l'esecuzione di una funzione che tramite AJAX aggiorna il carrello 
                visibile all'utente senza il bisogno di ricaricare la pagina */

                const listItem = listItemButton.parentNode; /* il nodo genitore del tasto di rimozione è il list item che rappresenta una entry del carrello */
                var piatto_to_remove = listItem.textContent; /* dal list item viene prelevato il nome del piatto */
                var number_of_characters_to_ignore = 3; /* visto che prima del nome del piatto è specificata la quantità con il forma Nx bisogna ignorare i primi 3 caratteri */
                if(!isNaN(piatto_to_remove[1])) /* se il secondo carattere del list item è un numero allora la 'quantita' è a due cifre e bisogna ignorare i primi 4 caratteri invece che i primi 3 */
                    number_of_characters_to_ignore = 4;
                piatto_to_remove = piatto_to_remove.substring(number_of_characters_to_ignore, piatto_to_remove.length);
                
                /* richiesta AJAX per rimuovere il piatto molte righe sono non commentate in quanto equivalenti a codice già descritto 
                per quanto riguarda l'aggiunta degli eventListener agli adderElements*/
                const xmlhttpd = new XMLHttpRequest();
                xmlhttpd.open('POST', 'menu/ordina_ora.php', true);
                xmlhttpd.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlhttpd.onload = function () {
                    if(xmlhttpd.status === 200) {
                        if(xmlhttpd.responseText == "NOT LOGGED") {
                            window.location = "membership/account.php"; 
                        }
                        else {
                            cartList.innerHTML = xmlhttpd.responseText;
                            addListenerToRemovers();
                        }
                    }
                };
                /* oltre ai parametri passati anche dalla richiesta di aggiunta piatto bisogna passare al server 
                un booleano che specifica che la richiesta è di eliminazione di una istanza del piatto */
                var stringa = "name_piatto=" + piatto_to_remove + "&delete=" + true + "&update_cart=" + true;
                xmlhttpd.send(stringa);
            });
        });
    }
});
