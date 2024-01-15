<?php

namespace App\Controller;

use WawTravel\Controller\AbstractController;
use App\Manager\RoadTripManager;
use App\Entity\RoadTrip;
use App\Manager\CarTypeManager;
use WawTravel\Services\Auth\Authentificator;
use WawTravel\Services\Flash\Flash;

class RoadTripController extends AbstractController {

    //Add htmlspecialchars 

    public function list() {
        $authentificator = new Authentificator();
        if(!$authentificator->isConnected()) {
            return $this->redirectToRoute('app_login');
        }
        $roadTripManager = new RoadTripManager();
        var_dump($roadTripManager->findAll()); 
        return $this->renderView('roadtrip/list.php', ['seo' => [
            'title' => 'Liste des road trips',],
            'roadtrips' => $roadTripManager->findAll()
        ]);
    }

    public function show(int $id) {
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
        $carTypeName = $roadTripManager->getCarTypeName($roadTrip);
        $checkpoints = $roadTripManager->getCheckpoints($roadTrip);
        return $this->renderView('roadtrip/show.php', ['seo' => [
            'title' => $roadTrip->getTitle(),],
            'roadtrip' => $roadTrip,
            'carTypeName' => $carTypeName,
            'checkpoints' => $checkpoints
        ]);
    }

    public function add() {
        $authentificator = new Authentificator();
        $flash = new Flash();
        $carTypeManager = new CarTypeManager();
        $carTypes = $carTypeManager->findAll();

        if(!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }
        if(!empty($_POST)) {            
            $roadTrip = new RoadTrip();
            $roadTripManager = new RoadTripManager();
            // set id of roadtrip with +1 of the last id
            $roadTrip->setId($roadTripManager->getLastId() + 1);
            $roadTrip->setTitle($_POST['titleRoadTrip']);
            $roadTrip->setCarTypeId($_POST['carTypeId']); //verifier que ça associe bien l'id du carType
            var_dump($roadTrip);
            //setteurs pour user et ckeckpoints 
            var_dump($_SESSION['user']);
            $roadTrip->setUserId($_SESSION['user']);
            $roadTripManager->add($roadTrip);
            // message flash (success, votre road trip a bien été ajouté)
            $flash->setMessageFlash('success', 'Votre roadtrip a bien été ajouté');
            return $this->redirectToRoute('roadtrip_list');
        }
        return $this->renderView('roadTrip/add.php', 
        ['seo' => [
            'title' => 'Ajouter un road trip',
        ], 'message' => $flash->getMessageFlash(),
            'carTypes' => $carTypes
        ]);
    
    }

    public function edit(int $id) {
        $authentificator = new Authentificator();
        $flash = new Flash();
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
             // message flash (success, votre road trip a bien été ajouté)
             $flash->setMessageFlash('success', 'Votre roadtrip a bien été modifié');
            return $this->redirectToRoute('roadtrip_list');
        }
        return $this->renderView('roadTrip/edit.php', ['seo' => [
            'title' => 'Modifier un road trip',],
            'message' => $flash->getMessageFlash()
        ]);  
    }
}