<?php

namespace App\Controller;

use WawTravel\Controller\AbstractController;
use App\Entity\User;
use App\Manager\UserManager;
use WawTravel\Services\Auth\Authentificator;
use WawTravel\Services\FlashManager\FlashManager;

class AuthController extends AbstractController
{

    public function register()
    {
        $flash = new FlashManager();
        if (!empty($_POST)) {
            $user = new User();
            $userManager = new UserManager();
            try {
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $flash->addFlashMessage('error', 'Email invalide');
                }
                if (strlen($_POST['password']) < 8) {
                    $flash->addFlashMessage('error', 'Mot de passe trop court ou vide, veuillez saisir au moins 8 caractères');
                }

                if (!empty($flash->getFlashMessages())) {
                    return $this->renderView('auth/register.php', ['seo' => [
                        'title' => 'Inscription',],
                    ]);
                }

                $user->setEmail($email);
                $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
                $userManager->add($user);

                $authentificator = new Authentificator();
                $authentificator->connect([
                    'email' => $email,
                    'password' => $password,
                ]);

                $flash->addFlashMessage('success', 'Inscription réussie');

                return $this->redirectToRoute('roadtrip_list');
            } catch (\PDOException $e) {
                // Erreur liée à la contrainte d'unicité sur l'email
                if ($e->getCode() == 23000) {
                    // Email déjà utilisé, afficher le message flash
                    $flash->addFlashMessage('error', 'Cet email est déjà utilisé');
                } else {
                    // Gérer d'autres erreurs de base de données si nécessaire
                    // $flash->addFlashMessage('error', 'Une erreur s\'est produite lors de l\'inscription');
                    $flash->addFlashMessage('error', $e->getMessage());
                }

            }
        }

        return $this->renderView('auth/register.php', ['seo' => ['title' => 'Inscription',],
        ]);
    }


    public function login()
    {
        $flash = new FlashManager();
        if (!empty($_POST)) {
            $userManager = new UserManager();
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if (empty($email) || empty($password)) {
                $flash->addFlashMessage('error', 'Veuillez remplir tous les champs');
                return $this->renderView('auth/login.php', ['seo' => ['title' => 'Connexion']]);
            }

            $user = $userManager->findByEmail($email);
            $authentificator = new Authentificator();
            if (!empty($user) && password_verify(($password), $user->getPassword())) {
                $authentificator->connect([
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                ]);
                return $this->redirectToRoute('roadtrip_list');
            }
            //meesage d'erreur flash

            $flash->addFlashMessage('error', 'Email ou mot de passe incorrect');
            return $this->renderView('auth/login.php', ['seo' => ['title' => 'Connexion']]);
        }
        return $this->renderView('auth/login.php', ['seo' => ['title' => 'Connexion']]);


    }

    public function logout()
    {
        $authentificator = new Authentificator();
        $authentificator->disconnect();
        $authentificator->destroy();
        return $this->redirectToRoute('home');
    }

}