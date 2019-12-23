<?php
$var = $_GET;
foreach($var as $key => $value)
{
	if ($key == "msg")
		$txt = $value;
}
if (isset($txt))
{
	echo '<span id="notif_container">';
	echo $txt;
	echo "</span>";
}
?>
