<?php
if (!file_exists('database'))
	mkdir('database');
if (!file_exists('database/db.csv'))
	file_put_contents('database/db.csv', null);
if (!file_exists('database/panier.csv'))
	file_put_contents('database/panier.csv', null);
if (!file_exists('database/articles.csv'))
{
	file_put_contents('database/articles.csv', null);
	$articles = array (
		array('1', 'La Nuit Etoile', 'Postimpressionisme:Huile', 10, 20),
		array('2', 'La Joconde', 'Renaissance:Huile', 6, 15),
		array('3', 'La Cene', 'Renaissance:Tempera', 23, 32),
		array('4', "La Creation d'Adam", 'Rennaissance:Fresque', 3, 6),
		array('5', 'Le cri', 'Expressionisme:Tempera', 8, 11)
	);
	$handle = fopen('database/articles.csv', 'w');
	foreach ($articles as $fields)
	{
		fputcsv($handle, $fields);
	}
	fclose($handle);
}
?>
