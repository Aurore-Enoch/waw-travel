<?php 

namespace WawTravel\Services\Security;

class Security {
    function escape($value, $escape = true) {
        var_dump($value);
        if ($escape) {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', true);
        } else {
            return $value;
        }
    }
}