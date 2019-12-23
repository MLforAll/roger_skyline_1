<?php include("../srcs/db_connection.php");?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("../includes/header.php");?>
	</head>
	<body>
		<?php include("../includes/nav.php");?>
		<?php include("../includes/notification.php");?>
		<div class="container">
			<form action="../srcs/login.php?connect" method="POST">
				<p>Login :</p>
				<input class="textbox" name="username" type="text" 
				placeholder="Login here" value="">
				<br>
				<p>Password :</p>
				<input class="textbox" name="userpasswd" type="password" 
				placeholder="Password here" value="">
				<br>
				<input class="submit" type="submit" value="Connect">
				<br>
				<a href="signin.php">
					<input class="submit" type="button" value="new user">
				</a>
			</form>
		</div>
	</body>
		<?php include("../includes/script.php");?>
</html>
