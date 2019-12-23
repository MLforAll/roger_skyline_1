<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["change"]) && isset($_POST["select"]))
{
	if (isset($_POST["username"]) && $_POST["username"] != "") 
	{
		launchquery("UPDATE categories SET name=? WHERE name=?", "ss", array(htmlspecialchars($_POST["username"]), 
			htmlspecialchars($_POST["select"])), false);
		header("Location: ../page/admin.php?user=change&msg=Category modification success");
		exit();
	}
	else
	{
		header("Location: ../page/admin.php?user=notchange&msg=Category modification failed");
		exit();
	}
}
else
{
	header("Location: ../page/admin.php?user=notchange&msg=Category modification failed");
	exit();
}
?>
