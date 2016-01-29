<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>

<style>

body{
	font-family: 'Candal', sans-serif;
}

	.container{
		margin-top:20px;
		margin-bottom:20px;
		width:800px;
		background-color:white;
		border:1px solid gray;
		border-radius: 10px;
		padding:20px;
	}

	a{
		color: white;
	}
	a:link {
	    text-decoration: none;
	}

	a:visited {
	    text-decoration: none;
	}

	a:hover {
	    text-decoration: none;
	}

	a:active {
	    text-decoration: none;
	}

	h2, p, th, td
	{
		text-align: center;
	}

	.btn-success
	{
		float: right;
	}

	table{
		margin-top: 55px;
	}

	

</style>

<html>
<body>
	<div class="container">
	<?php
	$server = "127.0.0.1";
	$user = "root@localhost";
	$pass= "";
	$db_name = "test";

	// Create connection
	$conn = mysqli_connect($server, $user, $pass);

	// Check connection
	if (!$conn) {
	    die("<p class='bg-danger'>Database Status : Connection failed</p>");
	}
	echo "<h2>User Information Management System</h2>
		  <p class='bg-success'>Database Status : Connected successfully</p>";

	mysqli_select_db($conn, $db_name);

	$query = "SELECT * FROM test";
	$result = mysqli_query($conn, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
	?>

		<a href='add.php'><button type='button' class='btn btn-success'>Add New</button></a>


	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th colspan="2">Modification</th>
			</tr>
		</thead>
		<tbody>
	<?php
			while($row = mysqli_fetch_array($result)) {
				print "
			<tr>
				<td>".$row['id']."</td>
				<td>".$row['name']."</td>
				<td>".$row['email']."</td>
				<td>".$row['phone']."</td>
				<td><a href='edit.php?id=".$row['id']."'><button type='button' class='btn btn-default'>Edit</button></a></td>
				<td><a href='delete.php?id=".$row['id']."'><button type='button' class='btn btn-danger'>Delete</a></td>			
			</tr>";
			}
	?>
		</tbody>
	</table>
	</div>
</body>
</html>

<?php
	} else {
		echo "<a href='add.php'>Add</a>";
	}
} else {
	echo "no result";
} 
?>