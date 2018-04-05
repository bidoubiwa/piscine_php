<?php

Class Tyrion extends Lannister
{
	function personnalPref($person)
	{
		if (get_class($person) == "Jaime" || get_class($person) == "Cersei")
			$this->notEvenIfDrunk();
	}

}

?>
