<?php

$mySqli = require __DIR__ . "/database.php";

$email = $mySqli->real_escape_string($_POST["email"]);
$sql = sprintf("SELECT * FROM user WHERE email = '%s'", $email);
$result = $mySqli->query($sql);
$user = $result->fetch_assoc();
$isAvailable1 = false;
$value = trim($_POST["password"], '"');

if ($user) {
    if (password_verify($value, $user["password"])) {
        $isAvailable1 = true;
    }
}

header("Content-type: application/json");
echo json_encode(["available" => $isAvailable1]);
