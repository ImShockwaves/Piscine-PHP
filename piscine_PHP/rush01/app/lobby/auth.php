<?php
function auth($login, $passwd)
{
	$db = mysqli_connect("localhost:3307", "root", "tyJKUUY5", "d08");
	if (!$db)
		die('Requête invalide : ' . mysql_error());

	$query = "SELECT name, passwd FROM `users`;";
	$res = mysqli_query($db, $query);
	while ($v = mysqli_fetch_assoc($res))
	{
		if ($v['name'] == $login && $v['passwd'] == hash('whirlpool', $passwd))
			return true;
	}
	return false;
}
?>
