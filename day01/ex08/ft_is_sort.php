#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	$compare = $tab;
	sort($compare);
	if ($compare === $tab)
		return (true);
	else
		return (false);
}
?>
