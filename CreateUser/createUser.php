<?php
$conn = require __DIR__ . '/../Database/database.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company_name = $_POST["title"];
    $date = $_POST["created"];
    

    $checkQuery = "SELECT email FROM klienti WHERE email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result && $result->num_rows > 0) {
        echo "Email already exists in the database.";
        exit();
    }
    

    $sql = "INSERT INTO klienti (name, email, phone, company_name, date, client_id) VALUES ('$name', '$email', '$phone', '$company_name', '$date', '$id')";

    if ($conn->query($sql) === TRUE) {

        header("Location: ./readUser.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../css/logo1.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login_register_css/user.css">

</head>
<body>


<button id="Home"> Faqja Kryesore</button>
<script>
    function locationn() {
    window.location.href = "./index1.php";
  }
      var SHBillbutton = document.getElementById("Home");
  SHBillbutton.addEventListener("click", locationn);

</script>

        <div class="content update">
                 <h1 style="font-size: 30px;">Krijimi i Klientit</h1>
            <form id="createUserForm" action="../CreateUser/createUser.php" method="post">
    
              <div style="position: relative; display:flex" class="content1">
              <div class="first" >
                <label for="id">ID e klientit</label>
                <br>
                <input type="text" name="id" placeholder="Vendosni id" id="id">
                <div id="idError" class="errorr"></div>
                <label for="email">Email</label>
                <br>
                <input type="text" name="email" placeholder="emailijuaj@example.com" id="email">
                <div id="emailError" class="errorr"></div>
                <label for="title">Emri i Biznesit</label>
                <br>
                <input type="text" name="title" placeholder="Shkruaj emrin" id="title">
                <div id="comnameError" class="errorr"></div>
                <input type="submit" value="Krijo" style="align-items: center; justify-content: center">
                </div>

                <div class="second" style="margin-left: 10%;">
                <label for="name">Emri</label>
                <br>
                <input type="text" name="name" placeholder="David Keci" id="name">
                <div id="nameError" class="errorr"></div>
            


                <label for="phone">Numri i telfonit</label>
                <br>
                <input type="text" name="phone" placeholder="+355 6(789)1262278" id="phone">
                <div id="numberError" class="errorr"></div>
              
                <label for="created">Data e Krijimit</label>
                <br>
                <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
                <div id="dateError" class="errorr"></div>
                </div>
            
             
              </div>
               

            </form>
        </div>
</body>
<script src="../js/createUserValidation.js"></script>
</html>