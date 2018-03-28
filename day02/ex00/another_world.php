#!/usr/bin/php
<?PHP
	if ($argc == 2)
	{
		$new = trim($argv[1], " \t");
		$new = preg_replace('/(([\t ]+))/'," ", $new);
		echo $new . "\n";
	}
?>
