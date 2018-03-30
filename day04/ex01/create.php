<?php
if ($_POST["submit"] === "OK" && $_POST["login"] !== "" && $_POST["passwd"] != "")
{
	$accounts = [];
	if (!file_exists("../private"))
	{
		mkdir("../private");
		file_put_contents("../private/passwd", null);
	}
	else
	{
		$file = file_get_contents("../private/passwd");
		$accounts =  unserialize($file);
	}
	$exist = false;
	if ($accounts)
	{
		foreach ($accounts as $account)
		{
			if ($account["login"] === $_POST["login"])
				$exist = true;
		}
	}
	if (!$exist)
	{
		$account["login"] =  $_POST["login"];
		$account["passwd"] =  hash("whirlpool", $_POST["passwd"]);
		$accounts[] = $account;
		file_put_contents("../private/passwd", serialize($accounts));
	}
	else
		echo "ERROR\n";
}
else
{
	echo "ERROR\n";
}

?>
