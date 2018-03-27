#!/usr/bin/php
<?php
	$new = trim($argv[1]);
	$new = preg_replace('/(\s{2,})/'," ", $new);
	echo $new;
?>
