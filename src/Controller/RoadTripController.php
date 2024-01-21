<?php

namespace App\Controller;

use App\Entity\Checkpoint;
use WawTravel\Controller\AbstractController;
use App\Manager\RoadTripManager;
use App\Entity\RoadTrip;
use App\Manager\CarTypeManager;
use App\Manager\CheckpointManager;
use App\Manager\UserManager;
use WawTravel\Services\Security\Security;
use WawTravel\Services\Auth\Authentificator;
use WawTravel\Services\Flash\Flash;

class RoadTripController extends AbstractController
{

    public function list()
    {
        $authentificator = new Authentificator();
        if (!$authentificator->isConnected()) {
            return $this->redirectToRoute('app_login');
        }
        $security = new Security();
        $roadTripManager = new RoadTripManager();
        $userId = $_SESSION['user']['id'];

        $escapedRoadTrips = $security->escape($roadTripManager->findAll($userId), true);
        //var_dump($escapedRoadTrips);

    
        return $this->renderView('roadtrip/list.php', [
            'seo' => [
                'title' => 'Liste des road trips',
            ],
            'roadtrips' => $escapedRoadTrips,
            'security' => $security
        ]);
    }

    public function show(int $id)
    {
        $security = new Security();
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
        $carType = $roadTrip->getCarType();
        var_dump($roadTrip);
        $checkpoints = $roadTrip->getCheckpoints();

        $escapedTitle = $security->escape($roadTrip->getTitle(), true);
        $roadTrip->setTitle($escapedTitle);

         return $this->renderView('roadtrip/show.php', [
            'seo' => [
                'title' => $roadTrip->getTitle(),
            ],
            'roadtrip' => $roadTrip,
            'carTypeName' => $carType->getName(),
            'checkpoints' => $checkpoints,
            'security' => $security
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
            $userManager = new UserManager();
            $roadTrip->setTitle($_POST['titleRoadTrip']);
            $roadTrip->setCarType($carTypeManager->find($_POST['carTypeId']));
            $roadTrip->setUser($userManager->find($_SESSION['user']['id']));

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

        $checkpointManager = new CheckpointManager();
        $checkpoint = null;
        
        if (isset($_GET['checkpoint_id'])) {
            $checkpoint_id = $_GET['checkpoint_id'];
            $checkpoint = $checkpointManager->find($checkpoint_id);
        }
        
        if (!empty($_POST)) {
            if(isset($_POST['titleRoadTrip']) && isset($_POST['carTypeId'])) {
                $roadTrip->setTitle($_POST['titleRoadTrip']);
                $roadTrip->setCarType($carTypeManager->find($_POST['carTypeId']));

        
                $roadTripManager->edit($roadTrip);
        
                // message flash (success, votre road trip a bien été modifié)
                $flash->setMessageFlash('success', 'Votre roadtrip a bien été modifié');
            }  
        
            if (isset($_POST['titleCheckpoint']) && isset($_POST['coordinates']) && isset($_POST['arrival_date']) && isset($_POST['departure_date'])) {
                if ($checkpoint === null) {
                    $checkpoint = new Checkpoint();
                }
                $checkpoint->setTitle($_POST['titleCheckpoint']);
                $checkpoint->setCoordinates($_POST['coordinates']);
                $checkpoint->setArrivalDate($_POST['arrival_date']);
                $checkpoint->setDepartureDate($_POST['departure_date']);
        
                $checkpoint->setRoadtripId($roadTrip->getId());
        
                if (isset($_GET['checkpoint_id'])) {
                    $checkpointManager->edit($checkpoint);
                } else {
                    $checkpointManager->add($checkpoint);
                }

                $roadTrip = $roadTripManager->find($id);
            }
            // return $this->redirectToRoute('roadtrips');
        }
        $checkpoints = $roadTrip->getCheckpoints($roadTrip);
        var_dump($checkpoints);
        var_dump($roadTrip);

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
                'checkpoint' => $checkpoint
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

    public function deleteCheckpoint(int $id)
{
    $authentificator = new Authentificator();
    if (!$authentificator->isConnected()) {
        return $this->redirectToRoute('connexion');
    }
    $checkpointManager = new CheckpointManager();
    $checkpoint = $checkpointManager->find($id);
    $checkpointManager->delete($checkpoint);

    return $this->redirectToRoute('');
}

}
