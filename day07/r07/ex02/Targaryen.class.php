<?php

Class Targaryen{
	
	public function resistsFire()
	{
		return False;
	}

	function getBurned()
	{
		if ($this->resistsFire())
		{
				return "emerges naked but unharmed";
		}
		else
			return "burns alive";
	}
}


?>
