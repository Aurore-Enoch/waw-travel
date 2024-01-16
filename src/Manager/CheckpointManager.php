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
                'arrival_date' => $checkpoint->getArrivalDate()->format('Y-m-d'),
                'departure_date' => $checkpoint->getDepartureDate()->format('Y-m-d'),
                'road_trip_id' => $checkpoint->getRoadTripId(),
            ]
        );
    }

    public function edit(Checkpoint $checkpoint) {
        $this->update(
            Checkpoint::class,
            [
                'title' => $checkpoint->getTitle(),
                'coordinates' => $checkpoint->getCoordinates(),
                'arrival_date' => $checkpoint->getArrivalDate(),
                'departure_date' => $checkpoint->getDepartureDate(),
                'road_trip_id' => $checkpoint->getRoadTripId(),
            ],
             $checkpoint->getId(),
        );
    }

    public function findAllByRoadTripId(array $filters = []) {
        return $this->readMany(Checkpoint::class, $filters);
    }
   
}


