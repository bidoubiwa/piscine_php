#!/usr/bin/php
<?PHP
function	no_empty_str($str)
{
	if ($str != "")
		return true;
	else
		return false;
}

function	ft_split($str)
{
		$ret = array_filter(explode(' ', $str), "no_empty_str");
		sort($ret);
		return $ret;
}
print_r(ft_split("   Hello aaa world  YYYY AAA  0"));

?>
