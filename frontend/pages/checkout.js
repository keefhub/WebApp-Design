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

function CityValidation() {
  var cityInput = document.getElementById("city");
  var city = cityInput.value;

  if (!city.match(/^[A-Za-z\s]+$/)) {
    cityInput.style.borderColor = "red";
    cityInput.style.borderWidth = "2px";
    displayError("Invalid City", "errorCity");
    return false;
  } else {
    cityInput.style.borderColor = "green";
    cityInput.style.borderWidth = "2px";
    displayError("", "errorCity");
    return true;
  }
}

function StateValidation() {
  var stateInput = document.getElementById("state");
  var state = stateInput.value;

  if (!state.match(/^[A-Za-z\s]+$/)) {
    stateInput.style.borderColor = "red";
    stateInput.style.borderWidth = "2px";
    displayError("Invalid State", "errorState");
    return false;
  } else {
    stateInput.style.borderColor = "green";
    stateInput.style.borderWidth = "2px";
    displayError("", "errorState");
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

function ZipCodeValidation() {
  var zipCodeInput = document.getElementById("zip");
  var zipCode = zipCodeInput.value;

  if (!zipCode.match(/^[0-9]+$/)) {
    zipCodeInput.style.borderColor = "red";
    zipCodeInput.style.borderWidth = "2px";
    displayError("Invalid Zip Code", "errorZipCode");
    return false;
  } else {
    zipCodeInput.style.borderColor = "green";
    zipCodeInput.style.borderWidth = "2px";
    displayError("", "errorZipCode");
    return true;
  }
}

function validateForm() {
  var isNameValid = NameValidation();
  var isEmailValid = EmailValidation();
  var isCityValid = CityValidation();
  var isStateValid = StateValidation();
  var isZipValid = ZipCodeValidation();

  // Check if all validations pass
  if (
    isNameValid &&
    isEmailValid &&
    isCityValid &&
    isStateValid &&
    isZipValid
  ) {
    return true; // Allow form submission
  } else {
    return false; // Prevent form submission
  }
}
