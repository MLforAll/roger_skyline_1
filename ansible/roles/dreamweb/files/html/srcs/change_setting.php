<?php
include ("db_connection.php");

foreach($_GET as $key => $value)
{
	if ($key == "change")
		$modif= $value;
}

if ($modif == "name")
{
	if (isset($_POST["username"]) && $_POST["username"] != "")
	{
		launchquery("UPDATE users SET name=? WHERE name=?", "ss", 
			array(htmlspecialchars($_POST["username"]), $_SESSION["user"]["username"]), false);
		$_SESSION["user"]["username"] = $_POST["username"];
		header("Location: ../page/setting.php?user=change&msg=User name has been changed");
		exit();
	}
	else
	{
		header("Location: ../page/setting.php?user=notchange&msg=User modification failed");
		exit();
	}
}
else if ($modif == "password")
{
	if (isset($_POST["new_userpasswd"]) && $_POST["new_userpasswd"] != "" && isset($_POST["old_userpasswd"]) && $_POST["old_userpasswd"] != "")
	{
		$pss = hash("sha256", htmlspecialchars($_POST["new_userpasswd"]));
		$old_pss = hash("sha256", $_POST["old_userpasswd"]);
		if ($old_pss == $_SESSION["user"]["password"])
		{
			launchquery("UPDATE users SET password=? WHERE name=?", "ss", array($pss, 
				htmlspecialchars($_SESSION["user"]["username"])), false);
			$_SESSION["user"]["password"] = $pss;
			header("Location: ../page/setting.php?user=change&msg=User password has been changed");
			exit();
		}
		else
		{
			header("Location: ../page/setting.php?user=notchange&msg=User modification failed");
			exit();
		}
	}
	else
	{
		header("Location: ../page/setting.php?user=notchange&msg=User modification failed");
		exit();
	}
}
else
{
	header("Location: ../page/setting.php?user=notchange&msg=User modification failed");
	exit();
}
?>
