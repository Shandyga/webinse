<?php 

$mysqli = new mysqli('localhost', 'root', '', 'webinse') or die(mysqli_error($mysqli));

$update = false;
$id = 0;
$first_name = '';
$second_name = '';
$email = '';

if (isset($_GET['save'])) {
	$first_name = $mysqli->real_escape_string(htmlspecialchars($_GET['first_name']));
	$second_name = $mysqli->real_escape_string(htmlspecialchars($_GET['second_name']));
	$email = $mysqli->real_escape_string(htmlspecialchars($_GET['email']));

	$mysqli->query("INSERT INTO users (first_name, second_name, email) VALUES ('$first_name', '$second_name', '$email')") or die($mysqli->error);

	header("location: index.php");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error);
}


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM users WHERE id=$id") or die($mysqli->error);
	//var_dump($result);	
	if ($result->num_rows == 1) {
		$row = $result->fetch_array();
		$first_name = $mysqli->real_escape_string(htmlspecialchars($row['first_name']));
		$second_name = $mysqli->real_escape_string(htmlspecialchars($row['second_name']));
		$email = $mysqli->real_escape_string(htmlspecialchars($row['email']));
	}
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$first_name = $mysqli->real_escape_string(htmlspecialchars($_POST['first_name']));
	$second_name = $mysqli->real_escape_string(htmlspecialchars($_POST['second_name']));
	$email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
	$result = $mysqli->query("UPDATE users SET first_name='$first_name', second_name='$second_name', email='$email' WHERE id=$id") or die($mysqli->error);
	header("location: index.php");
}