<?php
include ("db_connection.php");
$cookiename = "cart";

if (!isset($_COOKIE[$cookiename]) || !isset($_POST["checkout"]))
{
	header("Location: ../page/article.php?msg=No cart found!");
	exit();
}
if (!isset($_SESSION["user"]["username"]))
{
	header("Location: ../page/connect.php?msg=Please login");
	exit();
}

$command_name = $_SESSION["user"]["username"] . time();
$cart = unserialize($_COOKIE[$cookiename]);
$total = 0;
foreach ($cart as $current)
	$total += $current["price"] * $current["quantity"];

launchquery("INSERT INTO command (cmdname, article, total) VALUES (?, ?, ?)", "ssi", 
	array(htmlspecialchars($command_name), $_COOKIE[$cookiename], $total), false);

setcookie($cookiename, "", time() - 3600, "/");
header("Location: ../page/article.php?msg=Thanks for your purchase!");
exit();
?>
