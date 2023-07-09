<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../css/logo1.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <link rel="stylesheet" href="../css/create_fatura.css">

</head>

<body>

<button id="Home"> Faqja Kryesore</button>
<script>
    function locationn() {
    window.location.href = "../CreateUser/index1.php";
  }
      var SHBillbutton = document.getElementById("Home");
  SHBillbutton.addEventListener("click", locationn);

</script>

    <div class="create_fatura_continer">
        <form action="../Faturat-BackEnd/fatura-register.php" method="post" enctype="multipart/form-data" id="productForm">


            <h1 id="doc_title">Krijo faturen e biznesit</h1>

<div style="margin-left: 4%;">



            <div style="display: flex;" class="first_line">
                <div class="businessName">
                    <h2>1. Emri i Biznesit</h2>
                    <p>-Vendosni emrin e biznesit:</p>
                    <input class="INPUTS" type="text" name="businessName" id="businessNameInput" placeholder="Emri i biznesit">
                    <div class="error businessName"></div>
                </div>
                <div class="businessName">
                    <h2>2. Adresa e biznesit</h2>
                    <p>-Vendosni adresen e biznesit:</p>
                    <input class="INPUTS" type="text" name="businessAddress" id="businessAddressInput" placeholder="Adresa e biznesit">
                    <div class="error businessAddress"></div>
                </div>

            </div >

            <br>


            <div style="display: flex;" class="first_line">
                <div class="businessName">
                    <h2>3. Numri i indendifikimit te takses</h2>
                    <p>-Vendosni numrin e indendifikimit te takses:</p>
                    <input class="INPUTS" type="text" name="taxNumber" id="taxNumberInput" placeholder="Numri i indendifikimit te takses">
                    <div class="error taxNumberInput"></div>
                </div>
                <div class="businessName">
                    <h2>4. Llogaria bankare e biznesit</h2>
                    <p>-Vendosni llogarin bankare te biznesit:</p>
                    <input class="INPUTS" type="text" name="bankAccount" id="bankAccountInput" placeholder="Llogaria bankare e biznesit">
                    <div class="error bankAccountInput"></div>
                </div>
            </div>
<br>

            <div>
                <h2>5. Kontaktet</h2>
                <p>-Vendosni kontaktet tuaja</p>
           <div style="display: flex;" class="second_line">
           <div >
             <input class="INPUTS" type="text" name="phone" id="phoneInput" placeholder="Numri i telefonit">
                <div class="error phone"></div>
             </div>
            <div>
            <input class="INPUTS" type="text" name="email" id="emailInput" placeholder="Email">
                <div class="error email"></div>
            </div>
              <div>
              <input class="INPUTS" type="text" name="website" id="websiteInput" placeholder="Website">
                <div class="error websiteInput"></div>
              </div>
           </div>
            </div>

            </div>

        <br>

            <h1>Inventati i produktit</h1>

            <div style=" position:relative; " class="tableDiv">
            <table class="TABLE styled-table">
           
            <thead style=" position:relative; width:80%" >
                    <tr>
                        <th>Artikulli</th>
                        <th>Emerimi</th>
                        <th>Sasia</th>
                        <th>Njesia Matse</th>
                        <th>Cmimi</th>
                        <th>Total</th>
                        <td ></td>
                       
                    </tr>
                </thead>

                <tbody id="productTableBody"  style="width: 110%;" >
                    <tr>
                        <td><input class="INPUTS" type="text" name="artikull[]" id="artikull"/></td>
                        <div class="error artikull"></div>
                        <td><input class="INPUTS" type="text" name="emerimi[]" id="emerimi"/></td>
                        <div class="error emerimi"></div>
                        <td><input class="INPUTS" type="text" name="sasia[]" id="sasia"/></td>
                        <div class="error sasia"></div>
                        <td><input class="INPUTS" type="text" name="njesia_matse[]" id="njesia_matse"/></td>
                        <div class="error njesia_matse"></div>
                        <td><input class="INPUTS" type="text" name="cmimi[]" id="cmimi"/></td>
                        <div class="error cmimi"></div>
                        <td><input class="INPUTS" type="text" name="total[]" readonly id="total"/></td>
                        <div class="error total"></div>
                       
                        <td>
                            <button   type="button" class="deleteRowBtn" style=" font-size: 15px; font-weight: bold;">x</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        
          
            <button type="button" id="addRowBtn" style="margin-top: 0.5%;">+</button>
            <br>
            <br>
            <button type="submit" id="submitButton">Submit</button>
        </form>
    </div>

    <script src="../js/faturat.js"></script>


    <script>
       document.getElementById("addRowBtn").addEventListener("click", function () {
    var tableBody = document.getElementById("productTableBody");
    var newRow = document.createElement("tr");

    newRow.innerHTML = `
        <td><input type="text"  name="artikull[]" class="artikull INPUTS" /></td>
        <td><input type="text" name="emerimi[]" class="emerimi INPUTS" /></td>
        <td><input type="text" name="sasia[]" class="sasia INPUTS" /></td>
        <td><input type="text" name="njesia_matse[]" class="njesia_matse INPUTS" /></td>
        <td><input type="text" name="cmimi[]" class="cmimi INPUTS" /></td>
        <td><input type="text" name="total[]" readonly class="total INPUTS" /></td>
        <td>
        <button   type="button" class="deleteRowBtn" style=" font-size: 15px; font-weight: bold;">x</button>
        </td>
    `;

    tableBody.appendChild(newRow);

    // Add event listeners for the new row inputs
    var sasiaInputs = tableBody.getElementsByClassName("sasia");
    var cmimiInputs = tableBody.getElementsByClassName("cmimi");
    var totalInputs = tableBody.getElementsByClassName("total");

    for (var i = 0; i < sasiaInputs.length; i++) {
        sasiaInputs[i].addEventListener("input", calculateTotal);
        cmimiInputs[i].addEventListener("input", calculateTotal);
    }
});

function calculateTotal() {
    var row = this.parentNode.parentNode;
    var sasia = parseFloat(row.querySelector(".sasia").value);
    var cmimi = parseFloat(row.querySelector(".cmimi").value);
    var total = isNaN(sasia) || isNaN(cmimi) ? 0 : sasia * cmimi;
    row.querySelector(".total").value = total.toFixed(2);
}

document.addEventListener("click", function (event) {
    if (event.target.classList.contains("deleteRowBtn")) {
        var row = event.target.parentNode.parentNode;
        var tableBody = row.parentNode;

        tableBody.removeChild(row);
    }
});

// Add event listeners for the initial row inputs
var sasiaInputs = document.getElementsByClassName("sasia");
var cmimiInputs = document.getElementsByClassName("cmimi");
var totalInputs = document.getElementsByClassName("total");

for (var i = 0; i < sasiaInputs.length; i++) {
    sasiaInputs[i].addEventListener("input", calculateTotal);
    cmimiInputs[i].addEventListener("input", calculateTotal);
}

    </script>
</body>

</html>