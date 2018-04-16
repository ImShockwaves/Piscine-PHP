#!/usr/bin/php
<?php
if ($argc != 2)
	exit();
$argv[1] = preg_replace("/ +/", ' ',$argv[1]);
$argv[1] = ltrim($argv[1]);
$argv[1] = rtrim($argv[1]);
$argv[1] = trim($argv[1]);
echo ("$argv[1]\n");
?>
