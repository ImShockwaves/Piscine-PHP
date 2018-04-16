<?php
session_start();
include('mod.php');
<<<<<<< HEAD
$handle = fopen("database/db.csv", "r+");
$check = 0;
file_put_contents('database/ndb.csv', null);
$handle1 = fopen('database/ndb.csv', 'w');
=======
$handle = fopen("database/db.csv", "r");
$arr = array(null);
var_dump($_SESSION);
>>>>>>> 273340e38c64d37ab71235292eea1520a92e9896
while (($data = fgetcsv($handle, ",")) !== false)
{
	if ($data[0] == $_SESSION['login'])
	{
		if ($data[1] == $_POST['oldpw'] && $_POST['newpw'] != "")
		{
			$data[1] = $_POST['newpw'];
			$check = 1;
		}
	}
	fputcsv($handle1, $data);
}
fclose($handle);
fclose($handle1);
unlink('database/db.csv');
rename('database/ndb.csv', 'database/db.csv');
if ($check == 0)
{
?>
<p>L'ancien mot de passe ne correspond pas</p>
<?php
}
?>
<a href="index.php">acceuil</a>
</body>
</html>
