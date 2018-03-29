#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	if ($argc < 2 || !file_exists($argv[1]))
		exit();
	$read = fopen($argv[1], 'r');
	$page = "";
	while ($read && !feof($read))
		$page .= fgets($read);

	$find_a = "/<a[^>]*>[\s\S]?([A-Za-z\s]*)[\s\S]*<\/a>/U";
	$page = preg_replace_callback($find_a, function($tab)
	{
		$tab[0] = preg_replace_callback("/>([^><]*)</U", function($word){
			return strtoupper($word[0]);
		}, $tab[0]);
		$tab[0] = preg_replace_callback("/title=\"(.*)\"/U", function($title){
			$title[0] = str_replace($title[1], strtoupper($title[1]), $title[0]);	
			return $title[0];
		}, $tab[0]);
		return $tab[0];	
	}, $page);
	echo $page;
}
?>
