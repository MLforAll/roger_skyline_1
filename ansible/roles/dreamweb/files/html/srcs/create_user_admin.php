<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["add"]))
{
	if (isset($_POST["username"]) && isset($_POST["userpasswd"]))
	{
		$pss = hash("sha256", htmlspecialchars($_POST["userpasswd"]));
		launchquery("INSERT INTO users (name, password) VALUES (?, ?)", "ss", 
			array(htmlspecialchars($_POST["username"]), $pss), false);
		header("Location: ../page/admin.php?user=add&&msg=account have been created");
		exit();
	}
}
else
{
	header("Location: ../page/admin.php?user=not_add&&msg=account creation failed");
	exit();
}
?>
