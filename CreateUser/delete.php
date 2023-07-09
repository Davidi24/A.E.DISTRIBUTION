<?php
$conn = require __DIR__ . '/../Database/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    // Delete the contact with the specified ID
    $query = "DELETE FROM klienti WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $contactId);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
      echo "ok";
        header("location: ./readUser.php");
    } else {
        // Contact not found or deletion failed
        echo "Failed to delete contact.";
    }

    $stmt->close();
}

$conn->close();
?>
