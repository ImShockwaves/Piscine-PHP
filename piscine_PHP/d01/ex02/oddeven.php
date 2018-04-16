<?php
while (1)
{
	echo "Entrez un nombre : ";
	$ligne = fgets(STDIN);
	$isint = preg_match('/^[0-9]+$/', $ligne);
	$ligne = str_replace("\n", "", $ligne);
	if (feof(STDIN))
	{
		echo "^D\n";
		break;
	}
	else if (!($isint))
		echo "'$ligne' n'est pas un chiffre";
	else if ($ligne % 2)
		echo "$ligne est impair";
	else
		echo "$ligne est pair";
	echo "\n";
}
?>
