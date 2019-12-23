<?php
include ("../srcs/db_connection.php");
include ("../includes/admin_auth.php");
?>
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
			if (isset($_POST["select"]))
			{
				$get_cmd = launchquery("SELECT * FROM command WHERE cmdname=?", "s", array(htmlspecialchars($_POST["select"])), true);
				$data = $get_cmd[0];
				$cart = unserialize($data["article"]);
				$total = $data["total"];
				if (count($cart) > 0)
				{
			?>
					<form method="POST">
					<table class="cart_table">
						<tr>
							<th><h3>Article Name: </h3></th>
							<th><h3>Quantity: </h3></th>
							<th><h3>Price: </h3></th>
						<?php
						if (count($cart) > 1)
							echo "<th><h3>Delete Item</h3></th>\n";
						?>
						</tr>
					<?php
					foreach ($cart as $curr)
					{
						echo "<tr>\n";
						echo "<th>" . $curr["art"] . "</th>\n";
					?>
						<th>
							<input class="input_num" name="quantity<?php echo $curr['art'];?>" type="number" value="<?php echo $curr['quantity'];?>" min="1"/>
						</th>
						<th><?php echo $curr["price"];?>$</th>
					<?php
						if (count($cart) > 1)
						{
					?>
						<th>
							<input type="submit" name="<?php echo $curr["art"];?>" value="Delete" style="width: 50px"/>
						</th>
					<?php
						}
					}
					echo "</table>";
					echo "<p>Total: " . $total . "$</p>\n";
					?>
						<input type="hidden" name="select" value="<?php echo $_POST["select"];?>"/>
						<input type="submit" name="btn" value="Change command"/>
					</form>
			<?php
					if (isset($_POST["btn"]))
					{
						for ($i = 0; $i < count($cart); $i++)
						{
							$n = $_POST["quantity" . str_replace(' ', '_', $cart[$i]["art"])];
							$total += abs($cart[$i]["quantity"] - $n) * $cart[$i]["price"];
							$cart[$i]["quantity"] = $n;
						}
						launchquery("UPDATE command SET article=? WHERE cmdname=?", "ss", array(serialize($cart), htmlspecialchars($_POST["select"])), false);
						launchquery("UPDATE command SET total=? WHERE cmdname=?", "is", array(htmlspecialchars($total), htmlspecialchars($_POST["select"])), false);
						header("Location: ../page/admin.php?msg=Command modified");
						exit();
					}
					else
					{
						foreach ($_POST as $key => $value)
						{
							if ($value == "Delete")
							{
								for ($i = 0; $i < count($cart); $i++)
								{
									if ($cart[$i]["art"] == str_replace('_', ' ', $key))
									{
										$total -= $cart[$i]["price"] * $cart[$i]["quantity"];
										unset($cart[$i]);
										break;
									}
								}								
								launchquery("UPDATE command SET article=? WHERE cmdname=?", "ss", array(serialize($cart), htmlspecialchars($_POST["select"])), false);
								launchquery("UPDATE command SET total=? WHERE cmdname=?", "is", array(htmlspecialchars($total), htmlspecialchars($_POST["select"])), false);
								header("Location: ../page/admin.php?msg=Command modified");
								exit();
							}
						}
					}
				}
				else
					echo "<p>EMPTY CART!</p>\n";
			}
			else
				echo "<p>INVALID REQUEST!</p>\n";
			?>
		</div>
	</body>
	<?php include("../includes/script.php");?>
</html>
