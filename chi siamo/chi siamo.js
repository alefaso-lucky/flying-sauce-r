/* windows.onload viene eseguito quando l'intera pagina è stata caricata, compresi elementi esterni come immagini, video e fogli di stile.
  In questo caso dunque è necessario per visualizzare la prima slide; DOMContenLoaded non funzionerebbe dato che attende solo il caricamento della pagina HTML/PHP */
window.onload = function () {
  // chiamata alla funzione showSlide per visualizzare la prima slide al caricamento della pagina
  showSlide(1);
};

// Questa funzione è chiamata ogni volta che viene selezionata una slide per visualizzarla 
function showSlide(slideIndex) {

  let slides = document.getElementsByClassName("slide"); // recupero un array contenete le slide

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; // tutte le slide sono invisibili
  }
  slides[slideIndex - 1].style.display = "block"; // la slide selezionata è visibile

  // ora devo fare in modo che il pulsante relativo alla slide visualizzata sia evidenziato
  let dots = document.querySelectorAll(".dots label"); // prendo l'array di tutti i pulsanti
  for (let i = 0; i < dots.length; i++) {
    if (i == slideIndex - 1)
      dots[i].style.opacity = 1; // se è quello relativo alla slide visualizzata allora diventa piè evidente
    else
      dots[i].style.opacity = 0.7; // altrimenti è più sfocato
  }
}
// quando la pagina viene caricata mostro la prima slide
