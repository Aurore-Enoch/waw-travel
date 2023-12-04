<?php

namespace App\Manager;

use WawTravel\Manager\AbstractManager;
use App\Entity\RoadTrip;

class RoadTripManager extends AbstractManager {
    
    public function findAll() {
        return $this->readMany(RoadTrip::class);
    }



}

