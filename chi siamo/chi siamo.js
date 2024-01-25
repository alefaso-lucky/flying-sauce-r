// Le seguenti funzioni servono per gestire lo slideshow automatico
document.addEventListener("DOMContentLoaded", function () { // il listner serve per poter utilizzare le funzioni nel momento in cui la pagina è caricata completamente
  // Funzioni per slideshow automatico
  let slideIndex = 0;
  showSlides();

  // Questa funzione si occupa di scorrere le slide automaticamente
  function showSlides() {

    let slides = document.getElementsByClassName("slide"); // recupero un array contenete le slide

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.opacity = 0; // tutte le slide sono invisibili
    }

    slideIndex++; // aggiorno l'indice di slide da mostrare
    if (slideIndex > slides.length) {
      slideIndex = 1;
    }
    slides[slideIndex - 1].style.opacity = 1; // la slide corrente è visibile
    slides[slideIndex - 1].style.animation = "fade 2s"; // la slide diventa visibile con l'animazione "fade" definita in CSS

    // ora devo fare in modo che il pulsante relativo alla slide visualizzata sia evidenziato
    let dots = document.querySelectorAll(".dots label"); // prendo l'array di tutti i pulsanti
    for (let i = 0; i < dots.length; i++) {
      if (i == slideIndex - 1)
        dots[i].style.opacity = 1; // se è quello relativo alla slide visualizzata allora diventa piè evidente
      else
        dots[i].style.opacity = 0.7; // altrimenti è più sfocato
    }

    setTimeout(showSlides, 5000); // cambia slide ogni 5 secondi
  }

});
