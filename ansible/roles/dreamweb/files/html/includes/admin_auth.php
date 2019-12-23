<?php
if ($_SESSION["user"]["class"] != "admin")
{
	header("Location: ../page/article.php?msg=Access Denied");
	exit();
}
?>
