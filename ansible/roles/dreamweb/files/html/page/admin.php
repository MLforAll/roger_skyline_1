<?php 
include("../srcs/db_connection.php");
include ("../includes/admin_auth.php");
;?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("../includes/header.php");?>
	</head>
	<body>
		<?php include("../includes/admin_nav.php");?>
		<?php include("../includes/notification.php");?>

		<!-- ==================================USER=================================-->

		<div id="users" class="admin_container"> Users:
			<form action="../srcs/create_user_admin.php?add" method="POST">
				<p>Create user = login:</p>
				<input class="textbox" name="username" type="text" 
										   placeholder="Login here" value="">
				<br>
				<p>Create user = Password :</p>
				<input class="textbox" name="userpasswd" type="password" 
											 placeholder="Password here" value="">
				<br>
				<input class="submit" type="submit" value="Create user">
			</form>

			<form action="../srcs/change_user.php?change" method="POST">
				<p>Change user = Select:</p>
				<select class="select_user" name="select">
					<option value="None">None</option>
					<?php include("../includes/option_user.php");?>
				</select>
				<br>
				<p>Change user = Login:</p>
				<input class="textbox" name="username" type="text" 
										   placeholder="New login here" value="">
				<br>
				<p>Change user = Password :</p>
				<input class="textbox" name="userpasswd" type="password" 
											 placeholder="New password here" value="">
				<br>
				<p>Change user = class :</p>
				<input class="textbox" name="userclass" type="text" 
											placeholder="New class here" value="">
				<br>
				<input class="submit" type="submit" value="Change user">
			</form>

			<form  action="../srcs/delete_user.php?delete" method="POST">
				<p>Delete user = Select:</p>
				<select class="select_user" name="del_us">
					<option value="None">None</option>
					<?php include("../includes/option_user.php");?>
				</select>
				<br>
				<p>Delete user = Confirm:</p>
				<input class="textbox" name="confirm" type="password" 
										  placeholder="Enter admin password here" value="">
				<br>
				<input class="submit" type="submit" value="Delete user">
			</form>
		</div>

		<!-- ===============================ARTICLE=================================-->

		<div id="article" class="admin_container"> Articles:
			<form action="../srcs/create_article.php" method="POST">
				<p>add Article = description:</p>
				<input class="textbox" name="info" type="text" placeholder="Enter article name">
				<br>
				<p>add Article = category:</p>
				<input class="textbox" name="cat" type="text" placeholder="Enter article category">
				<br>
				<p>add Article = price:</p>
				<input class="input_num" name="price" type="number" placeholder="Enter article price">
				<br>
				<p>add Article = img:</p>
				<input class="textbox" name="img" type="text" placeholder="Enter article">
				<br>
				<input class="submit" type="submit" value="Create article">
			</form>

			<form action="../srcs/change_article.php?change" method="POST">
				<p>Select <b>article</b> name</p>
				<select class="select_user" name="select">
					<option value="None">None</option>
					<?php include("../includes/option_article.php");?>
				</select>
				<br>
				<p>Change <b>article</b> name</p>
				<input class="textbox" name="info" type="text" placeholder="Enter article name">
				<br>
				<p>Change <b>article</b> category</p>
				<input class="textbox" name="cat" type="text" placeholder="Enter article category">
				<br>
				<p>Change <b>article</b> price</p>
				<input class="input_num" name="price" type="number" placeholder="Enter article price">
				<br>
				<p>Change <b>article</b> img</p>
				<input class="textbox" name="img" type="text" placeholder="Enter article image">
				<br>
				<input class="submit" type="submit" value="Change article">
			</form>


			<form action="../srcs/delete_article.php?delete" method="POST">
				<p>Delete <b>article</b></p>
				<select class="select_user" name="del_art">
					<option value="None">None</option>
					<?php include("../includes/option_article.php");?>
				</select>
				<br>
				<p>Delete <b>article</b> - Confirm</p>
				<input class="textbox" name="confirm" type="password" 
										  placeholder="Enter admin password here" value="">
				<br>
				<input class="submit" type="submit" value="Delete article">
			</form>
		</div>

		<!-- ===============================CATEGORY================================-->
		<div id="categories" class="admin_container"> Categories:
			<form action="../srcs/create_cat.php?add" method="POST">
				<p>Create <b>category</b> - Name</p>
				<input class="textbox" name="catname" type="text" 
										  placeholder="New category name here" value="">
				<br>
				<input class="submit" type="submit" value="Create category">
			</form>

			<form action="../srcs/change_cat.php?change" method="POST">
				<p>Change <b>category</b> - Select</p>
				<select class="select_user" name="select">
					<option value="None">None</option>
					<?php include("../includes/option_cat.php");?>
				</select>
				<br>
				<p>Change <b>category</b> name</p>
				<input class="textbox" name="username" type="text" 
										   placeholder="New category Name here" value="">
				<br>
				<input class="submit" type="submit" value="Change category">
			</form>

			<form  action="../srcs/delete_cat.php?delete" method="POST">
				<p>Delete <b>category</b> - Select</p>
				<select class="select_user" name="del_cat">
					<option value="None">None</option>
					<?php include("../includes/option_cat.php");?>
				</select>
				<br>
				<p>Delete <b>user</b> - Confirm</p>
				<input class="textbox" name="confirm" type="password" 
										  placeholder="Enter admin password here" value="">
				<br>
				<input class="submit" type="submit" value="Delete category">
			</form>
		</div>

		<!-- ===============================COMMANDE================================-->
		<div id="command" class="admin_container"> Commands:
			<form action="cart_as_admin.php" method="POST">
				<p>View and modify a command - Select</p>
				<select class="select_user" name="select">
					<option value="None">None</option>
					<?php include("../includes/option_cmd.php");?>
				</select>
				<br>
				<input class="submit" type="submit" value="View Command">
			</form>

			<form action="../srcs/checkout_as_other.php" method="POST">
				<p>Do a command as an other user - Select</p>
				<select class="select_user" name="select">
					<option value="None">None</option>
					<?php include("../includes/option_user.php");?>
				</select>
				<input class="submit" type="submit" value="Do the checkout as user">
			</form>

			<form  action="../srcs/delete_cmd.php?delete" method="POST">
				<p>Delete command - Select</p>
				<select class="select_user" name="del_cmd">
					<option value="None">None</option>
					<?php include("../includes/option_cmd.php");?>
				</select>
				<br>
				<p>Delete command - Confirm</p>
				<input class="textbox" name="confirm" type="password" 
										  placeholder="Enter admin password here" value="">
				<br>
				<input class="submit" type="submit" value="Delete category">
			</form>
		</div>
				<br><br><br><br><br><br>
	</body>
	<?php include("../includes/script.php");?>
</html>
