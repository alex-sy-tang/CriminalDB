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
      <li><a href="../dev_pages/sentences_dev.php" class="login">Return</a></li>
      </ul>
   </nav>
   <div id="table_content" class = "container my5">
      <!--<div class="table header"> -->
        <h1>Sentences</h1>
      <!--</div>-->
      <a class = "btn btn-primary" href ="..//functions/sentences_add.php" role = "button"> Add </a>
      <div class = "table holder">
        <table class="table">
          <thead>
            <tr>
                <th>Sentencing ID</th>
                <th>Crime ID</th>
                <th>Sentence Type</th>
                <th>Probation ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number of Violations</th>
            </tr>
          </thead>
          <tbody>
              <?php
                  include_once '../connect.php';
                  mysqli_query($conn, "LOCK TABLES Sentences READ");
                  $sql = "SELECT * FROM Sentences"; 
                  $result = $conn ->query($sql);
                  if (!result){
                    die("invalid query: " . $conn -> error);
                  }
                  while ($row = $result -> fetch_assoc()){
                    echo"
                    <tr>
                        <td>".$rows["Sentencing_ID"]."</td>
                        <td>".$rows["Crimes_ID"]."</td>
                        <td>".$rows["Sentence_type"]."</td>
                        <td>".$rows["Prob_ID"]."</td>
                        <td>".$rows["Start_date"]."</td>
                        <td>".$rows["End_date"]."</td>
                        <td>".$rows["Number_of_violations"]."</td>
                        <a class = 'btn btn-primary' href='../functions/sentencing_update.php?id=$row[Sentencing_ID]'>Update</a>
                        <a class = 'btn btn-danger' href='../functions/sentencing_delete.php?id=$row[Sentencing_ID]'>Delete</a>
                        </td>
                    </tr>
                  ";
                }
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </body>
      </html>






