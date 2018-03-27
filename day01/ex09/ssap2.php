#!/usr/bin/php
<?PHP
function	sort_value($a,$b)
{
	if (ctype_alnum($a) && !ctype_alnum($b))
			return -1;
	else if (!ctype_alnum($a) && ctype_alnum($b))
			return 1;
	else if(is_numeric($a) && !is_numeric($b))
        return 1;
    else if(!is_numeric($a) && is_numeric($b))
			return -1;
    else
        return (strtolower($a) < strtolower($b)) ? -1 : 1;
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
