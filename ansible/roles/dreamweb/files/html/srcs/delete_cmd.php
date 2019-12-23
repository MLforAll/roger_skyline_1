<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["delete"]))
{
	if (isset($_POST["del_cmd"]) && isset($_POST["confirm"]) && $_POST["del_cmd"] != "")
	{
		if ($_POST["del_cmd"] == $_SESSION["user"]["username"])
		{
			header("Location: ../page/admin.php?command=notdelete&msg=Delete command failed");
			exit();
		}
		$pss = hash("sha256", $_POST["confirm"]);
		$rpss = $_SESSION["user"]["password"];
		if ($pss == $rpss)
		{
			launchquery("DELETE FROM command WHERE cmdname=?", "s", array(htmlspecialchars($_POST["del_cmd"])), false);
			header("Location: ../page/admin.php?command=delete&msg=Command has been deleted");
			exit();
		}
		else
		{
			header("Location: ../page/admin.php?command=notdelete&msg=Delete command failed");
			exit();
		}
	}
	else
	{
		header("Location: ../page/admin.php?command=notdelete&msg=Delete command failed");
		exit();
	}
}
else if (isset($_GET["cmdname"]))
{
	launchquery("DELETE FROM command WHERE cmdname=?", "s", array(htmlspecialchars($_POST["cmdname"])), false);
	header("Location: ../page/admin.php?command=delete&msg=Command has been deleted");
	exit();
}
else
{
	header("Location: ../page/admin.php?command=notdelete&msg=Delete command failed");
	exit();
}
?>
