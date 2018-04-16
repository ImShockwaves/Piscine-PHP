<?php
class NightsWatch implements IFighter
{
	private $garde = array();
	public function recruit($soldat)
	{
		$this->garde[] = $soldat;
	}
	function fight()
	{
		foreach ($this->garde as $soldat)
		{
			if (method_exists(get_class($soldat), 'fight'))
				$soldat->fight();
		}
	}
}
?>
