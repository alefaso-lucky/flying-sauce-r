document.addEventListener("DOMContentLoaded", function () { // il listner serve per poter utilizzare le funzioni nel momento in cui la pagina è caricata completamente
  // Funzioni per slideshow automatico
  let slideIndex = 0;
  showSlides();

  // Questa funzione si occupa di scorrere le slide automaticamente
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

});
