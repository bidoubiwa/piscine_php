<?php
session_start();
if ($_GET["submit"] === "OK")
{
	if ($_GET["login"] != "" && $_GET["passwd"] != "")
	{
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["passwd"] = $_GET["passwd"];
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="index.php" method="GET" >
	<label for="login">Identifiant :</label> <input type="text" id="login" name="login" value="<?=$_SESSION["login"]?>"/>
		<br>
		<label for="passwd">Mot de passe :</label> <input type="password" id="passwd" name="passwd" value="<?=$_SESSION["passwd"]?>"/>
		<br>
		<input type="submit" name="submit" value="OK">
	</form> 
</body>
</html>

