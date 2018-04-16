<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style>
			div
			{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<center><div>
			<p>Gestion de compte</p>
			<p>nom de compte : <?php echo $_SESSION['login'];?> </p> 
			<a href="modify.php">modifier votre mot de passe</a><br>
			<a href="delete.php">supprimer votre compte</a><br>
			<a href="index.php">Retour a l'acceuil</a><br>
		</div></center>
	</body>
</html>