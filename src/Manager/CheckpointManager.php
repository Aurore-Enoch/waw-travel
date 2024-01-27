<?php 

namespace App\Manager;

use WawTravel\Manager\AbstractManager;
use App\Entity\Checkpoint;
use App\Entity\RoadTrip;

class CheckpointManager extends AbstractManager {
    
    public function findAll() {
        return $this->readMany(Checkpoint::class, [], ['order_number' => 'ASC']);
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
                'arrival_date' => $checkpoint->getArrivalDate(),
                'departure_date' => $checkpoint->getDepartureDate(),
                'road_trip_id' => $checkpoint->getRoadTripId(),
                'order_number' => $checkpoint->getOrderNumber(),
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
                'order_number' => $checkpoint->getOrderNumber(),
            ],
             $checkpoint->getId(),
        );
    }
    
    public function delete(Checkpoint $checkpoint) {
        $this->remove(Checkpoint::class, $checkpoint->getId());
    }

    public function findAllByRoadTripId(array $filters = []) {
        return $this->readMany(Checkpoint::class, $filters);
    }   
}


