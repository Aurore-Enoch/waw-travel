<?php 

namespace App\Manager;

use WawTravel\Manager\AbstractManager;
use App\Entity\Checkpoint;
use App\Entity\RoadTrip;

class CheckpointManager extends AbstractManager {
    
    public function findAll() {
        return $this->readMany(Checkpoint::class);
    }

    public function find(int $id) {
        return $this->readOne(Checkpoint::class, ['id' => $id]);
    }

    public function add(Checkpoint $checkpoint) {
        $this->create(
            Checkpoint::class,
            [
                'title' => $checkpoint->getTitle(),
                'coordinates' => $checkpoint->getCoordinates(),
                'arrivalDate' => $checkpoint->getArrivalDate(),
                'departureDate' => $checkpoint->getDepartureDate(),
            ]
        );
    }

    public function edit(Checkpoint $checkpoint) {
        $this->update(
            Checkpoint::class,
            [
                'title' => $checkpoint->getTitle(),
                'coordinates' => $checkpoint->getCoordinates(),
                'arrivalDate' => $checkpoint->getArrivalDate(),
                'departureDate' => $checkpoint->getDepartureDate(),
            ],
             $checkpoint->getId(),
        );
    }

    public function findAllByRoadTripId(array $filters = []) {
        return $this->readMany(Checkpoint::class, $filters);
    }
   
}


