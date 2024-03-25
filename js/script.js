// validation for signup
function validate() {
    var email = document.getElementById('email');
    var username = document.getElementById('username');
    var pass = document.getElementById('pass');
    // var is globally scoped and can be re-declared, let is block scoped and can't be re-declared in the same scope
    clearErrors();
    
    var validForm = true;

    // email check
    if (!validateEmail(email.value)) {
        showError(email, 'X Email address should be non-empty with the format xyx@xyz.xyz');
        validForm = false;
    }

    // username check
    if (username.value.trim() === "" || (username.value.length > 30)) {
        showError(login,"X User name should be non-empty and within 30 characters.");
        validForm = false;
    }

    // password check
    if (pass.value.length < 8 || !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value)) { // Corrected pass.value
        showError(pass, 'X Password should be at least 8 characters long: 1 uppercase, 1 lowercase.');
        validForm = false;
    }

    return validForm; //returns true if everything is good
}

function showError(inputElement, errorMessage) { // this function displays an error message associated with a specific input element
    var errorElement = document.createElement("div"); // creates a new <div> element using the .createElement(). This displays the error message
    errorElement.className = "error-message"; // this sets the className of <div>. This allows CSS styling
    errorElement.textContent = errorMessage; // sets the textContent of the <div> to the errorMessage that's provided as an argument of the function. This assigns the actual text content of the error message to be displayed within the <div> element.
  
    inputElement.parentNode.appendChild(errorElement);  //This line appends the <div> (which contains the error message) as a child of the parent node of inputElement. This adds the error message element to the DOM, making it visible within the form.
                                                        //appends means adding and element to the end of another element
}

function clearErrors() {
    var errorMessages = document.querySelectorAll(".error-message"); //selects all elements in class error-message
    errorMessages.forEach(function (errorMessage) { //.forEach iterates over elements of an array and executes a function (the one below) for each element
        errorMessage.parentNode.removeChild(errorMessage); // removes error mssgs from its parent node, clearing it from the dom (structure of html)
    }); //node is an individual component of the document
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}