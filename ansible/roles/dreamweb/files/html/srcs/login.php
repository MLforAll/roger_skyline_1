<?php
include ("db_connection.php");

if (isset($_GET["connect"]))
{
	$ret = launchquery("SELECT * FROM users WHERE name=?", "s", array(htmlspecialchars($_POST["username"])), true);
	foreach ($ret as $data)
	{
		if (hash("sha256", $_POST["userpasswd"]) == $data["password"])
		{
			session_start();
			$_SESSION["user"] = array("username" => $data["name"], "password" => $data["password"], "class" => $data["class"]);
			header("Location: ../page/article.php?user=connect");
			exit();
		}
		else
		{
			header("Location: ../page/connect.php?user=not_found&&msg=connection failed");
			exit();
		}
	}
	header("Location: ../page/connect.php?user=not_found&&msg=connection failed");
	exit();
}
