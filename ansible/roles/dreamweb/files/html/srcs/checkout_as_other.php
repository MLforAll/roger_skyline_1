<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");
$cookiename = "cart";

if (!isset($_COOKIE[$cookiename]) || !isset($_POST["select"]))
{
	header("Location: ../page/admin.php?msg=No cart found!");
	exit();
}
if (!isset($_SESSION["user"]["username"]))
{
	header("Location: ../page/connect.php?msg=Please login");
	exit();
}
if (isset($_POST["select"]) && $_POST["select"] != "None")
{
	$command_name = $_POST["select"] . time();
	$cart = unserialize($_COOKIE[$cookiename]);
	$prices = array();
	$total = 0;
	foreach ($cart as $current)
	{
		array_push($prices, $current["price"]);
		$total += $current["price"] * $current["quantity"];
	}
	launchquery("INSERT INTO command (cmdname, article, total) VALUES (?, ?, ?)", "ssi", 
		array(htmlspecialchars($command_name), $_COOKIE[$cookiename], $total), false);
	setcookie($cookiename, "", time() - 3600, "/");
	header("Location: ../page/admin.php?msg=Thanks for your purchase!");
	exit();
}
header("Location: ../page/admin.php?msg=The purchase as an other user failed");
exit();
?>
