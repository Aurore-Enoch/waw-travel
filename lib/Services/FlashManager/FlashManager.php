<?php

namespace WawTravel\Services\FlashManager;

class Flash
{
    public $type;
    public $message;

    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }
}

class FlashManager
{
    public function addFlashMessage(string $type, string $message)
    {
        $flash = new Flash($type, $message);
        $_SESSION['flash'][] = $flash;
    }

    public function getFlashMessages()
    {
        if (isset($_SESSION['flash'])) {
            $flashMessages = $_SESSION['flash'];
            return $flashMessages;
        }
    }

    public function deleteFlashMessages()
    {
        if (isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
    }
}