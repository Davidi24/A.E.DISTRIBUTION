document.getElementById("id").addEventListener("input", clearError.bind(null, "idError"));
document.getElementById("name").addEventListener("input", clearError.bind(null, "nameError"));
document.getElementById("email").addEventListener("input", clearError.bind(null, "emailError"));
document.getElementById("phone").addEventListener("input", clearError.bind(null, "numberError"));
document.getElementById("title").addEventListener("input", clearError.bind(null, "comnameError"));
document.getElementById("created").addEventListener("input", clearError.bind(null, "dateError"));
console.log("ahahhahaha");

document.getElementById("createUserForm").addEventListener("submit", function(event) {
    event.preventDefault();
    clearErrors();

    var id = document.getElementById("id").value;
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var company = document.getElementById("title").value;
    var date = document.getElementById("created").value;

    if (id === "") {
        displayError("idError", "Id nuk mund te jete bosh!");
        return;
    }

    if (name === "") {
        displayError("nameError", "Emri nuk mund te jet bosh!");
        return;
    }

    if (email === "") {
        displayError("emailError", "Emaili nuk mund te jet bosh!");
        return;
    } else if (!validateEmail(email)) {
        displayError("emailError", "Emaili nuk eshte valid!");
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../createUser/emailRegitervalidation.php?email=" + encodeURIComponent(email), true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                var response = JSON.parse(xhr.responseText);
                console.log(response.available);
                if (!response.available) {
                    displayError("emailError", "Ky email eshte i zene!");
                    return;
                } else {
                    // Email is available, continue with the remaining validations
                    if (phone === "") {
                        displayError("numberError", "Numri eshte i kerkuar");
                        return;
                    }

                    if (company === "") {
                        displayError("comnameError", "Emri i biznesit eshte i kerkuar");
                        return;
                    }

                    if (date === "") {
                        displayError("dateError", "Data nuk mund te jete bosh!");
                        return;
                    }

                    // If all validations pass, submit the form
                    submitForm();
                }
            }
        }
    };
    xhr.send();

    // Function to submit the form
    function submitForm() {
        document.getElementById("createUserForm").submit();
    }
});

function clearErrors() {
    var errorMessages = document.getElementsByClassName("error-message");
    for (var i = 0; i < errorMessages.length; i++) {
        errorMessages[i].innerHTML = "";
    }
}

function clearError(elementId) {
    document.getElementById(elementId).innerHTML = "";
}

function displayError(elementId, errorMessage) {
    document.getElementById(elementId).innerHTML = errorMessage;
}

function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
