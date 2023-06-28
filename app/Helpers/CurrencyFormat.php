<?php

namespace App\Helpers;

class CurrencyFormat {
    public static function data($value){
        $formattedValue = number_format($value, 0, ",", ".");
        $currencySymbol = 'Rp'; // Change this to the appropriate currency symbol

        return $currencySymbol . $formattedValue;
    }
}