<?php
include ("db_connection.php");
include ("../includes/admin_auth.php");

if (isset($_GET["change"]) && isset($_POST["select"]))
{
	$i = 0;
	if (isset($_POST["userpasswd"]) && $_POST["userpasswd"] != "")
	{
		$pss = hash("sha256", htmlspecialchars($_POST["userpasswd"]));
		launchquery("UPDATE users SET password=? WHERE name=?", "ss", array($pss, 
			htmlspecialchars($_POST["select"])), false);
		$i++;
	}
	if (isset($_POST["userclass"]) && $_POST["userclass"] != "")
	{
		launchquery("UPDATE users SET class=? WHERE name=?", "ss", array(htmlspecialchars($_POST["userclass"]), 
			htmlspecialchars($_POST["select"])), false);
		$i++;
	}
	if (isset($_POST["username"]) && $_POST["username"] != "") 
	{
		launchquery("UPDATE users SET name=? WHERE name=?", "ss", array(htmlspecialchars($_POST["username"]), 
			htmlspecialchars($_POST["select"])), false);
		$i++;
	}
	if ($i >= 1)
	{
		header("Location: ../page/admin.php?user=change&msg=User modification success");
		exit();
	}
	else
	{
		header("Location: ../page/admin.php?user=notchange&msg=User modification failed");
		exit();
	}
}
else
{
	header("Location: ../page/admin.php?user=notchange&msg=User modification failed");
	exit();
}
?>
