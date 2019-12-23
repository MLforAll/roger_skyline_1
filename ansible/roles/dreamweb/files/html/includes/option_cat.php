<?php
$ret = launchquery("SELECT name FROM categories", NULL, NULL, true);
foreach ($ret as $data)
{
	echo '<option value=';
	echo $data["name"];
	echo '>';
	echo $data["name"];
	echo '</option>';
}
?>
