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

	.btn{
		margin-top: 15px;
		float: center;
	}

	h2, p{
		text-align : center;
		margin-bottom: 20px;
	}

	form {
		padding: 20px;
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
echo "<h2>User Information Management</h2>
	  <p class='bg-success'>Database Status : Connected successfully</p>";

mysqli_select_db($conn, $db_name);

// Check for form submission
if (isset($_POST['edit'])) {
	$query = "UPDATE test SET name = '".$_POST['name']."', email = '".$_POST['email']."', phone = '".$_POST['phone']."' WHERE id = ".$_GET['id'];
	mysqli_query($conn, $query);
}

$query = "SELECT * FROM test WHERE id = ".$_GET['id'];
$result = mysqli_query($conn, $query);



if ($result) {
	$data = mysqli_fetch_array($result);

?>

		<form method="POST">
			<div class="row" class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $data['name'];?>" />
			</div>

			<div class="row" class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>" />
			</div>

			<div class="row" class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" class="form-control" value="<?php echo $data['phone'];?>" />
			</div>
			<div class="center-block text-center">
				<input type="submit" name="edit" value="Edit" class='btn btn-default'/>
				<button name="back" value="Back" class='btn btn-info' /><a href="week3.php">Back</a></button>
			</div>
		</form>		
	</div>
</body>
</html>				

<?php
} else {
	echo 'error';
}

?>