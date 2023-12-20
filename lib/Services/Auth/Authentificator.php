<?php

namespace WawTravel\Services\Auth;

class Authentificator
{

    public static function connect(array $user)
    {
        session_start();
        session_set_cookie_params(1800, "/", "localhost", false, true);
        $_SESSION['user'] = $user;
    }

    public static function disconnect()
    {
        // unset($_SESSION['user']);
        $_SESSION = array();

    }

    public static function isConnected(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function destroy()
    {
        session_destroy();
    }

}