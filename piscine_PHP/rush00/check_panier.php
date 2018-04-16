<?php
session_start();
function check_panier($id, $quantity)
{
	$check = 0;
	$handle = fopen("database/panier.csv", "r");
	file_put_contents('database/npanier.csv', null);
	$handle1 = fopen('database/npanier.csv', 'w');
	while (($data = fgetcsv($handle, ",")) !== false)
	{
		if ($data[1] == $id && $_SESSION['login'] == $data[0])
		{
			$data[2] = $data[2] + $quantity;
			$check = 1;
		}
		fputcsv($handle1, $data);
	}
	fclose($handle);
	fclose($handle1);
	unlink('database/panier.csv');
	rename('database/npanier.csv', 'database/panier.csv');
	return ($check);
}