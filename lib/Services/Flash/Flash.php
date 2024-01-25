<?php 

namespace WawTravel\Services\Flash;

class Flash {

    public function setMessageFlash(string $type, string $message) {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message,
        ];
    }

    public function getMessageFlash() {
        if(isset($_SESSION['flash'])) {
            if($_SESSION['flash']['type'] == 'success') {
                $color = '#007C00';
            } else {
                $color = '#d30000';
            }
            $flash = [
                'message' => $_SESSION['flash']['message'],
                'color' => $color
            ];
            unset($_SESSION['flash']);
            return $flash;
        }
    }

    // delete $_SESSION['flash'] after refresh page
    public function deleteMessageFlash() {
        if(isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
    }

}  