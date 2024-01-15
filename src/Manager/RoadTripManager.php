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
                'car_type_id' => $roadTrip->carTypeId(),
                'user_id' => $roadTrip->getUserId(),
            ]
        );
        // $roadTripId = $roadTrip->getId();
        // $checkpointManager = new CheckpointManager();
        
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

    public function getCheckpoints(RoadTrip $roadTrip) {
        $checkpointManager = new CheckpointManager();
        $checkpoints = $checkpointManager->findAllByRoadTripId(['road_trip_id' => $roadTrip->getId()]);
        return $checkpoints;
    }
    public function getLastId() {
        $lastId = $this->readMany(RoadTrip::class, [], ['id' => 'DESC'], 1);
        var_dump($lastId);
        return $lastId[0]->getId();
    }

}

