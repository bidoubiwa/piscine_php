<?php

abstract Class Fighter
{
		private $_type;
		
		abstract function fight($target);
		function __construct($type)
		{
			$this->_type = $type;
		}

		function getType()
		{
			return $this->_type;
		}
}


?>
