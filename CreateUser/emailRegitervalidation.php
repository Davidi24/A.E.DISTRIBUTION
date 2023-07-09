<?php

$mysqli = require_once __DIR__ . '/../Database/database.php';

$email = $_GET["email"];

$sql = "SELECT * FROM klienti WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$isAvailable = $result->num_rows === 0;

header("Content-type: application/json");
echo json_encode(["available" => $isAvailable]);

$stmt->close();
$mysqli->close();
