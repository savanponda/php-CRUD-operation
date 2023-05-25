<?php
include 'conn.php';
include 'session.php';

if(isset($_POST['add'])){

	$fname = $_POST['fname'];
	

	$insert = "insert into info_tbl1 (firstName) values ('$fname')";
	
	if($conn->query($insert)== TRUE){

			echo "Sucessfully add data";
			header('location:category.php');
	}else{

		echo "Ooppss cannot add data" . $conn->connect_error;
		header('location:category.php');
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
								<!-- <td>Search: <input type="text" name="query"><input type="submit" value="Search" name="search"></td> -->
							</tr>
						</table>
				</form>
				<form action="category.php" method="POST">
				<table align="center">
					<tr>
						<td>category Name: <input type="text" name="fname" value="" placeholder="Type category name here" required></td>
						</tr>
						<tr>
							<!-- <td>Product Description: <input type="text" name="lname" placeholder="Type Product Description here.." required></td> -->
						</tr>
						<!-- <td>Amount: <input type="text" name="Amount" value="" placeholder="Type Amount here" required></td> -->
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
					<th>category Name</th>
					</tr>
					<?php
					$sql = "SELECT * FROM info_tbl1";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td align="center"><?php echo $row['id'];?></td>
							<td align="center"><?php echo $row['firstName'];?></td>
							<td align="center"><a href="edit.php?id=<?php echo md5($row['id']);?>">Edit
							</a>/<a href="delete.php?id=<?php echo md5($row['id']);?>">Delete</a></td>
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