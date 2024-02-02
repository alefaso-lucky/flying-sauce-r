/**
 * il listner serve per poter utilizzare le funzioni nel momento in cui la pagina
 *  è caricata completamente
 */
document.addEventListener("DOMContentLoaded", function () { 
  // Funzioni per slideshow automatico
  let slideIndex = 0;
  showSlides();

  /**
   * Questa funzione si occupa di scorrere le slide automaticamente
   */
  function showSlides() {

    let slides = document.getElementsByClassName("slide"); // recupero un array contenete le slide

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; // tutte le slide sono invisibili
    }

    slideIndex++; // aggiorno l'indice di slide da mostrare
    if (slideIndex > slides.length) {
      slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block"; // la slide corrente è visibile
    
    setTimeout(showSlides, 5000); // cambia slide ogni 10 secondi
  }
  
  var recIndex = 0;
  carousel();
  /**
   * funzione per gestire lo scorrimento delle recensioni della sezione 4
   */
  function carousel() {
    var i;
    var x = document.getElementsByClassName("recensioni");
    for (i = 0; i < x.length; i++) {/* pongo tutte le recensioni non visibili */
        x[i].style.display = "none";
    }
    recIndex++;
    if (recIndex > x.length) {recIndex = 1}/* normalizzo recIndex sul numero di recensioni */
    x[recIndex-1].style.display = "block"; /* rendo visibile una recensione */
    setTimeout(carousel, 4000); /*cambia recensione ogni 4 secondi*/
  }
});
