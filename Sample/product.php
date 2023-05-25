<?php
include 'conn.php';
include 'session.php';

if(isset($_POST['add'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$Amount = $_POST['Amount'];
	

	$insert = "insert into info_tbl (firstName,lastName,Amount) values ('$fname','$lname','$Amount')";
	
	if($conn->query($insert)== TRUE){

			echo "Sucessfully add data";
			header('location:maintenance.php');
	}else{

		echo "Ooppss cannot add data" . $conn->connect_error;
		header('location:maintenance.php');
	}
	$insert->close();
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			This is Sample
		</title>
		</head>
	<body>
		<div id="body">
			<div id="menu">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="maintenance.php">Maintenance</a></li>
				<li><a href="logout.php">Logout</a></li>
				<li><a href="category.php">category</a></li>
			</ul>
			</div>
			<div id="content">
				<form action="result.php" method="get" ecntype="multipart/data-form">
						<table align="center">
							<tr>
								<td>Search: <input type="text" name="query"><input type="submit" value="Search" name="search"></td>
							</tr>
						</table>
				</form>
				<form action="maintenance.php" method="POST">
				<table align="center">
					<tr>
						<td>Product Name: <input type="text" name="fname" value="" placeholder="Type Productname here" required></td>
						</tr>
						<tr>
							<td>Product Description: <input type="text" name="lname" placeholder="Type Product Description here.." required></td>
						</tr>
						<td>Amount: <input type="text" name="Amount" value="" placeholder="Type Amount here" required></td>
						</tr>
						<tr>
							<td><input type="submit" name="add" value="Add"></td>
						</tr>
				</table>
			</form>
				<br>
				<table align="center" border="1" cellspacing="0" width="500">
					<tr>
					<th>Product Id</th>
					<th>Product Name</th>
					<th>Product Description</th>
					<th>Amount</th>
					<th>Action</th>
					</tr>
					<?php
					$sql = "SELECT * FROM info_tbl";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td align="center"><?php echo $row['infoID'];?></td>
							<td align="center"><?php echo $row['firstName'];?></td>
							<td align="center"><?php echo $row['lastName'];?></td>
							<td align="center"><?php echo $row['Amount'];?></td>
							<td align="center"><a href="edit.php?infoID=<?php echo md5($row['infoID']);?>">Edit
							</a>/<a href="delete.php?infoID=<?php echo md5($row['infoID']);?>">Delete</a></td>
						</tr>
						<?php
							}	
						}else{
							echo "<center><p> No Records</p></center>";
						}
				
				$conn->close();
				?>
				</table>
			</div>
		</div>
		</body>

</html>