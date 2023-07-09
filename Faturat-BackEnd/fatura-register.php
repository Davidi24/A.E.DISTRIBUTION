<?php
  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the basic business information
    $businessName = $_POST['businessName'];
    $businessAddress = $_POST['businessAddress'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $taxNumber = $_POST['taxNumber'];
    $bankAccount = $_POST['bankAccount'];

    // Connect to the database
    $conn = require_once __DIR__ . '/../Database/database.php';
    // Assuming you have a function to establish the database connection

    // Insert basic business information into the 'business_info' table
    $stmt = $conn->prepare('INSERT INTO business_info (name, address, phone, email, website, tax_number, bank_accaunt) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param("sssssss", $businessName, $businessAddress, $phone, $email, $website, $taxNumber, $bankAccount);
    $stmt->execute();
    $businessId = $conn->insert_id; // Get the generated business ID

    // Insert product inventory data into the 'product_info' table
    $artikulliList = $_POST['artikull'];
    $emertimiList = $_POST['emerimi'];
    $sasiaList = $_POST['sasia'];
    $njesiaMatseList = $_POST['njesia_matse'];
    $cmimiList = $_POST['cmimi'];
    $totalList = $_POST['total'];
  
    echo"lot";
    $stmt = $conn->prepare('INSERT INTO product_info (artikulli, emertimi, saisa, njesia_matse, cmimi, total, businesss_id) VALUES (?, ?, ?, ?, ?, ?, ?)');

    // Iterate over the product inventory data and execute the insert statement
    foreach ($artikulliList as $index => $artikulli) {
        $emertimi = $emertimiList[$index];
        $sasia = $sasiaList[$index];
        $njesiaMatse = $njesiaMatseList[$index];
        $cmimi = $cmimiList[$index];
        $total = $totalList[$index];

        $stmt->bind_param("ssssssi", $artikulli, $emertimi, $sasia, $njesiaMatse, $cmimi, $total, $businessId);
        $stmt->execute();
 
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();


}
echo"lot";
header("location: ../view/createFatura.php");
?>
