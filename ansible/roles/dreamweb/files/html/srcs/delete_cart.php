<?php
include ("db_connection.php");
$cookiename = "cart";

if (!isset($_COOKIE[$cookiename]))
{
	header("Location: ../page/article.php?msg=No cart found!");
	exit();
}
if (isset($_POST["del_cart"]))
{
	setcookie($cookiename, "", time() - 3600, "/");
	header("Location: ../page/cart.php?msg=Deleted cart!");
	exit();
}
$name = false;
foreach ($_POST as $key => $value)
{
	if ($value == "Delete")
	{
		$name = str_replace('_', ' ', $key);
		break;
	}
}
if ($name === false)
{
	header("Location: ../page/cart.php?msg=Error deleting item!");
	exit();
}
$cart = unserialize($_COOKIE[$cookiename]);
date_default_timezone_set("Europe/Paris");
if (count($cart) <= 1)
	setcookie($cookiename, "", time() - 3600, "/");
else
{
	for ($i = 0; $i < count($cart); $i++)
	{
		if ($cart[$i]["art"] == $name)
		{
			unset($cart[$i]);
			break;
		}
	}
	setcookie($cookiename, serialize($cart), time() + 60*60*24*30, "/");
}
header("Location: ../page/cart.php?msg=Deleted " . $name . " from cart!");
exit();
?>
