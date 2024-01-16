<?php

namespace App\Controller;

use App\Entity\Checkpoint;
use WawTravel\Controller\AbstractController;
use App\Manager\RoadTripManager;
use App\Entity\RoadTrip;
use App\Manager\CarTypeManager;
use App\Manager\CheckpointManager;
use WawTravel\Services\Auth\Authentificator;
use WawTravel\Services\Flash\Flash;

class RoadTripController extends AbstractController
{

    //Add htmlspecialchars 

    public function list()
    {
        $authentificator = new Authentificator();
        if (!$authentificator->isConnected()) {
            return $this->redirectToRoute('app_login');
        }
        $roadTripManager = new RoadTripManager();
        var_dump($roadTripManager->findAll());
        return $this->renderView('roadtrip/list.php', [
            'seo' => [
                'title' => 'Liste des road trips',
            ],
            'roadtrips' => $roadTripManager->findAll()
        ]);
    }

    public function show(int $id)
    {
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
        $carTypeName = $roadTripManager->getCarTypeName($roadTrip);
        $checkpoints = $roadTripManager->getCheckpoints($roadTrip);
        return $this->renderView('roadtrip/show.php', [
            'seo' => [
                'title' => $roadTrip->getTitle(),
            ],
            'roadtrip' => $roadTrip,
            'carTypeName' => $carTypeName,
            'checkpoints' => $checkpoints
        ]);
    }

    public function add()
    {
        $authentificator = new Authentificator();
        $flash = new Flash();
        $carTypeManager = new CarTypeManager();
        $carTypes = $carTypeManager->findAll();

        if (!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }
        if (!empty($_POST)) {
            $roadTrip = new RoadTrip();
            $roadTripManager = new RoadTripManager();
            $roadTrip->setTitle($_POST['titleRoadTrip']);
            $roadTrip->setCarTypeId($_POST['carTypeId']);
            var_dump($roadTrip);
            //setteurs pour user et ckeckpoints 
            var_dump($_SESSION['user']);

            $roadTrip->setUserId($_SESSION['user']['id']);
            $roadTripManager->add($roadTrip);
            // message flash (success, votre road trip a bien été ajouté)
            $flash->setMessageFlash('success', 'Votre roadtrip a bien été ajouté');
            // return $this->redirectToRoute('roadtrips');
        }
        return $this->renderView(
            'roadTrip/add.php',
            [
                'seo' => [
                    'title' => 'Ajouter un road trip',
                ], 'message' => $flash->getMessageFlash(),
                'carTypes' => $carTypes
            ]
        );
    }

    public function edit(int $id)
    {
        $authentificator = new Authentificator();
        $flash = new Flash();
        $carTypeManager = new CarTypeManager();
        $carTypes = $carTypeManager->findAll();
        if (!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
        $checkpoints = $roadTripManager->getCheckpoints($roadTrip);
        var_dump($roadTrip);

        if (!empty($_POST)) {
            $roadTrip->setTitle($_POST['titleRoadTrip']);
            $roadTrip->setCarTypeId($_POST['carTypeId']);

            $roadTripManager->edit($roadTrip);
            $checkpoint = new Checkpoint();
            $checkpoint->setTitle($_POST['titleCheckpoint']);
            $checkpoint->setCoordinates($_POST['coordinates']);
            $checkpoint->setArrivalDate($_POST['arrival_date']);
            $checkpoint->setDepartureDate($_POST['departure_date']);

            $checkpoint->setRoadtripId($roadTrip->getId());
            
    
            // Save the checkpoint to the database
            $checkpointManager = new CheckpointManager();
            $checkpointManager->add($checkpoint);

            // message flash (success, votre road trip a bien été ajouté)

            $flash->setMessageFlash('success', 'Votre roadtrip a bien été modifié');
            // return $this->redirectToRoute('roadtrips');
        }
        return $this->renderView(
            'roadTrip/edit.php',
            [
                'seo' => [
                    'title' => 'Modifier un road trip',
                ],
                'message' => $flash->getMessageFlash(),
                'roadtrip' => $roadTrip,
                'carTypes' => $carTypes,
                'checkpoints' => $checkpoints,
            ],
        );
    }
    public function delete(int $id)
    {
        $authentificator = new Authentificator();
        $flash = new Flash();
        if (!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
        $roadTripManager->delete($roadTrip);
        $flash->setMessageFlash('success', 'Votre roadtrip a bien été supprimé');
        return $this->redirectToRoute('roadtrips');
    }
}
