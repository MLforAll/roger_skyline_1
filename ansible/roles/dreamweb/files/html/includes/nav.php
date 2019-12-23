<nav>
	<p><b>Dream Shop</b></p>
	<span>
		<a href="../page/article.php">Shop</a>
		<a href="../page/cart.php">Cart</a>
<?php if (!isset($_SESSION["user"]["username"])) { ?>
		<a href="../page/signin.php">Sign Up</a>
		<a href="../page/connect.php">Log In</a>
<?php } else { ?>
		<a href="../page/setting.php">Settings</a>
<?php if ($_SESSION["user"]["class"] == "admin") { ?>
		<a href="../page/admin.php">Manage</a>
<?php } ?>
		<a href="../srcs/disconnect.php">Disconnect</a>
<?php } ?>
	</span>
</nav>
