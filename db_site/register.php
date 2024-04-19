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
$isPolice = $_POST['police'];

//echo $hashed_password;


// preparing and executing statment
$sql = "INSERT INTO users(firstname, lastname, username, password, isPolice)
values('$firstname','$lastname','$username', '$hashed_password', '$isPolice')";
$result = mysqli_query($conn, $sql);
if($result){
echo $firstname. " is registred succesfully!";
//Grant privilege
if ($isDeveloper === 1) {
    $right = "GRANT Developer to $username WITH GRANT OPTION";
    mysqli_query($conn, $right);
}
else if ($isDeveloper === 0) {
    $right = "GRANT Viewer to $username";
    mysqli_query($conn, $right);
}


header("Location: login.html");
exit;
}else{
    echo $firstname. " is fail to register!";
    exit();

}


$conn->close();
?>
