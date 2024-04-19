<?php

$user = 'root';
$password = '';

$database = 'jail';

$servername = 'localhost:80';
$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli -> connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM Appeals ";
$result = $mysqli->query($sql);
$mysqli->close();
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
     		 <li><a href="../login.html" class="login">Login</a></li>
    	</ul>
	 </nav>
	<div class="table_content">
		<div class="table header">
			<h1>Appeals</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<tr>
					<th>Appeal ID</th>
					<th>Crime ID </th>
					<th>Filing Date</th>
					<th>Hearing Date</th>
					<th>Appeal Status</th>
				</tr>
				<?php
					while($rows=$result->fetch_assoc()){

				?>
				<tr>
						<td><?php echo $rows['Appeal_ID'];?></td>
						<td><?php echo $rows['Crimes_ID'];?></td>
						<td><?php echo $rows['Filing_date'];?></td>
						<td><?php echo $rows['Hearing_date'];?></td>
						<td><?php echo $rows['Status'];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
