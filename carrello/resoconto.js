/* al caricamento del DOM viene impostata una variabile chiamata sezione a 1, questa variabile indica se siamo nella prima, seconda o terza sezione del carrello */
document.addEventListener('DOMContentLoaded', function () {
    sezione = 1;
});

/**
 * Questa funzione viene invocata al click dei tasti di navigazione del carrello, il tasto per avanti le passa il 
 * carattere '+', il tasto per tornare indietro il carattere '-'
 * @param {character} direzione - se direzione è '+' bisogna passare alla pagina successiva, viceversa se direzione è '-'
 */
function cambiaSezione(direzione) {
    /* il cambiamento di sezione dipende da in qualche sezione si trova attualmente l'utente, da cui l'if */
    if(sezione == 1) {
        if(direzione == '+') { /* dalla sezione 1 si desidera andare avanti */
            sezione = 2; /* viene aggiornato il valore di sezione */
            document.getElementById("sezione1").style.display = "none"; /* viene nascosta la sezione 1 */
            document.getElementById("sezione2").style.display = "flex"; /* viene mostrata la sezione 2 che deve essere un flex container */
            document.getElementById("titolo-sezione1").innerHTML = "&#x26AC;"; /* il titolo della sezione 1 viene trasformato in un pallino */
            document.getElementById("titolo-sezione2").innerText = "SPEDIZIONE"; /* il titolo della sezione 2 viene mostrato */
            document.getElementById("avanti").innerText = "FINALIZZA ORDINE"; /* il tasto AVANTI diventa il tasto FINALIZZA ORDINE */
        }
        else { /* se dalla sezione 1 l'utente chiede di tornare indietro viene portato al menu */
            window.location = "menu/ordina_ora.php";
        }
    }
    else {
        if(direzione == '+') { /* dalla sezione 2 si desidera finalizzare l'ordine */
            sezione = 3; /* viene aggiornato il valore di sezione */
            document.getElementById("sezione2").style.display = "none"; /* viene nascosta la sezione 2 */
            document.getElementById("sezione3").style.display = "flex"; /* viene mostrata la sezione 3 che deve essere un flex container */
            document.getElementById("titolo-sezione2").innerHTML = "&#x26AC;"; /* il titolo della sezione 2 viene trasformato in un pallino */
            document.getElementById("titolo-sezione3").innerText = "PAGAMENTO"; /* il titolo della sezione 3 viene mostrato */
            document.getElementById("bottoni").style.display = "none"; /* i tasti precedentemente disponibili scompaiono */
            document.getElementById("final_button").style.display = "inline-block"; /* viene mostrato un nuovo tasto per tornare al menu */

            finalizeOrder(); /* l'accesso alla sezione 3 comporta la finalizzazione dell'ordine che è effettuata da questa funzione */

        }
        else { /* dalla sezione 2 si desidera andare indietro */
            sezione = 1; /* viene aggiornato il valore di sezione */
            document.getElementById("sezione1").style.display = "inline-block"; /* viene mostrata la sezione 1 */
            document.getElementById("sezione2").style.display = "none"; /* viene nascosta la sezione 2 */
            document.getElementById("titolo-sezione1").innerText = "CARRELLO"; /* il titolo della sezione 1 viene mostrato */
            document.getElementById("titolo-sezione2").innerHTML = "&#x26AC;"; /* il titolo della sezione 2 viene trasformato in un pallino */
            document.getElementById("avanti").innerText = "AVANTI"; /* il tasto FINALIZZA ORDINE ridiventa il tasto AVANTI */
        }
    }

    function finalizeOrder() {
        /* richiesta AJAX per finalizzare l'ordine, come nel caso di ordina_ora.php e ordina_ora.js, lo script PHP che riceve la richiesta può essere 
        in una pagina qualsiasi e non necessariamente in resoconto.php, tuttavia per compattezza è stato integrato in resoconto.php */
        const xmlhttp = new XMLHttpRequest(); /* creazione dell'oggetto XMLHttpRequest */
        xmlhttp.open('POST', 'carrello/resoconto.php', true); /* specificazione della tipologia di richiesta al server e di chi riceverà la richiesta */
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); /* la chiamata al metodo setRequestHeader è necessaria in caso si usi POST */
        /* non è necessario che lo script JS modifichi la pagina al momento della risposta del server quindi non serve settare una funzione onload */

        /* a seconda di quale delle checkbox relative alla spedizione è selezionata bisogna impostare dei 
        parametri da spedire al server, nello specifico nome e prezzo della spedizione selezionata */
        if(document.getElementById("rbsx").checked) {
            var spedizione = "AVANZATA";
            var prezzo_spedizione = 1500;
        }
        else if(document.getElementById("rbcc").checked) {
            var spedizione = "LAMPO";
            var prezzo_spedizione = 3000;
        }
        else {
            var spedizione = "BASE";
            var prezzo_spedizione = 1000;
        }

        /* vengono impostati dei parametri da passare al server, un booleano che comunica a resoconto.php che è stato 
        invocato per rispondere ad una richiesta AJAX, il nome e il prezzo della spedizione */
        var stringa = "finalize_order=" + true + "&spedizione=" + spedizione + "&prezzo_spedizione=" + prezzo_spedizione;
        xmlhttp.send(stringa); /* viene inviata la richiesta AJAX con parametro stringa */
    }
}