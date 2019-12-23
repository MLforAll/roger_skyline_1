<?php
$ret = launchquery("SELECT cmdname FROM command", NULL, NULL, true);
foreach ($ret as $data)
{
	if (isset($data["cmdname"]) && $data["cmdname"] != "")
	{
		echo '<option value=';
		echo $data["cmdname"];
		echo '>';
		echo $data["cmdname"];
		echo '</option>';
	}
}
?>
