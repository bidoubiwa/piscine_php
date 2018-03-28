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
			$elem->nodeValue =  strtoupper($elem->nodeValue) . "\n";
		//$doc->saveHTMLfile("new_file.html");
}
?>
