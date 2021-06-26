function checkName(event) {

    const input = event.currentTarget;
    
    if (formStatus[input.name] = input.value.length > 0) {

        input.parentNode.parentNode.classList.remove('errorj');

    } else {

        input.parentNode.parentNode.classList.add('errorj');
    
    }  

    checkForm();
}

/*Aggiunge o rimuove una classe di errore all'elemento username */
function jsonCheckUsername(json) {
if (formStatus.username =! json.exists) { 

    document.querySelector('.username1').classList.remove('errorj');

} else {

    document.querySelector('.username1 span').textContent = "Nome utente già utilizzato";
    document.querySelector('.username1').classList.add('errorj');
}
     checkForm();
}


function jsonCheckEmail(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email =! json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
    checkForm();
}


function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}


function checkUsername(event) {

    const input = document.querySelector('.username1 input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) { 
        input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15"; 
        input.parentNode.parentNode.classList.add('errorj');
        formStatus.username = false;
        checkForm();
    } else {   

        fetch(route('registrazione', input.value)).then(fetchResponse).then(jsonCheckUsername);
        
    }    
}


function checkEmail(event) {
    
    const emailInput = document.querySelector('.email input');

    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;
        checkForm();
    } else {

        fetch(route('email', emailInput.value.toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}


function checkPassword(event) {

    const passwordInput = document.querySelector('.password1 input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password1').classList.remove('errorj');
    } else {
        document.querySelector('.password1').classList.add('errorj');
    }
    checkForm();
}


function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password1 input').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
    }
    checkForm();
}

function clickSelectFile(event) {
    upload_original.click();
}


function checkUpload(event) {
    
    const upload_original = document.getElementById('upload_original');
    
    document.querySelector('#upload .file_name').textContent = upload_original.files[0].name;
    
    const o_size = upload_original.files[0].size;
    const mb_size = o_size / 1000000;
    
    document.querySelector('#upload .file_size').textContent = mb_size.toFixed(2) + " MB";
   
    const ext = upload_original.files[0].name.split('.').pop();
   
    if (o_size >= 7000000) {
        document.querySelector('.fileupload span').textContent = "Le dimensioni del file superano 7 MB";
        document.querySelector('.fileupload').classList.add('errorj');
        formStatus.upload = false;
    } else if (!['jpeg', 'jpg', 'png', 'gif'].includes(ext)) {
        document.querySelector('.fileupload span').textContent = "Le estensioni consentite sono .jpeg, .jpg, .png e .gif";
        document.querySelector('.fileupload').classList.add('errorj');
        formStatus.upload = false;
    } else {
        document.querySelector('.fileupload').classList.remove('errorj');
        formStatus.upload = true;
    }

    checkForm();
}


function checkForm() {
console.log(formStatus);
    // Controlla consenso dati personali
    document.querySelector('#submit').disabled = !document.querySelector('.allow input').checked || 
    // Controlla che tutti i campi siano pieni
    Object.keys(formStatus).length !== 7 || 
    // Controlla che i campi non siano false
    Object.values(formStatus).includes(false);

}

const formStatus = {'upload': true};

checkForm();

document.querySelector('.name input').addEventListener('blur', checkName); // BLUR smetto di scrivere in quel campo e poi clicco al di fuori
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username1 input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password1 input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);
document.querySelector('#upload').addEventListener('click', clickSelectFile);
document.querySelector('#upload_original').addEventListener('change', checkUpload);
document.querySelector('.allow input').addEventListener('change', checkForm);


if (document.querySelector('.error') !== null){

    checkUsername();
    checkPassword();
    checkConfirmPassword(); 
    checkEmail();

    document.querySelector('.name input').dispatchEvent(new Event('blur'));
    document.querySelector('.surname input').dispatchEvent(new Event('blur'));

}