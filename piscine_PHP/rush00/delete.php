<?php
session_start();
include('del.php');
$handle = fopen("database/db.csv", "r+");
$check = 0;
file_put_contents('database/ndb.csv', null);
$handle1 = fopen('database/ndb.csv', 'w');
while (($data = fgetcsv($handle, ",")) !== false)
{
	if ($data[0] == $_SESSION['login'] && $data[1] == $_POST['pw'] && $data[1] == $_POST['cpw'])
	{
		$_SESSION['login'] = "";
		$_SESSION['passwd'] = "";
		$check = 1;
	}
	else
		fputcsv($handle1, $data);
}
fclose($handle);
fclose($handle1);
unlink('database/db.csv');
rename('database/ndb.csv', 'database/db.csv');
if ($check == 0)
{
?>
<p>Le mot de passe ne correspond pas</p>
<?php
}
else
{
?>
	<p>Compte supprime</p>
<?php
}
?>
<a href="index.php">acceuil</a>
</body>
</html>
