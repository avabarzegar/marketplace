var form = document.getElementById('signupForm');
var email = document.getElementById('email');
var username = document.getElementById('userName');
var pass = document.getElementById('pass');
// var is globally scoped and can be re-declared, let is block scoped and can't be re-declared in the same scope

var formLogin = document.getElementById('loginForm');
var emailLogin = document.getElementById('emailID');
var passwordLogin = document.getElementById('passwordID');


form.addEventListener('submit', (e)=> { 
    console.log("check");
    let validForm = validate();
        if (!validForm) {
            e.preventDefault();
        }
})

formLogin.addEventListener('submit', (e)=> { 
    console.log("check");
    let validForm = validate();
        if (!validForm) {
            e.preventDefault();
        }
})


function validateUserName() { //Made function so we can use return value for event listener easily.
    var validForm = true;
    console.log(username.value);
    if ((username.value.length > 30)) {
        //if(!username.classList.contains('error')){ //trying to prevent multiple error messages repeating.
        //showError(username,"X User name should be non-empty and within 30 characters.");
         validForm = false;
        }
        else {
            validForm = true;
    }
    return validForm; 
}

function validatePassword(pass){
    if (pass.value.length < 8 || !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value)) { // Corrected pass.value
        //showError(pass, 'X Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
        validForm = false;
    }
    else {
        validForm = true;
    }
    return validForm;
}

function validate() {
    
    //clearErrors(); 
    
    var validForm = true; //initialize as true, to begin.
    var validUserName = validateUserName();
    var validEmail = validateEmail(email.value); // parameter is email input value. 
    var validEmailLogin = validateEmail(emailLogin.value);
    var validPassword = validatePassword(pass);
    var validLoginPassword = validatePassword(passwordLogin);

    if (!validUserName || !validEmail || !validPassword || !validEmailLogin || !validLoginPassword) { //if any of these return false, form does not submit.
        validForm = false;
    }
   
    // email check
    /*if (!validateEmail(email.value)) {
        showError(email, 'X Email address should be non-empty with the format xyx@xyz.xyz');
        validForm = false;
    } else {
        validForm = true;
    } */

    // username check
    /*if (username.value.trim() === "" || (username.value.length > 30)) {
        showError(username,"X User name should be non-empty and within 30 characters.");
        validForm = false;
    }*/

    // password check
    /*function validatePassword(){
    if (pass.value.length < 8 || !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value)) { // Corrected pass.value
        showError(pass, 'X Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
        validForm = false;
    } */

    return validForm;  //returns true if everything is good
    }
/*} */


// Event Listener (e) for submit button of sign.html. Will not allow submission if validate() function returns false. 

form.addEventListener('submit', (e)=> { 
    let validForm = validate();
        if (!validForm) {
            e.preventDefault();
        }
})


username.addEventListener('input', ()=> {
    var validForm = validateUserName();
        if (validForm) {
            clearErrors(username);
        }
        else {
            clearErrors(username);
            showError(username, "X User name should be non-empty and within 30 characters.");
        }
})

/*
* Event Listener for dynamic error messages in case of incorrect format. validateEmail() takes 
* string input value of email. 
* showError(inputElement, 'error message') appends newly created element each time it is called. Negate this with clearErrors(inputElement)
* to remove each added element as the user types before they have correct format.
*/
email.addEventListener('input', ()=> {
    var validForm = validateEmail(email.value);
    if (validForm) {
        clearErrors(email);
    }
    else {
        clearErrors(email);
        showError(email, 'X Email address should be non-empty with the format xyx@xyz.xyz');
    }
})

pass.addEventListener('input', ()=> {
    var validForm = validatePassword();
    if (validForm) {
        clearErrors(pass);
    }
    else {
        clearErrors(pass);
        showError(pass, 'X Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
    }
})


function showError(inputElement, errorMessage) { // this function displays an error message associated with a specific input element
    var errorElement = inputElement.nextElementSibling;
    if(!errorElement || !errorElement.className.includes('error-message')){
    var errorElement = document.createElement("div"); // creates a new <div> element using the .createElement(). This displays the error message
    errorElement.className = "error-message"; // this sets the className of <div>. This allows CSS styling
    errorElement.textContent = errorMessage; // sets the textContent of the <div> to the errorMessage that's provided as an argument of the function. This assigns the actual text content of the error message to be displayed within the <div> element.
  
    inputElement.parentNode.appendChild(errorElement);  //This line appends the <div> (which contains the error message) as a child of the parent node of inputElement. This adds the error message element to the DOM, making it visible within the form.
                                                        //appends means adding and element to the end of another element
}}

function clearErrors(inputElement) {
    var errorMessages = inputElement.parentNode.querySelectorAll(".error-message"); //selects all elements in class error-message
    errorMessages.forEach(function (errorMessage) { //.forEach iterates over elements of an array and executes a function (the one below) for each element
        errorMessage.parentNode.removeChild(errorMessage); // removes error mssgs from its parent node, clearing it from the dom (structure of html)
    }); //node is an individual component of the document
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
} 

// ----------------- Mega Menu------------------------------------





