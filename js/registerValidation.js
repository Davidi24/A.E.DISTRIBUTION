console.log("jhgjddhgjhsdgjshd")

document.getElementById("signUp2").addEventListener("submit", function(event) {
    event.preventDefault(); 
  
    var nameInput = document.getElementById("name");
    var name = nameInput.value.trim();
    var nameError = document.getElementById("nameError");
  
    var emailInput = document.getElementById("email");
    var email = emailInput.value.trim();
    var emailError = document.getElementById("emailError");
  
    var passwordInput = document.getElementById("password");
    var password = passwordInput.value;
    var passwordError = document.getElementById("passwordError");
  
    var rules = document.querySelector('.rules');
  
    nameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";
    rules.textContent = "";
  
    if (name === "") {
      nameError.textContent = "Ju lutem vendosni emrin!";
      nameInput.focus();
      return;
    }
  
    if (email === "") {
      emailError.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ju lutem vendosni emailin!";
      emailInput.focus();
      return;
    }
  
    if (!isValidEmail(email)) {
      emailError.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emaili nuk eshte valid!";
      emailInput.focus();
      return;
    }
  
    if (password === "") {
      passwordError.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ju lutem vendosni nje password";
      passwordInput.focus();
      return;
    }
  
    if (password.length < 8) {
      passwordError.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Passwordi duhet te ket te pakten 8 karaktere";
      passwordInput.focus();
      return;
    }
  

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./LogIN/emailRegitervalidation.php?email=" + encodeURIComponent(email), true);
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
  
          if (!response.available) {
            emailError.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emaili eshte i zene!";
            emailInput.focus();
          } else {  
            
    
            authenticateUser(name, email, password);

   
          }
        }
      }
    };
  
    xhr.send();
  });
  
  document.getElementById("name").addEventListener("input", function() {
    var nameError = document.getElementById("nameError");
    nameError.textContent = "";
  });
  
  document.getElementById("email").addEventListener("input", function() {
    var emailError = document.getElementById("emailError");
    emailError.textContent = ""; 
  });
  
  document.getElementById("password").addEventListener("input", function() {
    var passwordError = document.getElementById("passwordError");
    passwordError.textContent = ""; 
  });
  
  document.getElementById("registerButton").addEventListener("click", function() {
    var passwordRules = document.querySelector(".rules");
    passwordRules.textContent = ""; 
  });
  
  function authenticateUser(name, email, password) {
    document.getElementById("signUp2").submit();


  }
  
  function isValidEmail(email) {
    var emailRegex = /^\S+@\S+\.\S+$/;
    return emailRegex.test(email);
  }
  
  function closePopup2() {
  
  }
  