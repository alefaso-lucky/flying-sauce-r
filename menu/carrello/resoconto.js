document.addEventListener('DOMContentLoaded', function () {
    sezione = 1;
})

function cambiaSezione(direzione) {
    if(sezione == 1) {
        if(direzione == '+') {
            sezione = 2;
            document.getElementById("sezione1").style.display = "none";
            document.getElementById("sezione2").style.display = "inline-block";
            document.getElementById("titolo-sezione1").style.visibility = "hidden";
            document.getElementById("titolo-sezione2").style.visibility = "visible";
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
            document.getElementById("titolo-sezione2").style.visibility = "hidden";
            document.getElementById("titolo-sezione3").style.visibility = "visible";
            document.getElementById("bottoni").style.display = "none";
            document.getElementById("final_button").style.display = "inline-block";
        }
        else {
            sezione = 1;
            document.getElementById("sezione1").style.display = "inline-block";
            document.getElementById("sezione2").style.display = "none";
            document.getElementById("titolo-sezione1").style.visibility = "visible";
            document.getElementById("titolo-sezione2").style.visibility = "hidden";
        }
    }
}