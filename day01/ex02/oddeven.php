#!/usr/bin/php
<?PHP
echo "Entrez un nombre: ";
while ($line = fgets(STDIN))
{
	$line = substr($line, 0, -1);	
	$tmp = $line;
	if (!is_numeric($line) || ctype_space($line[0]))	
		echo "'$line' n'est pas un chiffre\n";
	else if (substr($line, -1) % 2 == 0)
		echo "Le chiffre $tmp est Pair\n";
	else
		echo "Le chiffre $tmp est Impair\n";
	echo "Entrez un nombre: ";
}
echo "\n";
?>
