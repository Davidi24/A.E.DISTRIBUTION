<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../css/logo1.png"/>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      /* Adjust the number of columns as needed */
      grid-gap: 20px;
      /* Adjust the gap between grid items */
    }

    .grid-item {
      border: 1px solid #ccc;
      padding: 10px;
      cursor: pointer;
    }

    .business-name {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .business-details {
      display: none;
      /* Add styles to format the details section as needed */
    }

    .details-row {
      margin-bottom: 5px;
    }

    .label {
      font-weight: bold;
      margin-right: 5px;
    }
  </style>
  <title>Shiko faturat</title>
  <link rel="stylesheet" href="../css/show_fatura.css">

</head>

<body>
  <div class="grid-containerr">


    <h1>Faturat e Krijuara</h1>
    <div class="grid-container">
      <?php
      $mysqli  = require_once __DIR__ . '/../Database/database.php';

      // Create a new MySQLi instance
      // Check connection
      if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
      }

      // Fetch all rows from the business_info table
      $businessInfoQuery = "SELECT * FROM business_info";
      $businessInfoResult = $mysqli->query($businessInfoQuery);

      if ($businessInfoResult->num_rows > 0) {
        // Loop through each business_info row
        while ($businessRow = $businessInfoResult->fetch_assoc()) {
          echo "<div class='grid-item'>";
          echo "<div class='business-name'>";
          echo "<div class='Namee'>Emri i biznesit: " . $businessRow["name"] . "</div>";
          echo "<button class='toggle-details' data-div-id='business-details-" . $businessRow["business_id"] . "'>Shiko detajet</button>";
          echo "</div>";
          echo "<div class='business-details' id='business-details-" . $businessRow["business_id"] . "' style='display: none;'>";
          echo "<h2>Info e Biznesit:</h2>";
          echo "<ul>";
          echo "<li><strong>Id e Biznesit:</strong> " . $businessRow["business_id"] . "</li>";
          echo "<li><strong>Emri i Biznesit:</strong> " . $businessRow["name"] . "</li>";
          echo "<li><strong>Adresa:</strong> " . $businessRow["address"] . "</li>";
          echo "<li><strong>Numri i telefonit:</strong> " . $businessRow["phone"] . "</li>";
          echo "<li><strong>Email:</strong> " . $businessRow["email"] . "</li>";
          echo "<li><strong>Website:</strong> " . $businessRow["website"] . "</li>";
          echo "<li><strong>Numri i takses:</strong> " . $businessRow["tax_number"] . "</li>";
          echo "<li><strong>Akuinti i bankes:</strong> " . $businessRow["bank_accaunt"] . "</li>";
          echo "</ul>";

          // Fetch the product_info rows with matching foreign key
          $productInfoQuery = "SELECT * FROM product_info WHERE businesss_id = " . $businessRow["business_id"];
          $productInfoResult = $mysqli->query($productInfoQuery);

          if ($productInfoResult->num_rows > 0) {
            echo "<div class='pdinfo'>";

            echo "<h2>Info e Produktit:</h2>";
            echo "<table class='TABLEE'>";
            echo "<thead >";
            echo "<tr>";
            echo "<th>Id e Produktit</th>";
            echo "<th>Artikulli</th>";
            echo "<th>Emertimi</th>";
            echo "<th>Sasia</th>";
            echo "<th>Njesia Matse</th>";
            echo "<th>Cmimi</th>";
            echo "<th>Total</th>";
            echo "</tr>";
            echo "</thead>";


            // Output data of each product_info row
            while ($row = $productInfoResult->fetch_assoc()) {
              echo "<div class='BODYY'>";
              echo "<tr BODYYy>";
              echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["product_id"] . "</td>";
              echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["artikulli"] . "</td>";
              echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["emertimi"] . "</td>";
              echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;" . $row["saisa"] . "</td>";
              echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["njesia_matse"] . "</td>";
              echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;" . $row["cmimi"] . "</td>";
              echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;" . $row["total"] . "</td>";
              echo "</tr>";
              echo "</div>";
            }

            echo "</table>";
            echo "</div>";
          } else {
            echo "No product info found for this business.";
          }

          echo "<button class='print-btn' onclick='printDiv(\"business-details-" . $businessRow["business_id"] . "\")'>Print</button>";
          echo "</div>"; // Close business-details div
          echo "</div>"; // Close grid-item div
        }
      } else {
        echo "No business info found.";
      }

      // Close the database connection
      $mysqli->close();
      ?>
    </div>
  </div>

  <script>
    function toggleDetails(divId) {
      const details = document.getElementById(divId);

      if (details.style.display === "none") {
        details.style.display = "block";
      } else {
        details.style.display = "none";
      }
    }

    function printDiv(divId) {
      const printContents = document.getElementById(divId).innerHTML;
      const originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;
      window.print();

      setTimeout(function() {
        document.body.innerHTML = originalContents;
        setupEventListeners();
      }, 100);
    }

    function setupEventListeners() {
      const buttons = document.querySelectorAll(".toggle-details");

      buttons.forEach(function(button) {
        button.addEventListener("click", function() {
          const divId = this.getAttribute("data-div-id");
          toggleDetails(divId);
        });
      });

      const printButtons = document.querySelectorAll(".print-btn");

      printButtons.forEach(function(button) {
        button.addEventListener("click", function() {
          const divId = this.getAttribute("data-div-id");
          printDiv(divId);
        });
      });
    }

    document.addEventListener("DOMContentLoaded", function() {
      setupEventListeners();
    });
  </script>


</body>

</html>