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
function	parse_arguments($str)
{
		$re = '/^ *(-?[0-9]+) *([\+\-\/\%\*]) *(-?[0-9]+) *$/';
		preg_match($re, $str, $match);
		return($match);
}
if ($argc != 2)
		echo "Incorrect Parameters\n";
else 
{	
		$arr = parse_arguments($argv[1]);
		if (count($arr) == 4)
		{
				$res = 0;
				if (trim($arr[2]) == "+")
						$res = add(trim($arr[1]), trim($arr[3]));
				else if (trim($arr[2]) == "-")
						$res = minus(trim($arr[1]), trim($arr[3]));
				else if (trim($arr[2]) == "*")
						$res = multi(trim($arr[1]), trim($arr[3]));
				else if (trim($arr[2]) == "/")
						$res = div(trim($arr[1]), trim($arr[3]));
				else if (trim($arr[2]) == "%")
						$res = mod(trim($arr[1]), trim($arr[3]));
				echo $res . "\n";
		}
		else
				echo "Syntax Error\n";
}
?>
