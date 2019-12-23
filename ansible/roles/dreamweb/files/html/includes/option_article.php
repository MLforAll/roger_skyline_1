<?php
$ret = launchquery("SELECT description FROM items", NULL, NULL, true);
foreach ($ret as $data)
{
	if (isset($data["description"]) && $data["description"] != "")
	{
		echo '<option value="';
		echo $data["description"];
		echo '">';
		echo $data["description"];
		echo '</option>';
	}
}
?>
