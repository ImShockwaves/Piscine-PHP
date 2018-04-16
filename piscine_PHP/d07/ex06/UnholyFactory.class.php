<?php

class UnholyFactory
{
	private $soldat = array();
	public function absorb($sold)
	{
		if (get_parent_class($sold))
		{
			if (isset($this->soldat[$sold->getName()]))
				print("(Factory already absorbed a fighter of type ".$sold->getName().")".PHP_EOL);
			else
			{
				print("(Factory absorbed a fighter of type ".$sold->getName().")".PHP_EOL);
				$this->soldat[$sold->getName()] = $sold;
			}
		}
		else
			print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
	}
	public function fabricate($sold)
	{
		if (array_key_exists($sold, $this->soldat))
		{
			print("(Factory fabricates a fighter of type ".$sold.")".PHP_EOL);
			return (clone $this->soldat[$sold]);
		}
		print("(Factory hasn't absorbed any fighter of type ".$sold.")". PHP_EOL);
		return null;
	}
}
?>
