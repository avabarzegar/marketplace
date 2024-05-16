//  Developed by Fatemeh Barzegar and Se Wing Hunag

// Declaring Variables 
var form = document.getElementById('signupForm');
var email = document.getElementById('email');
var username = document.getElementById('userName');
var pass = document.getElementById('pass');
// Create paragraph for displaying email warning
let emailError = document.createElement('p');
// Create paragraph for displaying name warning
let nameError = document.createElement('p');
// Create paragraph for displaying password 1 warning
let passwordError = document.createElement('p');


// Creating an array to store all new input elements and apply a loop on them
// to set a warning class attribute and append the created element to the parent of email div
let errorElm = [nameError, emailError, passwordError];
errorElm.map((item, index) => {
  
    if (document.querySelectorAll('.textfield')[index]) {
        item.setAttribute('class', 'warning');
        document.querySelectorAll('.textfield')[index].appendChild(item);
    }
});

// Define global variables
const defaultMsg = "";

// SIGN UP VALIDATION ***

// validate sign up form
function validateSign() {
    let valid = true; // Global validation

    let emailValidation = validateEmail();
    if (emailValidation !== defaultMsg) {
        email.classList.add('boxWarning');
        emailError.textContent = emailValidation;
        valid = false;
    }

    let nameValidation = validateName();
    if (nameValidation !== defaultMsg) {
        username.classList.add('boxWarning');
        nameError.textContent = nameValidation;
        valid = false;
    }

    let passValidation = validatePassword();
    if (passValidation !== defaultMsg) {
        pass.classList.add('boxWarning');
        passwordError.textContent = passValidation;
        valid = false;
    }

    
    return valid;
}


// Validating email value

function validateEmail() {
    let emailInput = email.value;
    let regexp = /\S+@\S+\.\S+/;

    if (regexp.test(emailInput) && emailInput.trim().length > 0) {
        error = defaultMsg;
    } else {
        error = "\u2716 Email address should be non-empty with the format (xyx@xyz.xyz).";
    }
    return error;
} 

// Validating name value

function validateName() {
    let name = username.value.toLowerCase();
    let regexp = /^[a-z ,.'-]+$/i;

    if (regexp.test(name) && 0 < name.trim().length < 30) {
        error = defaultMsg;
    } else {
        error = "\u2716 User name should be non-empty and within 30 characters long";
    }
    return error;
}


// Method to validate the password

function validatePassword() {
    let password = pass.value;
    let regexp = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (regexp.test(password) && password.trim().length >= 8) {
        error = defaultMsg;
    } else {
        error = "\u2716 Your password should be at least 8 characters: 1 uppercase, 1 lowercase.";
    }
    return error;
}


// add event listner to the email if you entered correct email,the error paragraph with be empty
///******* */

email.addEventListener("blur", ()=>{ // arrow function
    let x=validateEmail();  

    if(x == defaultMsg){
       email.classList.remove('boxWarning');
        emailError.textContent = defaultMsg;
    }
});

// add event listner to the user name if you entered correct user name,the error paragraph with be empty

username.addEventListener("blur", ()=>{ // arrow function
    let x=validateName();

    if(x == defaultMsg){
        username.classList.remove('boxWarning');
        nameError.textContent = defaultMsg;
    }
});

// add event listner to the password if you entered correct password,the error paragraph with be empty

pass.addEventListener("blur", ()=>{ // arrow function
    let x=validatePassword();

    if(x == defaultMsg){
        pass.classList.remove('boxWarning');
        passwordError.textContent = defaultMsg;
    }
});

