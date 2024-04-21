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
    
<!--       <div class="search-bar">
          <form action="../functions/criminal_totalcharge.php" method = "GET">
            <input type="text" name = "search_query" placeholder="Criminal Charge">
        <button type = "submit">Search</button>
          </form>
      </div> -->
      <ul>
      <li><a href="../logout.php" class="login">Logout</a></li>
      </ul>
  <ul>
      <li><a href="../buttons_developer.php" class="login">Back</a></li>
      </ul>
        <ul>
      <li><a href="../dev_pages/officers_dev.php" class="login">Return</a></li>
      </ul>
   </nav>
    <div id="table_content" class = "container my5">
    <!--<div class="table header"> -->
      <h1>Officers</h1>
    <!--</div>-->
    <a class = "btn btn-primary" href ="..//functions/officers_add.php" role = "button"> Add </a>
    <div class = "table holder">
      <table class="table">
        <thead>
          <tr>
              <th>Officer ID</th>
              <th>Last Name </th>
              <th> First Name </th>
              <th>Precinct</th>
              <th>Badge</th>
              <th>Phone</th>
              <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once '../connect.php';
            mysqli_query($conn, "LOCK TABLES Officers READ");
            $sql = "SELECT * FROM Officers"; 
            $result = $conn ->query($sql);
            if (!result){
              die("invalid query: " . $conn -> error);
            }
            while ($row = $result -> fetch_assoc()){
              echo"
              <tr>
                <td>".$rows["Officer_ID"]."</td>
                <td>".$rows["Last_name"]."</td>
                <td>".$rows["First_name"]."</td>
                <td>".$rows["Precinct"]."</td>
                <td>".$rows["Badge"]."</td>
                <td>".$rows["Phone"]."</td>
                <td>".$rows["Status"]."</td>
                <a class = 'btn btn-primary' href='../functions/officer_update.php?id=$row[Officer_ID]'>Update</a>
                <a class = 'btn btn-danger' href='../functions/officer_delete.php?id=$row[Officer_ID]'>Delete</a>
                </td>
              </tr>";
            }
            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
  </html>

             

