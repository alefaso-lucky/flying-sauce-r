var c = document.getElementById("piattoComposto");
var myImg = new Image(597, 618);
myImg.src = "media/sfondoComponi.PNG";
myImg.onload = function() {
    c.getContext('2d').drawImage(myImg, 0,0);
}

function printQuantita(name) {
    var c = document.getElementById("piattoComposto");
    var myImg = new Image(597, 618);
    myImg.src = "media/" + name;
    myImg.onload = function() {
        c.getContext('2d').drawImage(myImg, 205, 460);
    }
}