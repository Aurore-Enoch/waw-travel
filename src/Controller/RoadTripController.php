<?php

namespace App\Controller;

use WawTravel\Controller\AbstractController;
use App\Manager\RoadTripManager;
use App\Entity\RoadTrip;

class RoadTripController extends AbstractController {

    public function list() {
        $roadTripManager = new RoadTripManager();
        $roadTrips = $roadTripManager->findAll();
        var_dump($roadTrips);
    }
}