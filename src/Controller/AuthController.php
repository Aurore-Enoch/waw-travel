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
                $email = htmlspecialchars($_POST['email']);
                $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
                $user->setEmail($email);
                $user->setPassword($password);
                $userManager->add($user);

                $flash->setMessageFlash('success', 'Votre compte a bien été créé. Vous pouvez vous connecter');

                return $this->redirectToRoute('connexion');
            } catch (\PDOException $e) {
                // Erreur liée à la contrainte d'unicité sur l'email
                if ($e->getCode() == 23000) {
                    // Email déjà utilisé, afficher le message flash
                    $flash->setMessageFlash('error', 'Cet email est déjà utilisé');
                } else {
                    // Gérer d'autres erreurs de base de données si nécessaire
                    $flash->setMessageFlash('error', 'Une erreur s\'est produite lors de l\'inscription',);
                }
            }
        }
    
        $flashMessage = $flash->getMessageFlash();

        return $this->renderView('auth/register.php', ['seo' => [
            'title' => 'Inscription',],
            'message' => $flashMessage['message'] ?? null,
            'color' => $flashMessage['color'] ?? 'primary',
        ]);
    }
    

    public function login() {
        $flash = new Flash();
        if(!empty($_POST)) {
            $userManager = new UserManager();
            $email = htmlspecialchars($_POST['email']);
            $password =htmlspecialchars($_POST['password']);

            $user = $userManager->findByEmail($email);
            $authentificator = new Authentificator();
            if($user !== null && password_verify($password, $user->getPassword())) {
                $authentificator->connect([
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                ]);
                $flash->setMessageFlash('success', 'Vous êtes connecté');
                return $this->redirectToRoute('roadtrips');
            }
            $flash->setMessageFlash('error', 'Email ou mot de passe incorrect');
        }
        $flashMessage = $flash->getMessageFlash();
        return $this->renderView('auth/login.php', ['seo' => [
            'title' => 'Connexion'],
            'message' => $flashMessage['message'] ?? null,
            'color' => $flashMessage['color'] ?? 'primary',
            ]);
        
    }

    public function logout() {
        $authentificator = new Authentificator();
        $authentificator->disconnect();
        return $this->redirectToRoute('');
    }

    public function profile() {
        $flash = new Flash();
        $userManager = new UserManager();
        $user = $userManager->find($_SESSION['user']['id']);
        $email = $_SESSION['user']['email'];
        if(!empty($_POST)) {
            if (isset($_POST['newPassword']) && !empty($_POST['newPassword']) || isset($_POST['email']) && !empty($_POST['email'])) { 
                $emailPost = $_POST['email'];
                $passwordPost = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $user->setEmail($emailPost); 
                $user->setPassword($passwordPost); 

                $email = $emailPost;
                $_SESSION['user']['password'] = $passwordPost;
                $userManager->edit($user);
                $flash->setMessageFlash('success', 'Votre profil a bien été mis à jour');
            } else {
                $flash->setMessageFlash('error', 'Erreur, votre profil n\'a pas été mis à jour');
            }
        }

        $flashMessage = $flash->getMessageFlash();
        return $this->renderView('auth/profile.php', ['seo' => [
            'title' => 'Mon Profil'],
            'user' => $user,
            'email' => $email,
            'message' => $flashMessage['message'] ?? null,
            'color' => $flashMessage['color'] ?? 'primary',
            ]);
    }
        
}