#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	$compare = $tab;
	$compare2 = $tab;
	sort($compare);
	rsort($compare2);
	if ($compare === $tab)
		return (true);
	if ($compare2 == $tab)
		return (true);
	else
		return (false);
}
?>
