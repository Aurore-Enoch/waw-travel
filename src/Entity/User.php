<?php

namespace App\Entity;

use DateTime;

class User
{

    private ?int $id;
    private ?string $email;
    private ?string $password;
    private ?DateTime $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }
    public function setCreatedAt(?DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }


}