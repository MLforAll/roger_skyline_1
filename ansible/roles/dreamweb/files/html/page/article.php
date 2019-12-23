<?php include("../srcs/db_connection.php");?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("../includes/header.php");?>
		<link rel="stylesheet" href="../css/article.css">
	</head>
	<body>
		<?php include("../includes/nav.php");?>
		<?php include("../includes/notification.php");?>

		<form id="filtrer_form" method="POST">
			<select id="cat_filtrer" name="cat_filtrer">
				<option value="all">All</option>
				<?php include("../includes/option_cat.php");?>
			</select>
			<input type="submit" value="Filter">
		</form>
		<div id="article_container">
			<?php include("../includes/article_template.php");?>
		</div>
	</body>
	<?php include("../includes/script.php");?>
</html>
