#!/usr/bin/php
<?PHP
function	sort_value($a,$b)
{
	$tab = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
	$i = 0;
	while (isset($a[$i]) && isset($b[$i]))
	{
		if (strpos($tab, strtolower($a[$i])) - strpos($tab, strtolower($b[$i])) > 0)
			return 1;
		else if (strpos($tab, strtolower($a[$i])) - strpos($tab, strtolower($b[$i])) < 0)
			return -1;
		else
			$i++;
	}
	if (isset($a[$i]) && !isset($b[$i]))
		return 1;
	else
		return -1;
}
$tab = [];
for ($i = 1; $i < count($argv); $i++)
{
	$new = trim($argv[$i]);
	$new = preg_replace('/(\s{2,})/'," ", $new);
	$new = explode(" ", $new);
	foreach ($new as $elem)
		$tab[] = $elem;
}
usort($tab, "sort_value");
foreach ($tab as $elem)
	echo $elem."\n";
?>
