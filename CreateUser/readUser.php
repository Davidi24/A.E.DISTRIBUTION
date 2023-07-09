<?php

$conn = require __DIR__ . '/../Database/database.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM klienti";
$result = $conn->query($query);


if ($result) {

    $contacts = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error: " . $conn->error;
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
<div class="content read">
	<h2 style="font-size: 30px; margin-bottom: 0;">Te dhenat e klienteve</h2>
	<a href="./createUser.php" class="create-contact">Krijo Klientin</a>



	<table class="tableee">
        <thead>
            <tr>
                <td style="position: relative;
    width: 5%;">#</td >
                <td class="INPUTS">Id e klientit</td >
                <td class="INPUTS">Emri</td >
                <td class="INPUTS">Email</td >
                <td class="INPUTS">Numri</td >
                <td class="INPUTS">Emri i Biznesit</td >
                <td class="INPUTS">Data e Krijimit</td >
                <td class="INPUTS"></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td style="position: relative; width: 5%;"><?= $contact['id'] ?></td>
                <td class="INPUTS"><?= $contact['client_id'] ?></td>
                <td class="INPUTS"><?= $contact['name'] ?></td>
                <td class="INPUTS"><?= $contact['email'] ?></td>
                <td class="INPUTS"><?= $contact['phone'] ?></td>
                <td class="INPUTS"><?= $contact['company_name'] ?></td>
                <td class="INPUTS"><?= $contact['date'] ?></td>
                <td class="actions INPUTS">
       


<div style="width: 90%; display:flex;">
<?php if (!empty($contact) && isset($contact['id'])): ?>
    <a style="margin-right: 7px;"href="./update.php?id=<?= $contact['id']; ?>" class="edit">
        <i class="fa-pen fa-xs" style="height: 17.9px; margin-top: -1px;">
            <ion-icon name="create-sharp"></ion-icon>
        </i>
    </a>
<?php endif; ?>


<a href="../CreateUser/delete.php?id=<?= isset($contact['id']) ? $contact['id'] : ''; ?>" class="trash">
    <i class="fas fa-trash fa-xs"></i>
    <ion-icon name="trash-outline"></ion-icon>
</a>

</div>


                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
	<div class="pagination">
	</div>
</div>
<script src="../js/readUser-buttons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
