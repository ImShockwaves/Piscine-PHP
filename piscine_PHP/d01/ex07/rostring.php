<?php
$tab = trim($argv[1]);
while (strstr($tab, "  "))
{
	$tab = str_ireplace("  ", " ", $tab);
}
$my_tab = explode(" ", $tab);
$first = array_shift($my_tab);
foreach($my_tab as $el)
{
	echo $el;
	echo " ";
}
echo $first;
if ($argc > 1)
	echo "\n";
?>
