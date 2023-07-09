document.getElementById("log-Inn").addEventListener("submit", function(event) {
    event.preventDefault();
  
    var emailInput = document.getElementById("email1");
    var email = emailInput.value.trim();
    var emailError = document.getElementById("EmailError");
  
    var passwordInput = document.getElementById("password1");
    var password = passwordInput.value;
    var passwordError = document.getElementById("PasswordError");
  
    emailError.textContent = "";
    passwordError.textContent = "";
  
    if (email === "") {
      emailError.innerHTML = "Ju lutem vendosni nje email!";
      emailInput.focus();
      return;
    }
  

  
    if (password === "") {
      passwordError.innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbspJu lutem vendosni nje password!";
      passwordInput.focus();
      return;
    }

    var xhr1 = new XMLHttpRequest();
    xhr1.open("GET", "./LogIN/emailRegitervalidation.php?email=" + encodeURIComponent(email), true);
  
    xhr1.onreadystatechange = function() {
      if (xhr1.readyState === XMLHttpRequest.DONE) {
        if (xhr1.status === 200) {
          var response = JSON.parse(xhr1.responseText);
  
          if (response.available) {
            emailError.innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbspNuk ka nje adres me kete email!";
            emailInput.focus();

          } else {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./LogIN/passwordValidation.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  console.log(xhr.responseText); // Output the response to the console for debugging
          
                  var response1 = JSON.parse(xhr.responseText);
          
                  if (!response1.available) {
                    passwordError.innerHTML = "Password nuk eshte i sakte!";
                    passwordInput.focus();
                  } else {
                    authenticateUser1(email, password);
                  }
                }
              }
            };
          
            xhr.send("email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password));
          }
        }
      }
    };
  
    xhr1.send();

  

  });
  
  document.getElementById("email1").addEventListener("input", function() {
    var emailError = document.getElementById("EmailError");
    emailError.textContent = ""; 
  });
  
  document.getElementById("password1").addEventListener("input", function() {
    var passwordError = document.getElementById("PasswordError");
    passwordError.textContent = ""; 
  });
  
  function authenticateUser1(name, email, password) {
    document.getElementById("log-Inn").submit();
  }
  
  function isValidEmail(email) {
    var emailRegex = /^\S+@\S+\.\S+$/;
    return emailRegex.test(email);
  }
  