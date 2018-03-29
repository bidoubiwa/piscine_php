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

	$xpath = new DOMXPath($doc);
	$linkTextNodes = $xpath->query('//a/*/text()');
	foreach ($linkTextNodes as $node) {
		    $node->textContent = strtoupper($node->textContent);
	}


	//echo $doc->saveHTML();
	
/*	$elements = $doc->getElementsByTagName("a");
	foreach($elements as $elem)
	{
		$childs = false;
		if ($elem->hasChildNodes())
			$childs = $elem->childNodes;
		if ($childs)
		{
			foreach($childs as $child)
			{
				echo $child->getAttribute('title');
			}
		}
	}*/
	echo $doc->saveHTML();
	//$elem->nodeValue =  strtoupper($elem->nodeValue) . "\n";
	//$doc->saveHTMLfile("new_file.html");

}
?>
