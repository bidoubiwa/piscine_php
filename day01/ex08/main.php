#!/usr/bin/php
<?PHP
include("ft_is_sort.php");

$tab = ["Helloo", "aa", "bb"];
$tab[] = "prout";

if (ft_is_sort($tab))
	echo "trie ok";
else
	echo "trie pas ok";

?>
