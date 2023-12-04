<?php 

namespace App\Controller;

use WawTravel\Controller\AbstractController;
use App\Entity\User;
use App\Manager\UserManager;
use WawTravel\Services\Auth\Authentificator;

class AuthController extends AbstractController {

    public function register() {
        if(!empty($_POST)) {
            $user = new User();
            $userManager = new UserManager();
            $user->setEmail($_POST['email']);
            $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));
            $userManager->add($user);
            
            var_dump($user);

            $authentificator = new Authentificator();
            $authentificator->connect([
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ]);
            return $this->redirectToRoute('home');
        }
        return $this->renderView('auth/register.php', ['seo' => [
            'title' => 'Inscription',
        ]]);
    }

    public function login() {
        if(!empty($_POST)) {
            $userManager = new UserManager();
            $user = $userManager->findByEmail($_POST['email']);
            $authentificator = new Authentificator();
            if(password_verify(($_POST['password']), $user->getPassword())) {
                $authentificator->connect([
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                ]);
                return $this->redirectToRoute('home');
            }
            return $this->redirectToRoute('login');
            //meesage d'erreur flash 
        }
        return $this->renderView('auth/login.php', ['seo' => [
            'title' => 'Connexion',
            ]]);
        
    }

    public function logout() {
        $authentificator = new Authentificator();
        $authentificator->disconnect();
        return $this->redirectToRoute('home');
    }
        
}