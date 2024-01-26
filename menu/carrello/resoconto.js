document.addEventListener('DOMContentLoaded', function () {
    sezione = 1;
});

function cambiaSezione(direzione) {
    if(sezione == 1) {
        if(direzione == '+') {
            sezione = 2;
            document.getElementById("sezione1").style.display = "none";
            document.getElementById("sezione2").style.display = "flex";
            document.getElementById("titolo-sezione1").innerHTML = "&#x26AC;";
            document.getElementById("titolo-sezione2").innerText = "SPEDIZIONE";
            document.getElementById("avanti").innerText = "FINALIZZA ORDINE";
        }
        else {
            window.location = "menu/ordina.php"; 
        }
    }
    else {
        if(direzione == '+') {
            sezione = 3;
            document.getElementById("sezione2").style.display = "none";
            document.getElementById("sezione3").style.display = "inline-block";
            document.getElementById("titolo-sezione2").innerHTML = "&#x26AC;";
            document.getElementById("titolo-sezione3").innerText = "PAGAMENTO";
            document.getElementById("bottoni").style.display = "none";
            document.getElementById("final_button").style.display = "inline-block";

            finalizeOrder();

        }
        else {
            sezione = 1;
            document.getElementById("sezione1").style.display = "inline-block";
            document.getElementById("sezione2").style.display = "none";
            document.getElementById("titolo-sezione1").innerText = "CARRELLO";
            document.getElementById("titolo-sezione2").innerHTML = "&#x26AC;";
            document.getElementById("avanti").innerText = "AVANTI";
        }
    }

    function finalizeOrder() {
        //richiesta AJAX per aggiungere elemento al database
        const xmlhttp = new XMLHttpRequest();
        console.log("ciao1");
        xmlhttp.open('POST', 'menu/carrello/resoconto.php', true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // la chiamata al metodo setRequestHeader è necessaria in caso si usi POST
        xmlhttp.onload = function () { //onload quindi quando readyState è 4
            if(xmlhttp.status === 200) {
                console.log(xmlhttp.responseText);
                if(xmlhttp.responseText == "Order placed") {
                    console.log("Nice");
                }
            }
        };
        var stringa = "finalize_order=" + true;
        xmlhttp.send(stringa);
    }
}