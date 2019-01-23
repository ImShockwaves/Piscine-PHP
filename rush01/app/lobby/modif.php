<?php
session_start();
if ($_SESSION['loggued_on_user'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == "OK")
{
	$db = mysqli_connect("localhost:3307", "root", "tyJKUUY5", "d08");
	if (!$db)
		die('Requête invalide : ' . mysql_error());
	$query = "SELECT name, passwd FROM `users`;";
	$res = mysqli_query($db, $query);
	$exist = 0;
	while ($v = mysqli_fetch_assoc($res))
	{
		if ($v['name'] == $_SESSION['loggued_on_user'] && $v['passwd'] == hash('whirlpool', $_POST['oldpw']))
		{
			$exist = 1;
			$query = "UPDATE users SET passwd='".hash('whirlpool', $_POST['newpw'])."' WHERE name='".$_SESSION['loggued_on_user']."';";
			mysqli_query($db, $query);
			break;
		}
	}
	if ($exist)
	{
		header('Location: lobbychat.php');
		echo "OK\n";
		exit();
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>