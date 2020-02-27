<?php
namespace app\widgets\gardenNinja\src\RatedPG13;

use app\widgets\gardenNinja\src\Plant;

class Rice implements Plant
{
	public function __toString()
	{
		return "it's rice for you!";
	}
}