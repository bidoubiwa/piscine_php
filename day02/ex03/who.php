#!/usr/bin/php
<?PHP
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
	if ($argc < 2 || !file_exists($argv[1]))
		exit();
	$read = fopen($argv[1], 'r');
	$pages = [];
	while ($utmp = fread($read, 628))
		$pages[] = unpack('a256a/a4b/a32c/id/ie/lf/a256g/i16h', $utmp);
	
	$max_usr = 0;	
	$max_tty = 0;	
	print_r($pages);
	for ($i = 2; $i < count($pages); $i++)
	{
		if (strlen($pages[$i]['a']) > $max_usr)
				$max_usr = strlen($pages[$i]['a']);
		if (strlen($pages[$i]['c']) > $max_tty)
				$max_tty = strlen($pages[$i]['c']);
	}	
	for ($i = 2; $i < count($pages); $i++)
	{	
		//var_dump($pages[$i]['a']);
		//var_dump($pages[$i]['c']);
		echo str_pad($pages[$i]['a'], $max_usr + 5); 
		echo str_pad($pages[$i]['c'], $max_tty + 5);
		echo strftime("%a %e %H:%M\n", $pages[$i]['f']);
		
	}	
?>
