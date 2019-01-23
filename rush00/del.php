<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>boutique</title>
	</head>
	<body>
		<form action="delete.php" method="POST">
			Mot de passe: <input type="text" name="pw" value="" />
			<br />
			Confirmation: <input type="password" name="cpw" value="" />
			<br />
			<input type="submit" name="submit" value="OK"/>
		</form>