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

$query = "DELETE FROM test WHERE id = ".$_GET['id'];
mysqli_query($conn, $query);

header("Location: http://localhost:8080/php_homework/week3.php");
die();
?>