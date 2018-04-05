<?php

Class Lannister {

	function sleepWith($person)
	{
		if (get_class($person) == "Sansa")
			$this->letGo();
		else
			$this->personnalPref($person);
	}

	function letGo()
	{
		print("Let's do this." .PHP_EOL);
	}

	function notEvenIfDrunk()
	{
		print("Not even if I'm drunk !" . PHP_EOL);
	}
}


?>
