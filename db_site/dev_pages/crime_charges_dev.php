<?php
    session_start();
    include "../connect.php";

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
      // User is not logged in, redirect to login page
      header('Location: ../login.html');
      exit;
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" href = "../styles/style.css">
  <link rel="stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src = "ps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>pt>
</head>
<body>
  <nav>
      <div class="logo">
          <h1>CRIMINAL DATABASE</h1>
      </div>
    
     <!-- <div class="search-bar">
         <form action="../functions/criminal_totalcharge.php" method = "GET">
            <input type="text" name = "search_query" placeholder="Criminal Charge">
        <button type = "submit">Search</button>
          </form>
      </div>-->
      <ul>
      <li><a href="../logout.php" class="login">Logout</a></li>
      </ul>
  <ul>
      <li><a href="../buttons_developer.php" class="login">Back</a></li>
      </ul>
        <ul>
      <li><a href="../dev_pages/crime_charges_dev.php" class="login">Return</a></li>
      </ul>
   </nav>
  <div id="table_content" class = "container my5">
    <!--<div class="table header"> -->
      <h1>Crime Charges</h1>
  <a class = "btn btn-primary" href ="..//functions/criminals_add.php" role = "button"> Add </a>
  <div class = "table holder">
  <table class="table">
        <thead>
          <tr>
              <th>Charge ID</th>
              <th>Crimes_ID</th>
              <th> Crime Code</th>
              <th>Charge Status</th>
              <th>Fine Amount</th>
              <th>Court Fee</th>
              <th>Amount Paid</th>
              <th>Payment Due Date</th>
          </tr>
        </thead>
        <?php
          include_once '../connect.php';
          mysqli_query($conn, "LOCK TABLES Crime_charges READ");
          $sql = "SELECT * FROM Crime_charges"; 
          {$result = $conn ->query($sql);
                        if (!result){
                          die("invalid query: " . $conn -> error);
                        }
                        while ($row = $result -> fetch_assoc()){
                          echo"
                          <tr>
                            <td>".$rows['Charge_ID']."</td>
                            <td>".$rows['Crimes_ID']."</td>
                            <td>".$rows['Crime_code']."</td>
                            <td>".$rows['Charge_status']."</td>
                            <td>".$rows['Fine_amount']."</td>
                            <td>".$rows['Court_fee']."</td>
                            <td>".$rows['Amount_paid']."</td>
                            <td>".$rows['Pay_due_date']."</td>
                            <a class = 'btn btn-primary' href='../functions/charges_update.php?id=$row[Charge_ID]'>Update</a>
                            <a class = 'btn btn-danger' href='../functions/charges_delete.php?id=$row[Charge_ID]'>Delete</a>
                            </td>
                            </tr>
                            "; }
                              $conn->close();
                              ?>
                            </table>
                          </div>
                        </div>
                      </body>
                      </html>
                      

                