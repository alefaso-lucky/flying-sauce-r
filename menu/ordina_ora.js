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
                if(xmlhttp.status === 200) {
                    if(xmlhttp.responseText == "NOT LOGGED") {
                        window.location = "accedi/accediSimple.php"; 
                    }
                    else {
                        cartList.innerHTML = xmlhttp.responseText;
                        addListenerToRemovers();
                    }
                }
            };
            var stringa = "name_piatto=" + name;
            xmlhttp.send(stringa);
        });
    });

    addListenerToRemovers();
    function addListenerToRemovers() {
        const removerElements = document.querySelectorAll('.remover');
        removerElements.forEach(function(listItemButton) {
            listItemButton.addEventListener('click', function() {
                const listItem = listItemButton.parentNode;
                var piatto_to_remove = listItem.textContent;
                var number_of_characters_to_ignore = 3;
                if(!isNaN(piatto_to_remove[1]))
                    number_of_characters_to_ignore = 4;
                piatto_to_remove = piatto_to_remove.substring(number_of_characters_to_ignore, piatto_to_remove.length);
                //chiamata AJAX per rimuovere il piatto
                const xmlhttpd = new XMLHttpRequest();
                xmlhttpd.open('POST', 'menu/updateCart.php', true);
                xmlhttpd.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // la chiamata al metodo setRequestHeader è necessaria in caso si usi POST
                xmlhttpd.onload = function () { //onload quindi quando readyState è 4
                    if(xmlhttpd.status === 200) {
                        if(xmlhttpd.responseText == "NOT LOGGED") {
                            window.location = "accedi/accediSimple.php"; 
                        }
                        else {
                            cartList.innerHTML = xmlhttpd.responseText;
                            addListenerToRemovers(); //dopo aver cambiato il contenuto della lista bisogna riaggiungere i listener a tutti i bottoni
                        }
                    }
                };
                var stringa = "name_piatto=" + piatto_to_remove + "&delete=" + true;
                xmlhttpd.send(stringa);
            });
        });
    }
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