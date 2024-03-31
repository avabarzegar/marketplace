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


var formLogin = document.getElementById('loginForm');
var emailLogin = document.getElementById('loginEmail');
var passwordLogin = document.getElementById('loginPass');
// Create paragraph for displaying email warning
let logEmailError = document.createElement('p');
// Create paragraph for displaying password 1 warning
let logPasswordError = document.createElement('p');


// Creating an array to store all new input elements and apply a loop on them
// to set a warning class attribute and append the created element to the parent of email div
let errorElm = [nameError, emailError, passwordError, logEmailError, logPasswordError];
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
if(email){
email.addEventListener("blur", ()=>{ // arrow function
    let x=validateEmail();  

    if(x == defaultMsg){
       email.classList.remove('boxWarning');
        emailError.textContent = defaultMsg;
    }
});
}
// add event listner to the user name if you entered correct user name,the error paragraph with be empty
if(username){
username.addEventListener("blur", ()=>{ // arrow function
    let x=validateName();

    if(x == defaultMsg){
        username.classList.remove('boxWarning');
        nameError.textContent = defaultMsg;
    }
});
}
// add event listner to the password if you entered correct password,the error paragraph with be empty
if(pass){
pass.addEventListener("blur", ()=>{ // arrow function
    let x=validatePassword();

    if(x == defaultMsg){
        pass.classList.remove('boxWarning');
        passwordError.textContent = defaultMsg;
    }
});
}
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

    if (regexp.test(emailInput) && emailInput.trim().length > 0) {
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

    if (regexp.test(password) && password.trim().length >= 8) {
        error = defaultMsg;
    } else {
        error = "\u2716 Your password should be at least 8 characters: 1 uppercase, 1 lowercase.";
    }
    return error;
}



// add event listner to the email if you entered correct email,the error paragraph with be empty
///******* */
if(emailLogin){
emailLogin.addEventListener("blur", ()=>{ // arrow function
    let x=validateEmail();  

    if(x == defaultMsg){
       emailLogin.classList.remove('boxWarning');
        emailError.textContent = defaultMsg;
    }
});
}

// add event listner to the password if you entered correct password,the error paragraph with be empty

if(passwordLogin){
passwordLogin.addEventListener("blur", ()=>{ // arrow function
    let x=validatePassword();

    if(x == defaultMsg){
        passwordLogin.classList.remove('boxWarning');
        passwordError.textContent = defaultMsg;
    }
});
}

// function validatePassword(pass){
//     if (pass.value.length < 8 || !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value)) { // Corrected pass.value
//         //showError(pass, 'X Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
//         validForm = false;
//     }
//     else {
//         validForm = true;
//     }
//     return validForm;
// }

// function validate() {
    
//     //clearErrors(); 
    
//     var validForm = true; //initialize as true, to begin.
//     var validUserName = validateUserName();
//     var validEmail = validateEmail(email.value); // parameter is email input value. 
//     var validEmailLogin = validateEmail(emailLogin.value);
//     var validPassword = validatePassword(pass);
//     var validLoginPassword = validatePassword(passwordLogin);

//     if (!validUserName || !validEmail || !validPassword || !validEmailLogin || !validLoginPassword) { //if any of these return false, form does not submit.
//         validForm = false;
//     }
   
//     // email check
//     /*if (!validateEmail(email.value)) {
//         showError(email, 'X Email address should be non-empty with the format xyx@xyz.xyz');
//         validForm = false;
//     } else {
//         validForm = true;
//     } */

//     // username check
//     /*if (username.value.trim() === "" || (username.value.length > 30)) {
//         showError(username,"X User name should be non-empty and within 30 characters.");
//         validForm = false;
//     }*/

//     // password check
//     /*function validatePassword(){
//     if (pass.value.length < 8 || !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value)) { // Corrected pass.value
//         showError(pass, 'X Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
//         validForm = false;
//     } */

//     return validForm;  //returns true if everything is good
//     }
// /*} */


// // Event Listener (e) for submit button of sign.html. Will not allow submission if validate() function returns false. 

// form.addEventListener('submit', (e)=> { 
//     let validForm = validate();
//         if (!validForm) {
//             e.preventDefault();
//         }
// })


// username.addEventListener('input', ()=> {
//     var validForm = validateUserName();
//         if (validForm) {
//             clearErrors(username);
//         }
//         else {
//             clearErrors(username);
//             showError(username, "X User name should be non-empty and within 30 characters.");
//         }
// })

// /*
// * Event Listener for dynamic error messages in case of incorrect format. validateEmail() takes 
// * string input value of email. 
// * showError(inputElement, 'error message') appends newly created element each time it is called. Negate this with clearErrors(inputElement)
// * to remove each added element as the user types before they have correct format.
// */
// email.addEventListener('input', ()=> {
//     var validForm = validateEmail(email.value);
//     if (validForm) {
//         clearErrors(email);
//     }
//     else {
//         clearErrors(email);
//         showError(email, 'X Email address should be non-empty with the format xyx@xyz.xyz');
//     }
// })

// pass.addEventListener('input', ()=> {
//     var validForm = validatePassword();
//     if (validForm) {
//         clearErrors(pass);
//     }
//     else {
//         clearErrors(pass);
//         showError(pass, 'X Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
//     }
// })


// function showError(inputElement, errorMessage) { // this function displays an error message associated with a specific input element
//     var errorElement = inputElement.nextElementSibling;
//     if(!errorElement || !errorElement.className.includes('error-message')){
//     var errorElement = document.createElement("div"); // creates a new <div> element using the .createElement(). This displays the error message
//     errorElement.className = "error-message"; // this sets the className of <div>. This allows CSS styling
//     errorElement.textContent = errorMessage; // sets the textContent of the <div> to the errorMessage that's provided as an argument of the function. This assigns the actual text content of the error message to be displayed within the <div> element.
  
//     inputElement.parentNode.appendChild(errorElement);  //This line appends the <div> (which contains the error message) as a child of the parent node of inputElement. This adds the error message element to the DOM, making it visible within the form.
//                                                         //appends means adding and element to the end of another element
// }}

// function clearErrors(inputElement) {
//     var errorMessages = inputElement.parentNode.querySelectorAll(".error-message"); //selects all elements in class error-message
//     errorMessages.forEach(function (errorMessage) { //.forEach iterates over elements of an array and executes a function (the one below) for each element
//         errorMessage.parentNode.removeChild(errorMessage); // removes error mssgs from its parent node, clearing it from the dom (structure of html)
//     }); //node is an individual component of the document
// }

// function validateEmail(email) {
//     return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
// } 

// // -----------------login validation------------------------------------


