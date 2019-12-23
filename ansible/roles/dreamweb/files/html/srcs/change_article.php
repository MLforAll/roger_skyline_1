<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");
if (isset($_GET["change"]) && isset($_POST["select"]))
{
	$i = 0;
	if (isset($_POST["cat"]) && $_POST["cat"] != "")
	{
		launchquery("UPDATE items SET categories=? WHERE description=?", "ss", 
			array(htmlspecialchars($_POST["cat"]), htmlspecialchars($_POST["select"])), false);
		$i++;
	}
	if (isset($_POST["price"]) && $_POST["price"] > 0)
	{
		launchquery("UPDATE items SET price=? WHERE description=?", "ss", 
			array(htmlspecialchars($_POST["price"]), htmlspecialchars($_POST["select"])), false);
		$i++;
	}
	if (isset($_POST["img"]) && $_POST["img"] != "")
	{
		launchquery("UPDATE items SET img=? WHERE description=?", "ss", 
			array(htmlspecialchars($_POST["img"]), htmlspecialchars($_POST["select"])), false);
		$i++;
	}
	if (isset($_POST["info"]) && $_POST["info"] != "")
	{
		launchquery("UPDATE items SET description=? WHERE description=?", "ss", 
			array(htmlspecialchars($_POST["info"]), htmlspecialchars($_POST["select"])), false);
		$i++;
	}
	if ($i > 0)
	{
		header("Location: ../page/admin.php?article=change&msg=Article modification success");
		exit();
	}
	else
	{
		header("Location: ../page/admin.php?article=notchange&msg=Article modification failed");
		exit();
	}
}
else
{
	header("Location: ../page/admin.php?user=notchange&msg=Article modification failed");
	exit();
}
?>
