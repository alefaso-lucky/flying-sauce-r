/**
 * Questa funzione viene chiamata quando viene inviato il form
 * @param {object} form è il form di cui validare i dati inseriti 
 * @returns true se la pasword e la repassword coincidono e rispettano i canoni specificati, false altrimenti
 */
function validaModulo(form){
    //non effettuo controlli se i campi sono pieni poichè ho esplicitato con html la parola required
    if (form.pass.value != form.repassword.value) {					//controllo se password e conferma coincidono
        alert("Le due password non corrispondono");
        form.pass.focus();
        form.pass.select();
        return false;
    }else{
        // se la password inserita e la sua ripetizione coincidono allora si controlla la sua validità
        return validatePassword(form.pass.value);
    }
}

/**
 * Quetsa funzione controlal che la password rispetti i canoni specificati
 * @param {string} password è la password inserita nel form
 * @returns true se la password rispetta i canoni
 */
function validatePassword(password) {
    // Almeno 8 caratteri, una lettera maiuscola, un numero e un simbolo speciale
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=\+{};:,<\.>]).{8,}$/;
    if(passwordRegex.test(password) == false){
      alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.");
      return false;
    }
    return true;
}