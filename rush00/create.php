<?php
include ('cre.php');
$db;
if (!file_exists('database'))
	mkdir('database');
if (!file_exists('database/db.csv'))
{	
	if (!$_POST['login'] && !$_POST['passwd'] && $_POST['submit'] != 'OK')
		exit ();
	else
		file_put_contents('database/db.csv', null);
}
$handle = fopen("database/db.csv", "r");
while (($data = fgetcsv($handle, ",")) !== false)
{
	if ($data[0] == $_POST['login'])
	{
		fclose($handle);
?>
<p>Ce nom d'utilisateur existe deja</p>
</body>
</html>
<?php
		exit ();
	}
}
fclose($handle);
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'OK')
{
	$handle = fopen("database/db.csv", "a");
	$db = array($_POST['login'], $_POST['passwd']);
	fputcsv($handle, $db);
	fclose($handle);
}
?>
<a href="login.php">se connecter</a>
</body>
</html>
