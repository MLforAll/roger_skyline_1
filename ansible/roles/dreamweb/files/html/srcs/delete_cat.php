<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["delete"]))
{
	if (isset($_POST["del_cat"]) && isset($_POST["confirm"]) && $_POST["del_cat"] != "")
	{
		if ($_POST["del_cat"] == $_SESSION["user"]["username"])
		{
			header("Location: ../page/admin.php?cat=notdelete&&msg=delete category failed");
			exit();
		}
		$pss = hash("sha256", $_POST["confirm"]);
		$rpss = $_SESSION["user"]["password"];
		if ($pss == $rpss)
		{
			launchquery("DELETE FROM categories WHERE name=?", "s", array(htmlspecialchars($_POST["del_cat"])), false);
			header("Location: ../page/admin.php?cat=delete&&msg=category have been deleted");
			exit();
		}
		else
		{
			header("Location: ../page/admin.php?cat=notdelete&&msg=delete category failed");
			exit();
		}
	}
	else
	{
		header("Location: ../page/admin.php?cat=notdelete&&msg=delete category failed");
		exit();
	}
}
else
{
	header("Location: ../page/admin.php?cat=notdelete&&msg=delete category failed");
	exit();
}
?>
