<?php

Class NightsWatch {

	public $fighters = [];

	public function recruit($member)
	{
		$this->fighters[] = $member;
	}

	public function fight()
	{
			foreach ($this->fighters as $member)
			{
					if (is_subclass_of($member, 'IFighter'))
					{
						$member->fight();
					}
			}
	}

}

?>
