<?php

Class Jaime extends Lannister
{

	function withPleasure()
	{
		print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
	}
	function personnalPref($person)
	{
		if (get_class($person) == "Tyrion")
			$this->notEvenIfDrunk();
		else if (get_class($person) == "Cersei")
			$this->withPleasure();
	}

}

?>
