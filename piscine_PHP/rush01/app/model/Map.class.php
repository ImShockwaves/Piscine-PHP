<?php
class Map implements Norm42
{
	const WIDTH = 150;
	const HEIGHT = 100;
	const TABLE = 'maps';

	private $_map = array();
	private static $_ratioObstacle = 700;
	private static $_sizeMacObstacle = 10;
	private static $_sizeSafeZone = 40;

	public function __construct()
	{
		$i = 0;
		while ($i < self::HEIGHT)
		{
			$y = 0;
			while ($y < self::WIDTH)
			{
				$this->_map[$i][$y]['object'] = new Square($y, $i);
				$this->_map[$i][$y]['type'] = 0;
				$y++;
			}
			$i++;
		}
		$this->addObstacle();
	}
	public function initMap()
	{
		Mysql::getInstance()->query("TRUNCATE TABLE " . Map::TABLE);
		$i = 0;
		while ($i < self::HEIGHT)
		{
			$y = Map::$_sizeofSafeZone;
			while ($y < self::WIDTH - Map::$_sizeSafeZone)
			{
				if (mt_rand(1, Map::$_ratioObstacle) == 1)
				{
					$size_x = mt_rand(1, Map::$_sizeMacObstacle);
					$size_y = mt_rand(1, Map::$_sizeMacObstacle);
					$iy = 0;
					while ($iy < $size_y)
					{
						$ix = 0;
						while ($ix < $size_x)
						{
							if ($y + $ix < self::WIDTH - Map::$_sizeSafeZone)
								Obstacle::generate($y + $ix, $i + $iy);
							$ix++;
						}
						$iy++;
					}
				}
				$y++;
			}
			$i++;
		}
	}
	private function addObstacle()
	{
		$obstacles = Obstacle::loadAll();
		foreach ($obstacles as $v)
		{
			$this->_map[$v['y']][$v['x']]['object'] = new Obstacle($v['x'], $v['y']);
			$this->_map[$v['y']][$v['x']]['type'] = 1;
		}
	}
	public function getCoord($x, $y)
	{
		return $this->_map[$y][$x];
	}
	public function addShipMap($ships)
	{
		foreach ($ships as $ship)
		{
			if ($ship->getCurrentRotation() == 0)
			{
				$y = 0;
				while ($y < $ship->getSizeY())
				{
					$x = 0;
					while ($x < $ship->getSizeX())
					{
						$this->_map[$ship->getY() - $x][$ship->getX() + $y] = $ship;
						$x++;
					}
					$y++;
				}
			}
			if ($ship->getCurrentRotation() == 90)
			{
				$y = 0;
				while ($y < $ship->getSizeY())
				{
					$x = 0;
					while ($x < $ship->getSizeX())
					{
						$this->_map[$ship->getY() + $y][$ship->getX() + $x] = $ship;
						$x++;
					}
					$y++;
				}
			}
			if ($ship->getCurrentRotation() == 180)
			{
				$y = 0;
				while ($y < $ship->getSizeY())
				{
					$x= 0;
					while ($x < $ship->getSizeX())
					{
						$this->_map[$ship->getY() + $x][$ship->getX() - $y] = $ship;
						$x++;
					}
					$y++;
				}
			}
			if ($ship->getCurrentRotation() == 270)
			{
				$y = 0;
				while ($y < $ship->getSizeY())
				{
					$x = 0;
					while ($x < $ship->getSizeX())
					{
						$this->_map[$ship->getY() - $y][$ship->getX() - $x] = $ship;
						$x++;
					}
					$y++;
				}
			}
		}
	}
	public function getMap()
	{
		return $this->_map;
	}
	public static function doc()
	{
		$read = fopen("Map.doc.txt", 'r');
		while ($read && !feof($read))
			echo fgets($read);
	}
}
?>
