<?php
function isOutside($value)
{
    if (is_numeric($value)) { // Number -> String
        return $value ? "Outside" : "Inside";
    } else { // String -> Number
        return $value == "Outside" ? 1 : 0;
    }
}

?>
