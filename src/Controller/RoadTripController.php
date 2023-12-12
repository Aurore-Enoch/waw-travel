<?php

namespace App\Controller;

use WawTravel\Controller\AbstractController;
use App\Manager\RoadTripManager;
use App\Entity\RoadTrip;
use WawTravel\Services\Auth\Authentificator;

class RoadTripController extends AbstractController {

    public function list() {
        $authentificator = new Authentificator();
        if(!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }

        $roadTripManager = new RoadTripManager();
        $roadTrips = $roadTripManager->findAll();
        // var_dump($roadTrips);
    }

    public function show(int $id) {
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
    }

    public function add() {
        $authentificator = new Authentificator();
        if(!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }
        if(!empty($_POST)) {
            $roadTrip = new RoadTrip();
            $roadTripManager = new RoadTripManager();
            $roadTrip->setTitle($_POST['title']);
            //set of the others properties of the relations entities
            $roadTripManager->add($roadTrip);
            return $this->redirectToRoute('home');
        }
        return $this->renderView('roadTrip/add.php', ['seo' => [
            'title' => 'Ajouter un road trip',
        ]]);
    }

    public function edit(int $id) {
        $authentificator = new Authentificator();
        if(!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
        if(!empty($_POST)) {
            $roadTrip->setTitle($_POST['title']);
            //set of the others properties of the relations entities
            $roadTripManager->edit($roadTrip);
            // var_dump($roadTrip);
            return $this->redirectToRoute('home');
        }
        return $this->renderView('roadTrip/edit.php', ['seo' => [
            'title' => 'Modifier un road trip',
        ]]);
    }
}