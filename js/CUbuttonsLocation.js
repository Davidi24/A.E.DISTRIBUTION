console.log("hahaahah")





  function CreateUser() {
    window.location.href = "../CreateUser/createUser.php";
  }

  function ReadUser() {
    window.location.href = "../CreateUser/readUser.php";
  }

  function createBill() {
    window.location.href = "../view/createFatura.php";
  }

  function showBill() {
    window.location.href = "../view/showFatura.php";
  }
  // Add a click event listener to the button
  var Cbutton = document.getElementById("createUser");
  Cbutton.addEventListener("click", CreateUser);


  var Rbutton = document.getElementById("readUser");
  Rbutton.addEventListener("click", ReadUser);


  var CBillbutton = document.getElementById("createBill");
  CBillbutton.addEventListener("click", createBill);


  
  var SHBillbutton = document.getElementById("readBill");
  SHBillbutton.addEventListener("click", showBill);

