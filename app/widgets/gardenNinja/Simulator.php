<?php
namespace app\widgets\gardenNinja;

use app\widgets\gardenNinja\src\Client;
use app\widgets\gardenNinja\src\RatedR\DrugDealer;
use app\widgets\gardenNinja\src\RatedPG13\RiceFarmer;

class Simulator 
{
	public function __construct() {
		$ratings = array(
			'PG-13' => new RiceFarmer,
			'R' => new DrugDealer
		);

		$key = array_rand($ratings);
		
		$merchant = $ratings[$key];
		
		$client = new Client($merchant);
		
		$client->run();
	}
}
