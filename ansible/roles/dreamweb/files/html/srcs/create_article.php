<?php
include ("db_connection.php");

if (isset($_POST["info"]) && isset($_POST["cat"]) && isset($_POST["price"]) && 
	isset($_POST["img"]))
{
	launchquery("INSERT INTO items (description, categories, price, img) VALUES (?, ?, ?, ?)", "ssis", 
		array(htmlspecialchars($_POST["info"]), htmlspecialchars($_POST["cat"]), 
		$_POST["price"], htmlspecialchars($_POST["img"])), false);
	header("Location: ../page/admin.php?article=add&&msg=article have been created");
	exit();
}
else
{
	header("Location: ../page/admin.php?article=not_add&&msg=article creation failed");
	exit();
}
?>
