<?php
include "connect.php";
include "user.php";

// Get the values from the form
$un = $_POST['uname'];
$pass = $_POST['pwd'];
$sql = "SELECT * FROM users WHERE username LIKE '$un'";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)===1){
$row = mysqli_fetch_assoc($result);
//Fill the information for the user
$user = User::addUser($row);

    if ($user->login($un, $pass)) {
        header("Location: buttons.html");
        exit();
        }

// if($row['username'] === $un && password_verify($pass, $row['password'])){
//     echo "login successful!";
//     header("Location: buttons.html");
//     exit;}
        else{
            header("Location: login.html?error=incorrect username or password");
            exit();
        }   
    }else{
        header("Location: login.html?error=incorrect username or password");
        exit();
}
?>