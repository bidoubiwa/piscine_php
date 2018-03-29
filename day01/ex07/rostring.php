#!/usr/bin/php
<?PHP
$new = trim($argv[1]);
$new = preg_replace('/( {2,})/'," ", $new);
$new = explode(" ", $new);
for ($i = 1; $i < count($new); $i++)
		echo $new[$i]." ";
if ($new[0] || $new[0] == "0")
	echo $new[0]."\n";
?>
