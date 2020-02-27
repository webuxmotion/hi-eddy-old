<?php

namespace core\libs;

use core\Hi;

class Helper 
{
    public static function getPrice($value) {
        $curr = Hi::$eddy->getProperty('currency');
        return $curr['symbol_left'] . ' ' . $value * $curr['value'] . ' ' . $curr['symbol_right'];
    }

    public static function getOldPrice($value) {
        $curr = Hi::$eddy->getProperty('currency');
        return $value
            ? ($curr['symbol_left'] . ' ' . $value * $curr['value'] . ' ' . $curr['symbol_right'])
            : null;
    }
}