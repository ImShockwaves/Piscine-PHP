<?php
session_start();
include('log.php');
if (file_exists('database') && file_exists('database/db.csv'))
{
	$handle = fopen("database/db.csv","r");
	while (($data = fgetcsv($handle, ",")) !== false)
	{
		if ($data[0] == $_POST['login'] && $data[1] == $_POST['passwd'])
		{
			$_SESSION['login'] = $data[0];
			$_SESSION['passwd'] = $data[1];
?>
<p>connected !</p>
<a href="index.php">accueil</a>
</body>
</html>
<?php
			exit ();
		}
	}
}
?>
<p> Mauvais nom d'utilisateur ou mot de passe</p>
</body>
</html>
