<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  <link rel="stylesheet" href="./css/login_register_css/login.css" />
  <link rel="stylesheet" href="./css/login_register_css/validation.css" />
  <link rel="stylesheet" href="./css//home.css" />



  <style>
    .z {
      width: 100%;
    }

    .just-validate-error-label {
      margin-left: -230px;
    }

    .just-validate-error-label {
      color: #4bb6b7 !important;
      font-family: myFontThin;
    }

    .icon-inner {
      color: wheat;
    }
    .body{
    background-image: url("./css/back.png");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-color: #478ac9;
}
  </style>
  <title>A.E.Destribution</title>
  <link rel="icon" href="./css/logo1.png"/>

</head>



<body >

<div class="logo">
<img  src="./css/logo.png" alt="">
</div>


  <div id="preloader"></div>




   
  <h1 class="titlee">Mire se erdhet ne A.E.DISTRIBUTION</h1>

      <div class="LogIn">

    
        <button class="logBot "> <a href="#" class="getStarted" id="getStarted">LogIn</a></button>
      </div>

<div class="line"></div>

      <div class="container">
<div class="first items"> 
<img src="./css/first.png" alt="" class="img1">
<h2 >Rreth nesh</h2>
<p class="par">Një kompani lider në tregun shqiptar të pajisjeve fiskale.</p>
</div>

<div class="second items">
<img src="./css/second.png" alt="" class="img2">
<h2 >Kommpania</h2>
<p class="par">AED është nje kompani e autorizuar nga Ministria e Financave, nr. 85361/8</p>
</div>
<div class="third items">
<img src="./css/third.png" alt="" class="img1">
<h2 >Misioni Jone</h2>
<p class="par">Ne synojmë të përmirësojmë imazhin tonë përmes punës.</p>
</div>
<div class="four items">
<img src="./css/fourth.png" alt="" class="img1">
<h2 style="margin-left: 25%;" >Arritjet</h2>
<p class="para">Bashkëpunim me më shumë se 1000 biznese.</p>
</div>
  </div>














  <!------------------------------------------------------------------------------------------------------->



  <div class="popup2" id="popup2">
      <div class="form-container register-container">
      <div class="xxx" onclick="closePopup2()">
      <span class="aclose" ><ion-icon name="close-outline"></ion-icon></span>

      </div>
      <form action="./LogIN/registerProcess.php" method="post" id="signUp2">
       

        <h1 id="popup2-h1" style="color: #292929;">Rregjistro te dhenat</h1>
        <div class="z">
          <input type="text" placeholder="Name" name="name" id="name">
          <div id="nameError"></div>
        </div>
        <div class="z">
          <input type="email" placeholder="Email" name="email" id="email">
          <div id="emailError" style="width: 124%;"></div>
        </div>
        <div style="width: 150%; margin-left: 20%">
          <label class="rules">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duhet te perdorni te pakten 8 karaktere!.</label>
        </div>
        <div class="z">
          <input type="password" placeholder="Password" name="password" id="password">
          <div id="passwordError"></div>
        </div>
        <button id="registerButton">Register</button>
      </form>
    </div>



    <div class="form-container login-container">
    
      <form action="./LogIN/logInValidation.php" method="Post" id="log-Inn">
        <h1 id="popup-h1" style="color: #292929;">Vendosni te dhenat tuaja!</h1>
        <div style="width: 100%;">
          <input type="email" placeholder="Email" name="email" id="email1">
          <div id="EmailError"></div>
        </div>
        <div style="width: 100%;">
          <input type="password" placeholder="Password" name="password" id="password1">
          <div id="PasswordError"></div>
        </div>


        <div class="content">
          <div class="checkbox">

          </div>
          <div class="pass-link">
          </div>
        </div>
        <button>Log in</button>
      </form>
    </div>

    <div class="overlay-container">
    
      <div class="overlay2">
      <div class="xx">
      <span class="cclose" onclick="closePopup2()"><ion-icon name="close-outline"></ion-icon></span>

      </div>

        <div class="overlay-panel overlay-left">
       
          <h1 class="title">Ju tashme keni nje llogari?</h1>
          <p>Klikoni butonin Login dhe vendosni te dhenat!</p>
          <button class="ghost" id="login2">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
         
          <h1 class="title">Rregistrohuni sa me pare🙂</h1>
          <p>Nuk keni llogari? Ju lutem, krijoni nje llogari per te vazhduar!</p>
          <button class="ghost" id="register2">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>


  <!------------------------------------------------------------------------------------------------------>


  <!--A div that includes the whole page except the Header-->
  <div class="wholePage" id="blur">

  </div>



  <script src="./js/loginUIartist.js"></script>
  <script src="./js/registerValidation.js"></script>
  <script src="./js/LogInValidation.js"></script>
  <script src="./js/blurred.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
</body>

</html>