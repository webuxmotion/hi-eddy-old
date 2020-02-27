<?php

namespace app\widgets\garden;

class EmptyGarden
{
    public $width;
    public $height;
    public $numbersOfPlots;

    public function __construct(PlotArea $plot)
    {
        $this->plot = $plot;
        $this->numbersOfPlots = $this->plot->totalNumberOfPlots();

    }
    public function items()
    {
        return array_fill(0, $this->numbersOfPlots, 'handful of dirt');
    }
}
