<?php
class Tyrion
{
	public function sleepWith($obj)
	{
		if ($obj instanceof Jaime)
			print("Not event if I'm drunk !" .PHP_EOL);
		else if ($obj instanceof Sansa)
			print("Let's do this." .PHP_EOL);
		else if ($obj instanceof Cersei)
			print("Not event if I'm drunk !" .PHP_EOL);
	}
}
?>
