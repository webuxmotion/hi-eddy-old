<?php
namespace app\widgets\gardenNinja\src\RatedR;

use app\widgets\gardenNinja\src\Plant;

class Marijuana implements Plant
{
	public function __toString()
	{
		return "It's a marijuana plant, home slice!";
	}
}