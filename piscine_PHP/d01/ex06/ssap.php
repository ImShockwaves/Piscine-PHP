#!/usr/bin/php
<?php
function ft_split($s1)
{
	$tab = explode(" ", $s1);
	return($tab);
}
if (argc == 1)
{
	return;
}
$e = array();
$i = 1;
while ($argv[$i]) 
{
	$tab = ft_split($argv[$i]);
	$e = array_merge($e, $tab);
	$i++;
}
sort($e);
foreach ($e as $ele) {
	echo $ele;
	echo "\n";
}
?>
