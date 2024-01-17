document.addEventListener('DOMContentLoaded', function () {
    const adderElements = document.querySelectorAll('.adder');

    adderElements.forEach(function (clickPiatto){
        clickPiatto.addEventListener('click', function () {

            const name = clickPiatto.getAttribute("name");
    
            //richiesta AJAX per aggiungere elemento al database
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.open('POST', 'menu/updateCart.php', true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.onload = function () {
                if (xmlhttp.status === 200) {
                    console.log('Element added to the database!');
                }
            };
            var stringa = "name_piatto=" + name;
            xmlhttp.send(stringa);
        });
    });
});