<?php
Class UnholyFactory{

	private	$_abs = [];

	function absorb($soldier)
	{
		if (is_subclass_of($soldier, "Fighter"))
		{
			$key = $soldier->getType();
			if (array_key_exists($key, $this->_abs))
				print("(Factory already absorbed a fighter of type " . 
				$soldier->getType() . ")" . PHP_EOL);
			else
			{
				$this->_abs[$key] = $soldier;
				print("(Factory absorbed a fighter of type " . 
				   $soldier->getType() . ")" . PHP_EOL);	
			}
		}
		else
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
	}

	function fabricate ($type)
	{
		if (array_key_exists($type, $this->_abs))	
		{
				print("(Factory fabricates a fighter of type " 
						. $type . ")" . PHP_EOL);
				return $this->_abs[$type];	
		}
		else 
		 print("(Factory hasn't absorbed any fighter of type " .
		 $type . ")". PHP_EOL);

	}
}

?>
