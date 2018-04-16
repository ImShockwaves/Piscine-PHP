#!/usr/bin/php
<?php
if ($argc == 1)
    return;
$i = 1;
$array = array();
while ($i < $argc)
{
    $array = array_merge($array, ($str = explode(' ', $argv[$i])));
    $i++;
}
$i = 0;
$number = array();
$letter = array();
$other = array();
while ($array[$i])
{
    $isInt = preg_match('/^[0-9]+$/', $array[$i]);
    if ($isInt)
        $number[$i] = $array[$i];
    else if (ctype_alpha($array[$i]))
        $letter[$i] = $array[$i];
    else
        $other[$i] = $array[$i];
    $i++;
}
usort($letter, "strcasecmp");
usort($number, "strcasecmp");
usort($other, "strcasecmp");
$array2 = array_merge($letter, $number);
$array2 = array_merge($array2, $other);
$i = 0;
while ($array2[$i])
{
    echo $array2[$i];
    echo "\n";
    $i++;
}
?>
