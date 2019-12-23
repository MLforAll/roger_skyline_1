<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["delete"]))
{
	if (isset($_POST["del_art"]) && isset($_POST["confirm"]) && $_POST["del_art"] != "")
	{
		$pss = hash("sha256", $_POST["confirm"]);
		$rpss = $_SESSION["user"]["password"];
		if ($pss == $rpss)
		{
			launchquery("DELETE FROM items WHERE description=?", "s", array(htmlspecialchars($_POST["del_art"])), false);
			header("Location: ../page/admin.php?article=delete&&msg=article have been deleted");
			exit();
		}
		else
		{
			header("Location: ../page/admin.php?article=notdelete&&msg=delete article failed");
			exit();
		}
	}
	else
	{
		header("Location: ../page/admin.php?article=notdelete&&msg=delete article failed");
		exit();
	}
}
else
{
	header("Location: ../page/admin.php?article=notdelete&&msg=delete article failed");
	exit();
}
?>
