<?php

$user = 'root';
$password = '';

$database = 'jail';

$servername = 'localhost:3306';
$mysqli = new mysqli($serverame, $user, $password, $database);

if ($mysqli -> connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM Criminals ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "styles/style.css">
	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    
    	<div class="search-bar">
      		<form action="#">
        		<input type="text" placeholder="Search">
      		</form>
    	</div>
    	<ul>
     		 <li><a href="#" class="login">Login</a></li>
    	</ul>
	 </nav>
	<div id="Content">
		<div class="table header">
			<h1>Criminals</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<tr>
					<th>Criminal ID</th>
					<th>Last Name </th>
					<th> First Name </th>
					<th>Street</th>
					<th>City</th>
					<th>State</th>
					<th>Zip Code</th>
					<th>Phone Number</th>
					<th>Violent Offender Status</th>
					<th>Probation Status</th>
				</tr>
				<?php
					while($rows=$result->fetch_assoc()){

				?>
				<tr>
						<td><?php echo $rows['Criminal_ID'];?></td>
						<td><?php echo $rows['Last_name'];?></td>
						<td><?php echo $rows['First_name'];?></td>
						<td><?php echo $rows['Street'];?></td>
						<td><?php echo $rows['City'];?></td>
						<td><?php echo $rows['State_US'];?></td>
						<td><?php echo $rows['Zip'];?></td>
						<td><?php echo $rows['phone_number'];?></td>
						<td><?php echo $rows['V_status'];?></td>
						<td><?php echo $rows['P_status'];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
