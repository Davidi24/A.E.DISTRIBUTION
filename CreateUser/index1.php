<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../css/logo1.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/FourButtons.css">

</head>
<body>
    <button class="LOGOUT">LOGOUT</button>
    <script>
    function locationn() {
    window.location.href = "../index.php";
  }
      var SHBillbutton = document.querySelector(".LOGOUT");
  SHBillbutton.addEventListener("click", locationn);

</script>
<div class="conteiner">
<div class="up">
<div class="first">    <button id="createUser" class="buttonn">Krijo klientin</button></div>
<div class="second">     <button id="readUser" class="buttonn">Shiko Kleantet</button></div>
</div>
<div class="down">

<div class="third">   <button id="createBill" class="buttonn">Krijo Faturen</button></div>
<div class="fourth"> <button id="readBill" class="buttonn">Shiko Faturat</button></div>
</div>
</div>




<!-- 
    <button id="createUser">Krijo klientin</button>
    <button id="readUser">Shiko Kleantet</button>
    <button id="createBill">Krijo Faturen</button>
    <button id="readBill">Lexu Faturen</button> -->

    <script src="../js/CUbuttonsLocation.js"></script>
</body>
</html>