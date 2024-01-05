var c = document.getElementById("piattoComposto"); /* prende la reference al Canvas per mezzo dell'ID */
var myImg = new Image(597, 618); /* crea un nuovo oggetto immagine di dimensioni pari al Canvas */
myImg.src = "media/sfondoComponi.PNG"; /* imposta la src dell'immagine */
myImg.onload = function() { /* si assicura che l'immagine venga caricata prima di disegnarla sul Canvas */
    c.getContext('2d').drawImage(myImg, 0,0); /* disegna l'immagine sul Canvas, questa è l'immagine che fa da sfondo al Canvas */
}

/**
 * Questa funzione disegna l'immagine indicata da name alle coordinate indicate sul Canvas
 * identificato dall'ID piattoComposto.
 * Questa funzione è chiamata con argomenti diversi da ogni radio button distinto sulla pagina Componi Piatto.
 * @param {string} name - il path dell'immagine da disegnare
 * @param {number} xcoordinate - le coordinate sull'asse x alle quali bisogna disegnare l'immagine
 * @param {number} ycoordinate - le coordinate sull'asse y alle quali bisogna disegnare l'immagine
 */
function printImage(name, xcoordinate, ycoordinate) {
    var c = document.getElementById("piattoComposto"); /* prende la reference al Canvas per mezzo dell'ID */
    var myImg = new Image(597, 618); /* crea un nuovo oggetto immagine della dimensione desiderata */
    myImg.src = "media/" + name; /* imposta la src dell'immagine */
    myImg.onload = function() { /* si assicura che l'immagine venga caricata prima di disegnarla sul Canvas */
        c.getContext('2d').drawImage(myImg, xcoordinate, ycoordinate); /* disegna l'immagine desiderata sul Canvas alle coordinate desiderate*/
    }
}