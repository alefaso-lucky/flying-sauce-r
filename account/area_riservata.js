function switchDiv(visibleDiv){
    var specialDiv = document.getElementById(visibleDiv);
    var allSections = document.getElementsByClassName("sezione");
  
    for(var i=0; i< allSections.length; i++){
      allSections[i].style.display= "none";     /*rendo invisibili prima tutti i div che appartengono alla classe sezione*/
    }
    specialDiv.style.display= "block";    /*procedo poi a rendere nuovamente visibile il div che è stato selezionato*/
  
    coloreSelezionato(visibleDiv);      /*per rendere più particolare il colore della sezione in cui ti trovi*/
}
  
function coloreSelezionato(visibleDiv){
    var otherSel = document.getElementsByClassName('selezione');

    for(var i=0; i<otherSel.length; i++){
        otherSel[i].style.background= "#46666D";

        if(otherSel[i].id == "sel"+visibleDiv)
            otherSel[i].style.background="rgb(255, 174, 88)";
    }
}
  
function visibleForm(idVisible, idInvisible){
    document.getElementById(idInvisible).style.display = 'none';
    document.getElementById(idVisible).style.display = 'block';
}
  
function validaModulo_pass(form){
//non effettuo controlli se i campi sono pieni poichè ho esplicitato con html la parola required
    if (form.newpass.value != form.repassword.value) {					//controllo se password e conferma coincidono
        alert("Le due password non corrispondono");
        form.newpass.focus();
        form.newpass.select();
        return false;
    }else{			//se coincidono procedo a controllare se la password rispetta i canoni
        password = form.newpass.value;
        // Almeno 8 caratteri, una lettera maiuscola, un numero e un simbolo speciale
        const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=\+{};:,<\.>]).{8,}$/;
        if(passwordRegex.test(password) == false){
        alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.");
        return false;
        }
        return true;
    }
}

  