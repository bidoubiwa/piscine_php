#!/usr/bin/php
<?PHP
	date_default_timezone_set('Europe/Paris');
	$read = fopen("/var/run/utmpx", 'r');
	$pages = [];
	while ($utmp = fread($read, 628))
	{
		$unpack = unpack('a256name/a4id/a32line/ipid/itype/ltime/a256host/i16pad', $utmp);
		$unpack['line'] = trim($unpack['line']); 
		$unpack['name'] = trim($unpack['name']); 
		$pages[$unpack['line']] = $unpack;
	}
	ksort($pages);
	$max_usr = 8;	
	$max_tty = 8;
	foreach ($pages as $page)
	{
		$page['name'] = trim($page['name']);
		$page['line'] = trim($page['line']);
		if (strlen($page['name']) > $max_usr)
				$max_usr = strlen($page['name']);
		if (strlen($page['line']) > $max_tty)
				$max_tty = strlen($page['line']);
	}
	foreach ($pages as $page)
	{
		if ($page['type'] == 7)
		{	
			echo str_pad($page['name'], $max_usr + 1); 
			echo str_pad($page['line'], $max_tty + 1);
			echo date("M d H:i ", $page['time']);
			echo "\n";
		}
	}	
?>
