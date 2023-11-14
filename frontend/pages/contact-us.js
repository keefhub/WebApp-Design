function displayError(errorMessage, element) {
  var errorParagraph = document.getElementById(element);
  errorParagraph.textContent = errorMessage;
}

function NameValidation() {
  var nameInput = document.getElementById("name");
  var name = nameInput.value;

  if (!name.match(/^[A-Za-z\s]+$/)) {
    nameInput.style.borderColor = "red";
    nameInput.style.borderWidth = "2px";
    displayError("Invalid Name", "errorName");
    return false;
  } else {
    nameInput.style.borderColor = "green";
    nameInput.style.borderWidth = "2px";
    displayError("", "errorName");
    return true;
  }
}

function EmailValidation() {
  var emailInput = document.getElementById("emailaddress");
  var email = emailInput.value;

  if (!email.match(/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/)) {
    emailInput.style.borderColor = "red";
    emailInput.style.borderWidth = "2px";
    displayError("Invalid Email", "errorEmail");
    return false;
  } else {
    emailInput.style.borderColor = "green";
    emailInput.style.borderWidth = "2px";
    displayError("", "errorEmail");
    return true;
  }
}

function ContactNumberValidation() {
  var contactnumberInput = document.getElementById("contact");
  var contactnumber = contactnumberInput.value;

<<<<<<< HEAD
  if (!contactnumber.match(/^[0-9]{8}$/)) {
=======
  if (!contactnumber.match(/^[0-9]{10}$/)) {
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
    contactnumberInput.style.borderColor = "red";
    contactnumberInput.style.borderWidth = "2px";
    displayError("Invalid Contact Number", "errorContactNumber");
    return false;
  } else {
    contactnumberInput.style.borderColor = "green";
    contactnumberInput.style.borderWidth = "2px";
    displayError("", "errorContactNumber");
    return true;
  }
}

<<<<<<< HEAD
=======
function MessageValidation() {
  var messageInput = document.getElementById("message");
  var message = messageInput.value;

  if (!message.match(/^[A-Za-z\s]+$/)) {
    messageInput.style.borderColor = "red";
    messageInput.style.borderWidth = "2px";
    displayError("Invalid Message", "errorMessage");
    return false;
  } else {
    messageInput.style.borderColor = "green";
    messageInput.style.borderWidth = "2px";
    displayError("", "errorMessage");
    return true;
  }
}

>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
function validateForm() {
  var isNameValid = validateName();
  var isContactNumberValid = validateContactNumber();
  var isEmailValid = validateEmail();
<<<<<<< HEAD

  if (isNameValid && isContactNumberValid && isEmailValid) {
=======
  var isMessageValid = validateMessage();

  if (isNameValid && isContactNumberValid && isEmailValid && isMessageValid) {
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
    return true;
  } else {
    return false;
  }
}
