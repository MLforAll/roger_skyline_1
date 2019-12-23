<?php
include ("db_connection.php");

function quit($s)
{
	$page = "../page/article.php";
	header("Location: " . $page . "?msg=" . $s);
	exit();
}

$cookiename = "cart";

foreach ($_POST as $key => $value)
{
	if ($value == "Add to cart")
	{
		$desc = $key;
		break;
	}
}
$quantity = $_POST["quantity"];
if ($quantity < 1)
	quit("Adding to cart failed!");
$a = explode('/', $desc);
$a[0] = str_replace('_', ' ', $a[0]);
$new = array("art" => $a[0], "quantity" => $quantity, "price" => $a[1]);
if (isset($_COOKIE[$cookiename]))
	$cart = unserialize($_COOKIE[$cookiename]);
else
	$cart = array();
$found = false;
for ($i = 0; $i < count($cart); $i++)
{
	if ($cart[$i]["art"] == $a[0])
	{
		$cart[$i]["quantity"] += $quantity;
		$found = true;
		break;
	}
}
if ($found === false)
	array_push($cart, $new);
date_default_timezone_set("Europe/Paris");
setcookie($cookiename, serialize($cart), time() + 60*60*24*30, "/");
quit("Added " . $quantity . " " . $a[0] . " to cart!");
?>
