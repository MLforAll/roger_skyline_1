<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["add"]))
{
	if (isset($_POST["catname"]))
	{
		launchquery("INSERT INTO categories (name) VALUES (?)", "s", 
			array(htmlspecialchars($_POST["catname"])), false);
		header("Location: ../page/admin.php?cat=add&&msg=category have been created");
		exit();
	}
}
else
{
		header("Location: ../page/admin.php?cat=not_add&&msg=category creation failed");
		exit();
}
?>
