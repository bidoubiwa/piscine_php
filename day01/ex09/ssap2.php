#!/usr/bin/php
<?PHP
$tab = [];
for ($i = 1; $i < count($argv); $i++)
{
	$new = trim($argv[$i]);
	$new = preg_replace('/(\s{2,})/'," ", $new);
	$new = explode(" ", $new);
	foreach ($new as $elem)
		$tab[] = $elem;
}
natcasesort($tab);
foreach ($tab as $elem)
	echo $elem."\n";
?>
