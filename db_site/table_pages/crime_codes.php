<?php

$user = 'root';
$password = '';

$database = 'jail';

$servername = 'localhost:80';
$mysqli = new mysqli($serverame, $user, $password, $database);

if ($mysqli -> connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = " SELECT * FROM Crime_codes ";
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
	<div class="table_content">
		<div class="table header">
			<h1>Crime Codes</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<tr>
					<th>Crime Code</th>
					<th>Code Description</th>
				</tr>
				<?php
					while($rows=$result->fetch_assoc()){

				?>
				<tr>
						<td><?php echo $rows['Crime_code'];?></td>
						<td><?php echo $rows['Code_description'];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
