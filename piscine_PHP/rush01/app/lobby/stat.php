<!DOCTYPE html>
<html>
<head>
	<title>Stat</title>
</head>
<body>
<?php
if ($_POST['name'])
{
	$db = mysqli_connect("localhost:3307", "root", "tyJKUUY5", "d08");
	if (!$db)
		die('Requête invalide : ' . mysql_error());

	$query = "SELECT name, win, lose, nbgame, (win*100/nbgame) ratio FROM `users`;";
	$res = mysqli_query($db, $query);
	while ($resul = mysqli_fetch_assoc($res))
	{
		if ($resul['name'] == $_POST['name'])
		{
			echo '
				<center><h1>'.$_POST['name'].'</h1>
				<p>Ratio: '.$resul['ratio'].'%</p>
				<p>Games: '.$resul['nbgame'].'</p>
				<p>Win: '.$resul['win'].'</p>
				<p>Lose: '.$resul['lose'].'</p>';
			$exist = 1;
			break;
		}
	}
	if (!($exist))
	{
		echo "<center><h3>This player doesn't exist</h3>";	
	}
}
?>
<button><a href="lobbychat.php">Return to lobby</a></button></center>
</body>
</html>