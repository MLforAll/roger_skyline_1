<?php
$ret = launchquery("SELECT name FROM users", NULL, NULL, true);
foreach ($ret as $data)
{
	if (isset($data["name"]) && $data["name"] != "")
	{
		echo '<option value=';
		echo $data["name"];
		echo '>';
		echo $data["name"];
		echo '</option>';
	}
}
?>
