<?php 
if ($_GET["action"] == "set")
{
	if ($_GET['name'] && $_GET['value'])
	{
		$name = $_GET["name"];
		$value = $_GET["value"];
		setcookie($name, $value, time() + 60 * 60);
	}
}	
else if ($_GET["action"] == "get")
{
	if ($_GET['name'])
	{
		$name = $_GET["name"];
		echo $_COOKIE[$name]."\n";
	}
}
else if ($_GET["action"] == "del")
{
	$name = $_GET["name"];
	setcookie($name,"", time() - 1);
	var_dump($_COOKIE[$name]);
}
?>
