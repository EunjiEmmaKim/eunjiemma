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

	h2{
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
	<h2>Add New User</h2>
		<form method="POST">
			<div class="row" class="form-group">
				<label>ID</label>
				<input type="text" class="form-control" name="id_add" />
			</div>

			<div class="row" class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name_add" />
			</div>

			<div class="row" class="form-group">
				<label>Email</label>
				<input type="text" class="form-control" name="email_add" />
			</div>

			<div class="row" class="form-group">
				<label>Phone</label>
				<input type="text" class="form-control" name="phone_add" />
			</div>
			<div class="center-block text-center">
				<input type="submit" class="btn btn-success" name="add" value="Add" />
				<button class="btn btn-info" name="back" value="Back" /><a href="week3.php">Back</a></button>
			</div>
		</form>
	</div>

</body>
</html>

<?php
$server = "127.0.0.1";
$user = "root@localhost";
$pass= "";
$db_name = "test";


// Create connection
$conn = mysqli_connect($server, $user, $pass);

// Check connection
if (!$conn) {
    die("Connection failed");
}

mysqli_select_db($conn, $db_name);

// Check for form submission
if (isset($_POST['add'])) {
	$query = "INSERT INTO test (id, name, email, phone) VALUES ('".$_POST["id_add"]."','".$_POST["name_add"]."','".$_POST["email_add"]."','".$_POST["phone_add"]."')";
	mysqli_query($conn, $query);
}

$query = "SELECT * FROM test";
$result = mysqli_query($conn, $query);

if ($result) {
	$data = mysqli_fetch_array($result);
} 
else {
	echo 'error';
}

?>
