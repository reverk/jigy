<?php

namespace App\Helpers;

class Helper
{

    // Converts number to string or vise versa, not to verify
    public static function convert_isOutside($value)
    {
        if (is_numeric($value)) { // Number -> String
            return $value ? "Outside" : "Inside";
        } else { // String -> Number
            return $value == "Outside" ? 1 : 0;
        }
    }

    // Verifies if it's outside using boolean
    public static function bool_isOutside($value)
    {
        return $value == 1;
    }


}
