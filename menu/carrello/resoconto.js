document.addEventListener('DOMContentLoaded', function () {
    sezione = 1;
})

function cambiaSezione(direzione) {
    if(sezione == 1) {
        if(direzione == '+') {
            document.getElementById("sezione1");
            sezione = 2;
        }
        else {
            window.location = "menu/ordina.php"; 
        }
    }
    else {
        if(direzione == '+') {
            console.log("ciao2");
            sezione = 3;
        }
        else {
            sezione = 1;
        }
    }
}