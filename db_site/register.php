<?php
include "connect.php";
$valid_username = 'user';
$valid_password = 'pass';

// Get the values from the form
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$username = $_POST['uname'];
$password = $_POST['pwd'];
//hash password stored in the user table
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$isDeveloper = $_POST['dep'];

//echo $hashed_password;


// preparing and executing statment
$sql = "INSERT INTO users(firstname, lastname, username, password, isDeveloper)
values('$firstname','$lastname','$username', '$hashed_password', '$isDeveloper')";
$result = mysqli_query($conn, $sql);
if($result){
echo $firstname. " is registred succesfully!";
header("Location: login.html");
}else{
    echo $firstname. " is fail to register!";
    exit();

}

if ($isDeveloper === 1) {
    $right = "$username will have Developer's privilege";
    mysqli_query($conn, $right);
}
else if ($isDeveloper === 0) {
    $right = "$username will have User's privilege";
    mysqli_query($conn, $right);
}

$conn->close();
?>
