<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["delete"]))
{
	if (isset($_POST["del_us"]) && isset($_POST["confirm"]) && $_POST["del_us"] != "")
	{
		if ($_POST["del_us"] == $_SESSION["user"]["username"])
		{
			header("Location: ../page/admin.php?user=notdelete&&msg=delete user failed");
			exit();
		}
		$pss = hash("sha256", $_POST["confirm"]);
		$rpss = $_SESSION["user"]["password"];
		if ($pss == $rpss)
		{
			launchquery("DELETE FROM users WHERE name=?", "s", array(htmlspecialchars($_POST["del_us"])), false);
			header("Location: ../page/admin.php?user=delete&&msg=user have been deleted");
			exit();
		}
		else
		{
			header("Location: ../page/admin.php?user=notdelete&&msg=delete user failed");
			exit();
		}
	}
	else
	{
		header("Location: ../page/admin.php?user=notdelete&&msg=delete user failed");
		exit();
	}
}
else
{
	header("Location: ../page/admin.php?user=notdelete&&msg=delete user failed");
	exit();
}
?>
