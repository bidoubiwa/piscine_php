#!/usr/bin/php
<?php
	$new = trim($argv[1]);
	$new = preg_replace('/( {2,})/'," ", $new);
	if ($new || $new[0] == "0")
		echo $new."\n";
?>
