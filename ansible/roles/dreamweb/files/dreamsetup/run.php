<?php

require 'db_connection.php';

launchquery("CREATE TABLE `rush00`.`categories` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL DEFAULT 'none' , PRIMARY KEY (`id`)) ENGINE = InnoDB;", NULL, NULL, false);
launchquery("CREATE TABLE `rush00`.`items` ( `id` INT NOT NULL AUTO_INCREMENT , `description` VARCHAR(255) NOT NULL DEFAULT 'new' , `categories` VARCHAR(255) NOT NULL DEFAULT 'none' , `price` INT NOT NULL , `img` TEXT CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;", NULL, NULL, false);
launchquery("CREATE TABLE `rush00`.`command` ( `id` INT NOT NULL AUTO_INCREMENT , `cmdname` VARCHAR(255) NOT NULL DEFAULT 'none' , `article` TEXT NOT NULL ,  `total` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;", NULL, NULL, false);
launchquery("CREATE TABLE `rush00`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL DEFAULT 'toto' , `password` VARCHAR(255) NOT NULL DEFAULT 'none' , `class` VARCHAR(255) NOT NULL DEFAULT 'user' , `status` VARCHAR(255) NOT NULL DEFAULT 'actif' , PRIMARY KEY (`id`)) ENGINE = InnoDB;", NULL, NULL, false);

launchquery("INSERT INTO users (name, password, class, status) VALUES (?, ?, ?, ?)", "ssss", array("root", hash("sha256", "__root_pwd_goes_here__"), "admin", "actif"), false);
launchquery("INSERT INTO users (name, password, class, status) VALUES (?, ?, ?, ?)", "ssss", array("norminet", hash("sha256", "__norminet_pwd_goes_here__"), "user", "actif"), false);

$installitems = array("categories", "items");
$installtypes = array("s", "ssis");
$installqueries = array("INSERT INTO categories (name) VALUES (?)",
	"INSERT INTO items (description, categories, price, img) VALUES (?, ?, ?, ?)");
for ($i = 0; $i < count($installitems); $i++)
{
	$content = file_get_contents(__DIR__ . '/rc/' . $installitems[$i]);
	$lines = explode("\n", $content);
	foreach ($lines as $l)
	{
		if ($l == "")
			continue;
		$a = explode(';', $l);
		launchquery($installqueries[$i], $installtypes[$i], $a, false);
	}
}

?>
