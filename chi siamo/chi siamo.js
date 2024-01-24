// Queste funzioni servono per modificare l'immagine nel momento in cui il cursore vi passa sopra e ne esce
function overImg1() {
  document.getElementById("img1").src = "../media/gridImg1_hover.jpg";
}
function leaveImg1() {
  document.getElementById("img1").src = "../media/gridImg1.jpg";
}

function overImg2() {
  document.getElementById("img2").src = "../media/gridImg2_hover.jpg";
}
function leaveImg2() {
  document.getElementById("img2").src = "../media/gridImg2.jpg";
}

function overImg3() {
  document.getElementById("img3").src = "../media/gridImg3_hover.jpg";
}
function leaveImg3() {
  document.getElementById("img3").src = "../media/gridImg3.jpg";
}

function overImg4() {
  document.getElementById("img4").src = "../media/gridImg4_hover.jpg";
}
function leaveImg4() {
  document.getElementById("img4").src = "../media/gridImg4.jpg";
}

document.addEventListener("DOMContentLoaded", function () {
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