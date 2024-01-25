<?php 

namespace App\Manager;

use WawTravel\Manager\AbstractManager;

use App\Entity\User;

class UserManager extends AbstractManager {

    public function find(int $id): mixed {
        return $this->readOne(User::class, [ 'id' => $id ]);
    }

    public function findByEmail(string $email): mixed {
        return $this->readOne(User::class, [ 'email' => $email ]);
    }

    public function add(User $user): void {
        $this->create(
            User::class,
            [
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
            ]
        );
    }
    public function edit(User $user): void {
        $this->update(
            User::class,
            [
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
            ],
            $user->getId()
        );
    }
}