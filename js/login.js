//  Developed by Fatemeh Barzegar and Se Wing Hunag


var formLogin = document.getElementById('loginForm');
var emailLogin = document.getElementById('emailID');
var passwordLogin = document.getElementById('passwordID');
// Create paragraph for displaying email warning
let logEmailError = document.createElement('p');
// Create paragraph for displaying password 1 warning
let logPasswordError = document.createElement('p');


// Creating an array to store all new input elements and apply a loop on them
// to set a warning class attribute and append the created element to the parent of email div
let errorElm = [logEmailError, logPasswordError];
errorElm.map((item, index) => {
    console.log(item);
    console.log(document.querySelectorAll('.textfield')[index]);
    if (document.querySelectorAll('.textfield')[index]) {
        item.setAttribute('class', 'warning');
        document.querySelectorAll('.textfield')[index].appendChild(item);
    }
});


// Define global variables
const defaultMsg = "";


// LOG IN VALIDATION ***


// validate log in form
function validateLogin(){
    let valid = true; // Global validation

    let logEmailValidation = logValidateEmail();
    if (logEmailValidation !== defaultMsg) {
        emailLogin.classList.add('boxWarning');
        logEmailError.textContent = logEmailValidation;
        valid = false;
    }

    let logPassValidation = logValidatePass();
    if (logPassValidation !== defaultMsg) {
        passwordLogin.classList.add('boxWarning');
        logPasswordError.textContent = logPassValidation;
        valid = false;
    
    }

    return valid;
}


// Validating email value
function logValidateEmail() {
    let emailInput = emailLogin.value;
    let regexp = /\S+@\S+\.\S+/;

    if (emailInput.trim().length > 0) {
        error = defaultMsg;
    } else {
        error = "\u2716 Email address should be non-empty with the format (xyx@xyz.xyz).";
    }
    return error;
} 


// Method to validate the password
function logValidatePass() {
    let password = passwordLogin.value;
    let regexp = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (password.trim().length > 0) {
        error = defaultMsg;
    } else {
        error = "\u2716 Your password should be at least 8 characters: 1 uppercase, 1 lowercase.";
    }
    return error;
}



// add event listner to the email if you entered correct email,the error paragraph with be empty
///******* */

emailLogin.addEventListener("blur", ()=>{ // arrow function
    let x=logValidateEmail();  

    if(x == defaultMsg){
       emailLogin.classList.remove('boxWarning');
        emailError.textContent = defaultMsg;
    }
});


// add event listner to the password if you entered correct password,the error paragraph with be empty


passwordLogin.addEventListener("blur", ()=>{ // arrow function
    let x=logValidatePass();

    if(x == defaultMsg){
        passwordLogin.classList.remove('boxWarning');
        passwordError.textContent = defaultMsg;
    }
});
