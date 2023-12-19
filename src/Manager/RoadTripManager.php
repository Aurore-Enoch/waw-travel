<?php

namespace App\Manager;

use WawTravel\Manager\AbstractManager;
use App\Entity\RoadTrip;

class RoadTripManager extends AbstractManager {
    
    public function findAll() {
        return $this->readMany(RoadTrip::class);
    }

    public function find(int $id) {
        return $this->readOne(RoadTrip::class, ['id' => $id]);
    }

    public function add(RoadTrip $roadTrip) {
        $this->create(
            RoadTrip::class,
            [
                'title' => $roadTrip->getTitle(),
            ]
        );
    }

    public function edit(RoadTrip $roadTrip) {
        $this->update(
            RoadTrip::class,
            [
                'title' => $roadTrip->getTitle(),
                // get the others properties of the relations entities
            ],
             $roadTrip->getId(),
        );
    }

    public function getCarTypeName(RoadTrip $roadTrip) {
        $carTypeManager = new CarTypeManager();
        $carType = $carTypeManager->find($roadTrip->carTypeId());
        return $carType->getName();
    }

}

