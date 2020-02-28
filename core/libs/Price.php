<?php

namespace core\libs;

use core\Hi;

class Price
{
    public static $curr;
    public static $value; 
    public static $convertedValue;
    public static $price;
    public static $oldValue = null;
    public static $convertedOldValue = null;
    public static $oldPrice = null;

    public function __construct($value, $oldValue) {
        
        self::$curr = Hi::$eddy->getProperty('currency');

        self::$value = $value;
        self::$convertedValue = self::$value * self::$curr['value'];
        self::$price = self::$curr['symbol_left'] . ' ' . self::$convertedValue . ' ' . self::$curr['symbol_right'];

        if ($oldValue) {
            self::$oldValue = $oldValue;
            self::$convertedOldValue = self::$oldValue * self::$curr['value'];
            self::$oldPrice = self::$curr['symbol_left'] . ' ' . self::$convertedOldValue . ' ' . self::$curr['symbol_right'];
        }
    }
}