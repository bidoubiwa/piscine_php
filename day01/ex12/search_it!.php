#!/usr/bin/php
<?PHP
$key = $argv[1];
for ($i = 2; $i < count($argv); $i++)
{
	$new = explode(":", $argv[$i]);
	if ($new[0] == $key)
	{
		echo $new[1] . "\n";
		break;
	}
}
?>
