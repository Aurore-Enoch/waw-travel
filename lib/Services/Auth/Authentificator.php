<?php 

namespace WawTravel\Services\Auth;

class Authentificator {

    public static function connect(array $user) {
        $_SESSION['user'] = $user;
    }

    public static function disconnect() {
        // unset($_SESSION['user']);
        $_SESSION = array();
    }

    public static function isConnected(): bool {
        return isset($_SESSION['user']);
    }
    
    public static function destroy() {
        session_destroy();
    }

}  