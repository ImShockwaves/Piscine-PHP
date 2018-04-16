<?php
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
{
	$db = mysqli_connect("localhost:3307", "root", "tyJKUUY5", "d08");
	if (!$db)
		die('Requête invalide : ' . mysql_error());

	$query = "SELECT name FROM `users`;";
	$res = mysqli_query($db, $query);
	while ($resul = mysqli_fetch_assoc($res))
	{
		if ($resul['name'] == $_POST['login'])
			$exist = 1;
	}
	if ($exist)
	{
		header('Location: create.html');
?>
		<p>Identifiant deja utilise !</p>
<?php
	}
	else
	{
		$query = "INSERT INTO `users`(`name`, `passwd`, `nbgame`, `win`, `lose`) VALUES ('".$_POST['login']."', '".hash('whirlpool', $_POST['passwd'])."', 0, 0, 0);";
		mysqli_query($db, $query);
		header('Location: index.html');
		echo "OK\n";
		exit();
	}
} 
else
	echo "ERROR\n";
?>
