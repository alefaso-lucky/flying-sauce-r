function validaModulo(form){
    //non effettuo controlli se i campi sono pieni poichè ho esplicitato con html la parola required
    if (form.pass.value != form.repassword.value) {					//controllo se password e conferma coincidono
        alert("Le due password non corrispondono");
        form.pass.focus();
        form.pass.select();
        return false;
    }else{
        validatePassword();
    }
}

function validatePassword() {
    password = document.getElementById("psw").value;
    // Almeno 8 caratteri, una lettera maiuscola, un numero e un simbolo speciale
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=\+{};:,<\.>]).{8,}$/;
    if(passwordRegex.test(password) == false){
      alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.");
      return false;
    }
    return true;
}