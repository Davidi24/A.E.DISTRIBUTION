console.log("ahahhahaha");
document.addEventListener('DOMContentLoaded', function() {

  var idInput = document.getElementById('id');
  var nameInput = document.getElementById('name');
  var emailInput = document.getElementById('email');
  var phoneInput = document.getElementById('phone');
  var titleInput = document.getElementById('title');
  var createdInput = document.getElementById('created');
  
  var idError = document.getElementById('idError');
  var nameError = document.getElementById('nameError');
  var emailError = document.getElementById('emailError');
  var numberError = document.getElementById('numberError');
  var comnameError = document.getElementById('comnameError');
  var dateError = document.getElementById('dateError');
  var updated = document.querySelector(".UPDATED");

  function check(event) {
    event.preventDefault();
    if (idInput.value.trim() === '') {
      idError.textContent = 'Ju lutem vendosni nje id';
      return;
    } else {
      idError.textContent = '';
    }

    if (nameInput.value.trim() === '') {
      nameError.textContent = 'Ju lutem vendosni nje emer';
      return;
    } else {
      nameError.textContent = '';
    }

    if (emailInput.value.trim() === '') {
      emailError.textContent = 'Ju lutem vendosni nje email';
      return;
    } else if (!isValidEmail(emailInput.value.trim())) {
      emailError.textContent = 'Emaili nuk eshte valid';
      return;
    } else {
      emailError.textContent = '';
    }

    if (phoneInput.value.trim() === '') {
      numberError.textContent = 'Ju lutem vendosni nje numer';
      return;
    } else {
      numberError.textContent = '';
    }

    if (titleInput.value.trim() === '') {
      comnameError.textContent = 'Ju lutem vendosni nje emer';
      return;
    } else {
      comnameError.textContent = '';
    }

    if (createdInput.value.trim() === '') {
      dateError.textContent = 'Ju lutem vendosni nje date';
      return;
    } else {
      dateError.textContent = '';
    }
    
    // Display "klienti u updetu" in the 'updated' div for 3 seconds
    updated.textContent = 'Klienti u updetu';
    setTimeout(function() {
      updated.textContent = '';
      document.getElementById('createUserForm').submit();
    }, 2000);
  }

  function isValidEmail(email) {
    // Regular expression to check email validity
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  document.getElementById('createUserForm').addEventListener('submit', function(event) {
    event.preventDefault();
    check(event);
  });

  // Event listener to hide error messages when the user starts typing
  nameInput.addEventListener('input', function() {
    nameError.textContent = '';
  });

  emailInput.addEventListener('input', function() {
    emailError.textContent = '';
  });

  phoneInput.addEventListener('input', function() {
    numberError.textContent = '';
  });

  titleInput.addEventListener('input', function() {
    comnameError.textContent = '';
  });

  createdInput.addEventListener('input', function() {
    dateError.textContent = '';
  });
});
