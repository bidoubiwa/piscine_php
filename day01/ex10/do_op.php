#!/usr/bin/php
<?PHP
function	add($a, $b)
{
	return ($a + $b);
}
function	minus($a, $b)
{
	return ($a - $b);
}
function	multi($a, $b)
{
	return ($a * $b);
}
function	div($a, $b)
{	
	return ($a / $b);
}
function	mod($a, $b)
{
	return ($a % $b);
}
if ($argc != 4)
	echo "Incorrect Parameters\n";
else 
{
	$res = 0;
	if (trim($argv[2]) == "+")
		$res = add(trim($argv[1]), trim($argv[3]));
	else if (trim($argv[2]) == "-")
		$res = minus(trim($argv[1]), trim($argv[3]));
	else if (trim($argv[2]) == "*")
		$res = multi(trim($argv[1]), trim($argv[3]));
	else if (trim($argv[2]) == "/")
		$res = div(trim($argv[1]), trim($argv[3]));
	else if (trim($argv[2]) == "%")
		$res = mod(trim($argv[1]), trim($argv[3]));
	echo $res . "\n";
}
?>
