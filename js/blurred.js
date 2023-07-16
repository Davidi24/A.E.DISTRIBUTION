



var popup22 = document.getElementById('popup2');
var regbutton1 = document.querySelector(".LogIn");
console.log(regbutton1);
regbutton1.addEventListener("click", () => {
    toggleKleint();
})

var regbutton2 = document.querySelector(".xxx");
console.log(regbutton2);
regbutton2.addEventListener("click", () => {
    toggleKleint();
    popup22.style.zIndex = -999;
    
})

var regbutton3 = document.querySelector(".xx");
regbutton3.addEventListener("click", () => {
    toggleKleint();
    popup22.style.zIndex = -999;
})

function toggleKleint() {
    var blur = document.getElementById('blur');
    blur.classList.toggle('active2');

    /*popup-i*/
    var popup2 = document.getElementById('popup2');
    popup2.classList.toggle('active2');
    popup2.style.zIndex = 999;

}










