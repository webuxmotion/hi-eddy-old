<?php

namespace app\widgets\garden;

class MarijuanaGarden extends EmptyGarden
{
   public function items()
   {
      return array_fill(0, $this->numbersOfPlots, 'weed');
   }
}
