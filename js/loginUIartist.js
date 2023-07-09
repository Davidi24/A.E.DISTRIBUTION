

const registerButton2 = document.getElementById("register2");
const loginButton2 = document.getElementById("login2");

const popup2 = document.getElementById("popup2");

registerButton2.addEventListener("click", () => {
    popup2.classList.add("right-panel-active");
    
var popup22 = document.getElementById('popup2');
popup22.style.zIndex = 999;
});

loginButton2.addEventListener("click", () => {
    popup2.classList.remove("right-panel-active");
    
var popup22 = document.getElementById('popup2');
popup22.style.zIndex = 999;
});
