document.addEventListener('DOMContentLoaded', function () {
    const adderElements = document.querySelectorAll('.adder');
    const cartList = document.getElementById('cart-list');

    adderElements.forEach(function (clickPiatto) {
        clickPiatto.addEventListener('click', function () {

            const name = clickPiatto.getAttribute("name");
    
            //richiesta AJAX per aggiungere elemento al database
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.open('POST', 'menu/updateCart.php', true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // la chiamata al metodo setRequestHeader è necessatio in caso si usi POST
            xmlhttp.onload = function () {
                if (xmlhttp.status === 200)
                    cartList.innerHTML = xmlhttp.responseText;
            };
            var stringa = "name_piatto=" + name;
            xmlhttp.send(stringa);
            //updateList(xmlhttp);
        });
    });
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