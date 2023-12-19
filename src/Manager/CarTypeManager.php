<?php

namespace App\Manager;

use WawTravel\Manager\AbstractManager;
use App\Entity\CarType;

class CarTypeManager extends AbstractManager {
    
    public function findAll() {
        return $this->readMany(CarType::class);
    }

    public function find(int $id) {
        return $this->readOne(CarType::class, ['id' => $id]);
    }

    public function add(CarType $carType) {
        $this->create(
            CarType::class,
            [
                'name' => $carType->getName(),
            ]
        );
    }

    public function edit(CarType $carType) {
        $this->update(
            CarType::class,
            [
                'name' => $carType->getName(),
            ],
             $carType->getId(),
        );
    }

   
}