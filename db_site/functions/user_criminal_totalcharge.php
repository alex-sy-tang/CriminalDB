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

	
</head>
<body>
	<nav>
    	<div class="logo">
      		<h1>CRIMINAL DATABASE</h1>
    	</div>
    	<ul>
			<li><a href="../logout.php" class="login">Logout</a></li>
    	</ul>
        <ul>
			<li><a href="../buttons_users.php" class="login">Back</a></li>
    	</ul>
        <ul>
			<li><a href="../table_pages/criminals.php" class="login">Return</a></li>
    	</ul>
	 </nav>
	<div id="Content">
		<div class="table header">
			<h1>The Criminal's total charges</h1>
		</div>
		<div class = "table holder">
			<table class="full_table">
				<thead>
					<tr>
						<th>Criminal ID</th>
						<th>Last Name </th>
						<th> First Name </th>
						<th>Fine amount</th>
						<th>Court fee</th>
						<th>Amount paid</th>
						<th>Total balance</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
                    $searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                    $searchQuery = (int) $searchQuery;
                    if(empty($searchQuery)) {
                    header('Location: ../login.html');
                    // header('Location: ../dev_pages/criminals.php');
                        }

                    $sql = "(SELECT SUM(cc.Fine_amount) AS Total_Fine, SUM(cc.Court_fee) AS Total_Court_fee, SUM(cc.Amount_paid) AS Total_Amount_paid
                            FROM Crime_charges cc
                             WHERE cc.Crimes_ID IN (SELECT cr.Crimes_ID
                                FROM Crimes cr
                                WHERE cr.Criminal_ID IN (SELECT crim.Criminal_ID
                                                FROM Criminals crim
                                                WHERE crim.Criminal_ID = $searchQuery
                                                )
                                         )
                            )";

                    //Charge result
                    $result = $conn->query($sql);


                    $sql = "SELECT Criminal_ID AS ID, Last_name AS Last, First_name AS First
                         FROM Criminals WHERE Criminals.Criminal_ID = $searchQuery";

                    //Name result
                    $name_result = $conn->query($sql);

                     if ($result->num_rows > 0 && $name_result->num_rows > 0) {
                     $row = $result->fetch_assoc();
                     $name_row = $name_result->fetch_assoc();
                     $totalBalance = $row['Total_Fine'] + $row['Total_Court_fee'] - $row['Total_Amount_paid'];
                     $totalBalance = (double) $totalBalance;
     
								echo"<tr>
									<td>".$name_row["ID"]."</td>
									<td>".$name_row["Last"]."</td>
									<td>".$name_row["First"]."</td>
                                    <td>".$row['Total_Fine']."</td>
                                    <td>".$row['Total_Court_fee']."</td>
                                    <td>".$row['Total_Amount_paid']."</td>
                                    <td>".$totalBalance."</td>
								</tr>";
							
						}else{
							echo"<tr><td colspan = '3'>No results found</td></tr>";
						}
					$conn->close();
					?>
				</tbody>

			</table>
		</div>
	</div>
</body>
</html>
