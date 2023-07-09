<?php
$msg = '';

if (isset($_GET['id'])) {
    // Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
    if (!empty($_POST['id'])) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $client_id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $company_name = $_POST["title"];
        $date = $_POST["created"];

        // Validate client_id to accept alphanumeric characters

        // Connect to the database
        $conn = require __DIR__ . '/../Database/database.php';

        // Update the record
        $stmt = $conn->prepare('UPDATE klienti SET name = ?, email = ?, phone = ?, company_name = ?, date = ?, client_id = ? WHERE id = ?');
        $stmt->bind_param('ssssssi', $name, $email, $phone, $company_name, $date, $client_id, $_GET['id']);
        $stmt->execute();
        $msg = 'Updated Successfully!';
        header("Location: ./readUser.php");
    }

    $conn = require __DIR__ . '/../Database/database.php';
    $stmt = $conn->prepare('SELECT * FROM klienti WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $contact = $result->fetch_assoc();
 

    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    die("lol");
}

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
    <div class="content update">
        <h1 style="font-size: 30px;">Nrysho te dhenat e klientit</h1>
        <div class="UPDATED"></div>
        <form id="createUserForm" action="../CreateUser/update.php?id=<?= isset($contact['id']) ? $contact['id'] : ''; ?>" method="post">
            <div style="position: relative; display:flex" class="content1">
                <div class="first">
                    <label for="id">ID</label>
                    <br>
                    <input type="text" name="id" placeholder="ID" id="id" value="<?php echo isset($contact['client_id']) ? $contact['client_id'] : ''; ?>">
                    <div id="idError" class="errorr"></div>

                    <label for="email">Email</label>
                    <br>
                    <input type="text" name="email" placeholder="emailijuaj@example.com" id="email" value="<?php echo isset($contact['email']) ? $contact['email'] : ''; ?>">
                    <div id="emailError" class="errorr"></div>

                    <label for="title">Emri i kompanise</label>
                    <br>
                    <input type="text" name="title" placeholder="Shkruaj emrin" id="title" value="<?php echo isset($contact['company_name']) ? $contact['company_name'] : ''; ?>">
                    <div id="comnameError" class="errorr"></div>

                    <input type="submit" value="Ndrysho" style="align-items: center; justify-content: center">
                </div>

                <div class="second" style="margin-left: 10%;">
                    <label for="name">Emri</label>
                    <br>
                    <input type="text" name="name" placeholder="David Keci" id="name" value="<?php echo isset($contact['name']) ? $contact['name'] : ''; ?>">
                    <div id="nameError" class="errorr"></div>

                    <label for="phone">Numri i telfonit</label>
                    <br>
                    <input type="text" name="phone" placeholder="+355 6(789)1262278" id="phone" value="<?php echo isset($contact['phone']) ? $contact['phone'] : ''; ?>">
                    <div id="numberError" class="errorr"></div>

                    <label for="created">Data e Krijimit</label>
                    <br>
                    <input type="datetime-local" name="created" id="created" value="<?php echo isset($contact['created']) ? $contact['created'] : date('Y-m-d\TH:i'); ?>">
                    <div id="dateError" class="errorr"></div>
                </div>
            </div>
        </form>
    </div>

    <script src="../js/updateValidation.js"></script>
</body>

</html>
