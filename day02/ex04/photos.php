#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	libxml_use_internal_errors(true);
	$doc = new DOMDocument();
	if (!$doc->loadHTMLFile($argv[1]))
	{
		echo "Fichier non existant ou n'est pas du HTML\n";
		exit();
	}
	$dir = preg_replace("/http[s]?:\/\//", "", $argv[1]);
	system("mkdir -p $dir");
	$elements = $doc->getElementsByTagName("img");
	foreach($elements as $elem)
	{
		foreach($elem->attributes as $img)
		{
			if ($img->name == "src")
			{
				preg_match("/.*\/(.*)$/", $img->textContent, $matches);
				if (count($matches) == 0)
					$name = $img->textContent;
				else
					$name = $matches[1];
				if (preg_match("/http/", $img->value))
					$file = file_get_contents($img->value);
				else 
					$file = file_get_contents($argv[1] . $img->value);
				file_put_contents($dir . "/" . $name, $file);
			}
		}
	}
}

?>
