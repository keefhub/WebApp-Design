function displayError(errorMessage, element) {
  var errorParagraph = document.getElementById(element);
  errorParagraph.textContent = errorMessage;
}

function CreditCardValidation() {
  cardNumberInput = document.getElementById("card_number");
  cardNumber = cardNumberInput.value;
  if (!cardNumber.match(/^\d{16}$/)) {
    cardNumberInput.style.borderColor = "red";
    cardNumberInput.style.borderWidth = "2px";
    displayError("Invalid Card Number", "errorCardNumber");
    return false;
  } else {
    cardNumberInput.style.borderColor = "green";
    cardNumberInput.style.borderWidth = "2px";
    displayError("", "errorCardNumber");
    return true;
  }
}

function DateValidation() {
  dateInput = document.getElementById("expiry_date");
  date = dateInput.value;
  if (!date.match(/^(19|20)\d\d\/(0[1-9]|1[0-2])$/)) {
    dateInput.style.borderColor = "red";
    dateInput.style.borderWidth = "2px";
    displayError("Invalid Date Format", "errorDate");
    return false;
  } else {
    dateInput.style.borderColor = "green";
    dateInput.style.borderWidth = "2px";
    displayError("", "errorDate");
    return true;
  }
}

function CvvValidation() {
  var cvvInput = document.getElementById("cvv");
  var cvv = cvvInput.value;

  if (!cvv.match(/^\d{3}$/)) {
    cvvInput.style.borderColor = "red";
    cvvInput.style.borderWidth = "2px";
    displayError("Invalid CVV Format", "errorCvv");
    return false;
  } else {
    cvvInput.style.borderColor = "green";
    cvvInput.style.borderWidth = "2px";
    displayError("", "errorCvv");
    return true;
  }
}
