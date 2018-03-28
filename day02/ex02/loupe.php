#!/usr/bin/php
<?PHP
if ($argc > 1)
{
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
		if (!$doc->loadHTMLFile($argv[1], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD))
		{
				echo "Fichier non existant ou n'est pas du HTML\n";
				exit();
		}
		$elements = $doc->getElementsByTagName("a");
		foreach($elements as $elem)
		{
			$cpy = $elem->cloneNode(TRUE);
			$childs = false;
			if ($cpy->hasChildNodes())
				$childs = $cpy->childNodes;
			$elem->textContent = strtoupper($elem->nodeValue);
			if ($childs)
			{
				var_dump($childs->length);
				if ($childs->length > 1)
				{
					$first = true;
					foreach($childs as $child)
					{
					if ($first)
						$first = false;
					else
						$elem->appendChild($child);
					var_dump($child);
					}
				}
			}
		}
		echo $doc->saveHTML();
			//			$elem->nodeValue =  strtoupper($elem->nodeValue) . "\n";
		//$doc->saveHTMLfile("new_file.html");
}
?>
