<?php
session_start();
include "../connect.php";
include '../user.php';


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // User is not logged in, redirect to login page
  header('Location: ../login.html');
  exit;
}

User::checkPerm();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Select Tables</title>
  <style>
    nav {
      background-color: #3a3a3a;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.7% 21%;
      font-family: "Helvetica";
    }
    h1 {
          text-align: left;
          color: black;
          vertical-align: center;
          margin-left: 20px;
          font-size: 30px;
    }
    h3 {
          margin: 0; /* Remove default body margin */
          display: flex; /* Make body a flex container */
          justify-content: center; /* Center content horizontally */
          align-items: center; /* Center content vertically (optional) */
          margin: 26px;
          font-size: 25px;
    }
        
    body {
          margin: 0px;
          font-family: "Helvetica";
          justify-content: center;
          align-items: center;
    }
    #Header {
          background-color: grey;
          height: 10vh;
          vertical-align: top;
          padding-top: 0px;
          padding-bottom: 0px;
          border-top: 0px;
    }

    #Content {
          vertical-align: top;
          padding: 10vw;
          border-top: 0px;

    }
    .logo h1 {
          margin: 0;
          font-weight: bold;
          color: #FFFFFF;
      }
    .buttons {
       display: flex;
       flex-wrap: wrap;
       justify-content: center;
       align-items: center;
       text-align: center;
       margin: 0 auto;
       margin-top: 50px;
       width: 80vw;
    
    }
    .button_li {
      text-align: center;
      align-items: center;
      vertical-align: center;
      margin: 30px;
      width: 15 vw;
      height: 30 vh;
    }

    .buttons a {
      padding: 20px 40px;
      background-color: #EDEDED;
      border-radius: 8px;
      border-color: darkgrey;
      font-family: "Helvetica";
      font-size: 3vh;
      align-items: center;
      vertical-align: center;
    }
    ul li a {
            display: inline-block;
        }

    ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

    li {
            display: inline-block;
/*            margin-left: 20px;*/
          
        }
        
    .login {
            color: #FF9051;
        }

    a {
            text-decoration: none;
        }

    .search-bar {
          display: flex;
          align-items: center;
        }

    .search-bar form {
          position: relative;
        }

    .search-bar input[type="text"] {
          padding: 5px 10px;
          border: 0px;
          border-radius: 5px;
          font-size: 16px;
          background-color: #4f4f4f
        }
  </style>

  <!--link rel = "stylesheet" href = "styles/style.css"-->
</head>
<body>
  <nav>
    <div class="logo">
      <h1>CRIMINAL DATABASE</h1>
    </div>
    
    <ul>
      <li><a href="logout.php" class="login">Logout</a></li>

    </ul>
  </nav>
  <h3>Select data to view</h3>
  <div class="buttons">
  <ul>
    <li class = "button_li"><a href="dev_pages/aliases.php" style="color: black">Aliases</a></li>
    <li class = "button_li"><a href="dev_pages/criminals.php" style="color: black">Criminals</a></li>
    <li class = "button_li"><a href="dev_pages/crimes_dev.php" style="color: black">Crimes</a></li>
    <li class = "button_li"><a href="dev_pages/sentences_dev.php" style="color: black">Sentences</a></li>
    <li class = "button_li"><a href="dev_pages/crime_charges_dev.php" style="color: black">Crime charges</a></li>
    <li class = "button_li"><a href="dev_pages/officers_dev.php" style="color: black">Officers</a></li>
    <li class = "button_li"><a href="dev_pages/appeals_dev.php" style="color: black">Appeals</a></li>
    <li class = "button_li"><a href="dev_pages/crime_codes_dev.php" style="color: black">Crime codes</a></li>
    <li class = "button_li"><a href="dev_pages/probation_officers_dev.php" style="color: black">Probation officers</a></li>
    <li class = "button_li"><a href="dev_pages/crime_officers_dev.php" style="color: black">Crime officers</a></li>
  </ul>
  </div>
</body>
</html>
