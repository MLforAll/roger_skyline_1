<?php include("../srcs/db_connection.php");?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("../includes/header.php");?>
	</head>
	<body>
		<?php include("../includes/nav.php");?>
		<?php include("../includes/notification.php");?>
		<div class="cart_container">
			<?php
			if (isset($_COOKIE["cart"]))
			{
				?>
				<table class="cart_table">
					<tr>
						<th><h3>Article Name: </h3></th>
						<th><h3>Quantity: </h3></th>
						<th><h3>Price: </h3></th>
						<th><h3>Delete Item</h3></th>
					</tr>
				<?php
				$cart = unserialize($_COOKIE["cart"]);
				$total = 0;
				foreach ($cart as $curr)
				{
					if ($curr["art"] == "")
						continue;
					$total += $curr["price"] * $curr["quantity"];
					echo "<tr>\n";
					foreach ($curr as $key => $value)
						echo "<th>" . $value . (($key == "price") ? '$' : '') . "</th>\n";
					echo "<th>\n";
					echo '<form action="../srcs/delete_cart.php" method="POST">' . "\n";
					echo '<input type="submit" name="' . $curr["art"] . '" value="Delete" style="width: 50px"/>' . "\n";
					echo "</form>\n";
					echo "</th>\n";
					echo "</tr>\n";
				}
				echo "</table>";
				echo "<p>Total: " . $total . "$</p>\n";
				?>
			<form action="../srcs/delete_cart.php" method="POST">
				<input type="submit" name="del_cart" value="Delete Cart"/>
			</form>
			<form action="../srcs/checkout.php" method="POST">
				<input type="submit" name="checkout" value="Checkout"/>
			</form>
			<?php }
			else
				echo "<p>EMPTY CART!</p>\n";
			?>
		</div>
	</body>
	<?php include("../includes/script.php");?>
</html>
