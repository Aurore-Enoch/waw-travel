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
                // get the others properties of the relations entities
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


}

