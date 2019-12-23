<?php
function is_in_cat($data, $cat)
{
	$a = explode(' ', $data["categories"]);
	foreach ($a as $value)
	{
		if ($value == $cat)
			return true;
	}
	return false;
}

$ret = launchquery("SELECT * FROM items", NULL, NULL, true);
foreach ($ret as $data)
{
	if (isset($_POST["cat_filtrer"]) && $_POST["cat_filtrer"] != "all" && !is_in_cat($data, $_POST["cat_filtrer"]))
		continue;
	if (isset($data["description"]) && $data["description"] != "" &&
		isset($data["price"]) && $data["price"] != "")
	{
		echo "<div class='article_obj' style='background-image:url(" . trim($data["img"]) . "')>";
		echo '<p><b>';
		echo $data["description"] . ' — ' . $data["price"] . '$';
		echo '</b></p>';
		echo '<form class="article_form" action="../srcs/add_cart.php" method="POST">';
		echo '<input class="input_num" name="quantity" type="number" value="1" min="1">';
		echo '<input class="input_confirm" name="' . $data["description"] . '/' . $data["price"] . '" type="submit" value="Add to cart">';
		echo '</form>';
		echo '</div>';
	}
}
?>
