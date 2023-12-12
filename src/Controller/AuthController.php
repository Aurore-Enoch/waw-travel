<?php 

namespace App\Controller;

use WawTravel\Controller\AbstractController;
use App\Entity\User;
use App\Manager\UserManager;
use WawTravel\Services\Auth\Authentificator;
use WawTravel\Services\Flash\Flash;

class AuthController extends AbstractController {

    public function register() {
        $flash = new Flash();
        if(!empty($_POST)) {
            $user = new User();
            $userManager = new UserManager();
    
            try {
                $user->setEmail($_POST['email']);
                $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));
                $userManager->add($user);
    
                $authentificator = new Authentificator();
                $authentificator->connect([
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                ]);
    
                return $this->redirectToRoute('roadtrip_list');
            } catch (\PDOException $e) {
                // Erreur liée à la contrainte d'unicité sur l'email
                if ($e->getCode() == 23000) {
                    // Email déjà utilisé, afficher le message flash
                    $flash->setMessageFlash('error', 'Cet email est déjà utilisé');
                } else {
                    // Gérer d'autres erreurs de base de données si nécessaire
                    $flash->setMessageFlash('error', 'Une erreur s\'est produite lors de l\'inscription');
                }
            }
        }
    
        return $this->renderView('auth/register.php', ['seo' => [
            'title' => 'Inscription',],
            'message' => $flash->getMessageFlash()
        ]);
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
                return $this->redirectToRoute('roadtrip_list');
            }
            return $this->redirectToRoute('login');
            //meesage d'erreur flash
            $flash = new Flash();
            $flash->setMessageFlash('error', 'Email ou mot de passe incorrect');
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