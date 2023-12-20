<?php
namespace App\Entity;

use App\Entity\CarType;
use App\Entity\User;
use App\Manager\CarTypeManager;

#[\AllowDynamicProperties]
class RoadTrip
{

    private ?int $id;
    private ?string $title;
    private ?CarType $carType;
    private ?User $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getCarType(): ?CarType
    {
        return $this->carType;
    }
    public function setCarType(?CarType $carType): void
    {
        $this->carType = $carType;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    public function carTypeId(): ?int
    {
        return $this->carType->getId();
    }

}