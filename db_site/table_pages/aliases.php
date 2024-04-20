<?php
session_start();
include "../connect.php";


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // User is not logged in, redirect to login page
  header('Location: login.html');
  exit;
}

$sql = " SELECT * FROM Aliases ";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "../styles/style.css">
	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    	<ul>
			<li><a href="../logout.php" class="login">Logout</a></li>
    	</ul>
	 </nav>
	<div id="table_content">
		<div class="table_header">
			<h1>Aliases</h1>
		</div>
		<div class = "table_holder">
			<table class = "full_table">
        		<tr>
        			<th>Alias ID</th>
        			<th>Criminal ID</th>
        			<th>Alias</th>
        		</tr>
        		<?php
        			while($rows=$result->fetch_assoc()){
        		?>
        		<tr>
        			<td><?php echo $rows['Alias_ID'];?></td>
        			<td><?php echo $rows['Criminal_ID'];?></td>
        			<td><?php echo $rows['Alias'];?></td>
        		</tr>
        		<?php
        			}
        		?>
			</table>
		</div>
	</div>
</body>
</html>