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
			<form action="../srcs/change_setting.php?change=name" method="POST">
				<br>
				<p>Change settings = Login:</p>
				<input class="textbox" name="username" type="text" 
										   placeholder="new Login here" value="">
				<br>
				<input class="submit" type="submit" value="Change Name">
			</form>
			<form action="../srcs/change_setting.php?change=password" method="POST">
				<br>
				<p>Change settings = old Password :</p>
				<input class="textbox" name="old_userpasswd" type="password" 
											 placeholder="old Password here" value="">
				<p>Change settings = new Password :</p>
				<input class="textbox" name="new_userpasswd" type="password" 
											 placeholder="new Password here" value="">
				<br>
				<input class="submit" type="submit" value="Change Password">
			</form>
		</div>
	</body>
		<?php include("../includes/script.php");?>
</html>
