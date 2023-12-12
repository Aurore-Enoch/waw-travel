<?php 

namespace WawTravel\Services\Flash;

class Flash {

    public static function setMessageFlash(string $type, string $message) {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message,
        ];
    }

    // à voir son utilité
    public static function getMessageFlash() {
        if(isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash']['message'];
            unset($_SESSION['flash']);
            return $flash;
        }
    }

}  