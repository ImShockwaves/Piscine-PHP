<?php
session_start();
$handle = fopen("database/panier.csv", "r");
file_put_contents('database/npanier.csv', null);
$handle1 = fopen('database/npanier.csv', 'w');
while (($data = fgetcsv($handle, ",")) !== false)
{
	if ($data[1] == $_GET['id'] && $data[0] == $_SESSION['login'])
	{
		$data[2] = $_POST['quantity'];
		$check = 1;
	}
	fputcsv($handle1, $data);
}	
fclose($handle);
fclose($handle1);
unlink('database/panier.csv');
rename('database/npanier.csv', 'database/panier.csv');
header('Location : panier.php');
?>