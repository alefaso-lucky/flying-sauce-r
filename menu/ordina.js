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
            //updateList(xmlhttp);
        });
    });

    const removerElements = document.querySelectorAll('.remover');
    removerElements.forEach(function(listItemButton) {
        listItemButton.addEventListener('click', function() {
            const listItem = listItemButton.outerHTML;
            const piatto_to_remove = listItem.textContent;
            // piatto_to_remove funzionerà? qua dentro c'è veramente la stringa interna a <li>
            //if the dish quantity is more than one then we must update the entry in the database, otherwise
            //it would be the case to removerlo.
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