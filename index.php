<!DOCTYPE html>
<html lang="en">
<head>
	<title>Users</title>
	<meta charset="utf-8">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/script.js"></script>
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php

		error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

    ?>
	<?php require_once 'crud.php'; ?>
	<div class="container">
		<?php
			$mysqli = new mysqli('localhost', 'root', '', 'webinse') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
		?>

		<div class="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th>First name</th>
						<th>Second name</th>
						<th>E-mail</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<?php while ($row = $result->fetch_assoc()) : ?>  
					<tr>
						<td><?php echo $row['first_name'] ?></td>
						<td><?php echo $row['second_name'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td>
							<a href="index.php?edit=<?php echo $row['id']; ?>"
							class='btn btn-info'>Edit</a>
							<a href="index.php?delete=<?php echo $row['id']; ?>"
							class='btn btn-danger'>Delete</a>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		</div>

		<?php
			//pre_r($result->fetch_assoc());
			function pre_r($array)
			{
				echo "<pre>";
				print_r($array);
				echo "</pre>";
			}
		?>

		<div class="row justify-content-center">
			<form action="crud.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
				<label>First name</label>
				<input type="text" name="first_name" value="<?php echo $first_name ?>" class="form-control" id="first-name">
				</div>
				<div class="form-group">
				<label>Second name</label>
				<input type="text" name="second_name" value="<?php echo $second_name ?>" class="form-control" id="second-name">
				</div>
				<div class="form-group">
				<label>E-mail</label>
				<input type="email" name="email" value="<?php echo $email ?>" class="form-control" id="email">
				</div>
				<div class="form-group">
					<?php  if ($update == true) : ?>
						<button type="submit" class="btn btn-info" name="update">Update</button>
					<?php else: ?>
				<button type="submit" class="btn btn-primary" name="save" onclick="check(event);">Save</button>
				<?php endif; ?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>