#!/usr/bin/php
<?php
if ($argc > 1)
{
	$reg = preg_replace('/[ \t]{2,}/', ' ', trim($argv[1]));
	echo "$reg\n";
}
?>
