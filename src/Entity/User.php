<?php

namespace App\Entity;

class User {

    private ?int $id;
    private ?string $email;
    private ?string $password;
    private ?string $created_at;

    public function getId(): ?int {
        return $this->id;
    }

    public function getEmail(): ?string {
        return $this->email;
    }
    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    public function getPassword(): ?string {
        return $this->password;
    }
    public function setPassword(?string $password): void {
        $this->password = $password;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }
    public function setCreatedAt(?string $created_at): void {
        $this->created_at = $created_at;
    }
    

}