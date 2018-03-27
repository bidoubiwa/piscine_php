#!/usr/bin/php
<?PHP
function	ft_split($str)
{
	$ret = array_filter(explode(' ', $str));
	//$ret = explode(' ', $str);
        sort($ret);
        return $ret;
}
var_dump(ft_split("   Hello aaa world  YYYY AAA  "));
?>
