<?php 

namespace WawTravel\Services\Security;

class Security {
    function escape($value, $escape = true) {
        if (is_string($value)) {
            if ($escape) {
                return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', true);
            } else {
                return $value;
            }
        } elseif (is_array($value)) {
            foreach ($value as $key => $val) {
                if (is_object($val)) {
                    $reflectedClass = new \ReflectionClass($val);
                    $properties = $reflectedClass->getProperties();
                    foreach ($properties as $property) {
                        if(!is_int($property->getValue($val))){
                            $property->setAccessible(true);
                            $key = $property->getName();
                            if($escape) {
                                $escapedVal = htmlspecialchars($property->getValue($val), ENT_QUOTES, 'UTF-8', true);
                            } else {
                                $escapedVal = $property->getValue($val);
                            }
                            $property->setValue($val, $escapedVal);
                        }
                    }
                } else {
                    $value[$key] = $this->escape($val, $escape);
                }
            }
            return $value; 
        } elseif (is_object($value)) {
            $vars = get_object_vars($value);
            foreach ($vars as $var => $varVal) {
                if (!is_int($varVal)) {
                    $value->$var = $this->escape($varVal, $escape);
                }
            }
            return $value;
        } else {
            return $value;
        }
        
    }

}