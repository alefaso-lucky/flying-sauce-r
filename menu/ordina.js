document.addEventListener('DOMContentLoaded', function () {
    const cartList = document.getElementById('cart-list');

    const adderElements = document.querySelectorAll('.adder');
    adderElements.forEach(function (clickPiatto) {
        clickPiatto.addEventListener('click', function () {

            const name = clickPiatto.getAttribute("name");
    
            //richiesta AJAX per aggiungere elemento al database
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.open('POST', 'menu/updateCart.php', true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // la chiamata al metodo setRequestHeader è necessaria in caso si usi POST
            xmlhttp.onload = function () { //onload quindi quando readyState è 4
                if(xmlhttp.status === 200)
                    cartList.innerHTML = xmlhttp.responseText;
            };
            var stringa = "name_piatto=" + name;
            xmlhttp.send(stringa);
        });
    });

    const removerElements = document.querySelectorAll('.remover');
    removerElements.forEach(function(listItemButton) {
        listItemButton.addEventListener('click', function() {
            const listItem = listItemButton.parentNode;
            var piatto_to_remove = listItem.textContent;
            piatto_to_remove = piatto_to_remove.substring(3, piatto_to_remove.length);
            
            //chiamata AJAX per rimuovere il piatto
            const xmlhttpd = new XMLHttpRequest();
            xmlhttpd.open('POST', 'menu/updateCart.php', true);
            xmlhttpd.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // la chiamata al metodo setRequestHeader è necessaria in caso si usi POST
            xmlhttpd.onload = function () { //onload quindi quando readyState è 4
                if(xmlhttpd.status === 200)
                    cartList.innerHTML = xmlhttpd.responseText;
            };
            var stringa = "name_piatto=" + piatto_to_remove + "&delete=" + true;
            xmlhttpd.send(stringa);
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