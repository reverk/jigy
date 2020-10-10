<?php
// Converts number to string or vise versa, not to verify
function convert_isOutside($value)
{
    if (is_numeric($value)) { // Number -> String
        return $value ? "Outside" : "Inside";
    } else { // String -> Number
        return $value == "Outside" ? 1 : 0;
    }
}

// Verifys if it's outside using boolean
function bool_isOutside($value) {
    return $value == 1;
}

?>
