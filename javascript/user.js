function textEdit(regex, input, helpId, helpMessage){
  if (!regex.test(input)) {  
    if (helpId != null) {
      while (helpId.firstChild) 
      helpId.removeChild(helpId.firstChild);
      helpId.appendChild(document.createTextNode(helpMessage)); 
    }
    return false;
  }else {      
    if (helpId != null){
      while (helpId.firstChild) 
      helpId.removeChild(helpId.firstChild);
      }
    return true;
    }
  }

function isValidText(inputField, helpId) {
  return textEdit(/^[A-Za-z\.\'\-]{2,20}$/, inputField.value, helpId, "Name invalid (Ex. Name)");
}

function isEmailValid(inputField, helpId) {
  textEdit(/^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/, inputField.value, helpId, "Email invalid (Ex. 123@mail.com)");
  return 
}

function isPhoneValid(inputField, helpId) {
  return textEdit(/^[0-9]{5,20}$/, inputField.value, helpId, "Phone number invalid (Ex.0000000000)");
}

function isPasswordValid(inputField, helpId) {
  return textEdit(/^[A-Za-z0-9]{8,25}$/, inputField.value, helpId, "Password invalid (require 6-25 characters with a mix of letters, numbers)");
}

function isUserIdValid(inputField, helpId) {
  return textEdit(/^[A-Za-z0-9]{6,25}$/, inputField.value, helpId, "UserID invalid (require 6-25 characters can be a mix of letters, numbers)");
}

function isStreetValid(inputField, helpId) {
  return textEdit(/^[A-Za-z0-9\.\'\-]{2,20}\s?[A-Za-z0-9\.\'\-]{2,15}\s?[A-Za-z0-9\.\'\-]{2,15}$/, inputField.value, helpId, "Street invalid (Ex. 123 Main St)");
}

function isStateValid(inputField, helpId) {
  return textEdit(/^[A-Za-z0-9]{3,40}\s?$/, inputField.value, helpId, "State invalid (Ex. California)");
}

function isCountryValid(inputField, helpId) {
  return textEdit(/^[A-Za-z0-9]{3,40}\s?$/, inputField.value, helpId, "Country invalid (Ex. United States)");
}

function isCityValid(inputField, helpId) {
  return textEdit(/^[A-Za-z]{1,40}( )?[A-Za-z]{1,40}$/, inputField.value, helpId, "Country invalid (Ex. San Francisco)");
}

function isZipCodeText(inputField, helpId) {
  return textEdit(/^[A-Za-z0-9]{3,12}\s?$/, inputField.value, helpId, "ZipCode invalid (Ex. 12345)");
}

function isFullNameValid(inputField, helpId) {
  return textEdit(/^[A-Za-z\.\'\-]{2,20}\s?[A-Za-z\.\'\-]{2,15}\s?[A-Za-z\.\'\-]{2,15}$/, inputField.value, helpId, "Name invalid (Ex. First Last)");
}

function isCreditCardValid(inputField, helpId) {
  return textEdit(/^[0-9]{15,16}$/, inputField.value, helpId, "Credit Card Number invalid (Ex. 1234123412341234 or 123412345612345)");
}

function isCvvValid(inputField, helpId) {
  return textEdit(/^[0-9]{3,4}$/, inputField.value, helpId, "CVV invalid (Ex. 123 or 1234)");
}

function isExpDateValid(inputField, helpId) {
  return textEdit(/^([0-9]{2}(-)[0-9]{4})$/, inputField.value, helpId, "Year invalid (Ex. 1-2020)");
}

/*
function createCookie (newCookie) {
  var expDate = new Date();
  expDate.setMonth(expDate.getMonth()+1);
  var cookieValue = document.getElementById(newCookie).ariaValueMax;
  document.cookie = newCookie = "=" + cookieValue + ";path=/;expire=" + expDate.toGMTString();
}

function getCookie (name) {
  var cookieName = document.getElementById(name).ariaValueMax;
  var allCookies = document.cookie.split(';');
  var cookieData = "";
  for (let i=0; i<allCookies.length; i++) {
    if ((allCookies[i].indexOf(cookieName)) != -1) {
      match = allCookies[i].replace(" ","");
      cookieData = match.substr((cookieName.length+1));
      document.getElementById("fnametext").innerHTML = cookieName + " " + cookieData;
    }
  }
}
*/
