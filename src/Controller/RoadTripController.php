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
            $flash = new Flash();
            $flashMessage = $flash->getMessageFlash();

        $security = new Security();
        $roadTripManager = new RoadTripManager();
        $userId = $_SESSION['user']['id'];

        $escapedRoadTrips = $security->escape($roadTripManager->findAll($userId), true);

        return $this->renderView('roadtrip/list.php', [
            'seo' => [
                'title' => 'Liste des road trips',
            ],
            'roadtrips' => $escapedRoadTrips,
            'message' => $flashMessage['message'] ?? null,
            'color' => $flashMessage['color'] ?? 'primary',
        ]);
    }

    public function show(int $id)
    {
        $security = new Security();
        $roadTripManager = new RoadTripManager();
        $roadTrip = $roadTripManager->find($id);
        $carType = $security->escape($roadTrip->getCarType(), true);
        $checkpoints =  $security->escape($roadTrip->getCheckpoints(), true);

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
        $security = new Security();
        $carTypeManager = new CarTypeManager();
        $carTypes = $carTypeManager->findAll();

        if (!$authentificator->isConnected()) {
            return $this->redirectToRoute('login');
        }
        if (!empty($_POST)) {
            if (isset($_POST['titleRoadTrip']) && isset($_POST['carTypeId']) 
            && isset($_POST['titleDepartureCheckpoint']) && isset($_POST['departureCoordinates'])
             && isset($_POST['departure_date_checkpoint_1']) && isset($_POST['arrival_date_checkpoint_1'])
            && isset($_POST['titleArrivalCheckpoint']) && isset($_POST['arrivalCoordinates']) 
            && isset($_POST['departure_date_checkpoint_2']) && isset($_POST['arrival_date_checkpoint_2'])) {
                $roadTrip = new RoadTrip();
                $roadTripManager = new RoadTripManager();
                $userManager = new UserManager();
                $roadTrip->setTitle($_POST['titleRoadTrip']);
                $roadTrip->setCarType($carTypeManager->find($_POST['carTypeId']));
                $roadTrip->setUser($userManager->find($_SESSION['user']['id']));
                $roadTripManager->add($roadTrip);

                // récupérer l'id du roadtrip
                $roadTripId = $roadTripManager->findBy(['user_id' => $_SESSION['user']['id']], ['id' => 'DESC'], 1);

                $checkpointManager = new CheckpointManager();

                // Créer departure checkpoint
                $departureCheckpoint = new Checkpoint();
                $departureCheckpoint->setTitle($security->escape($_POST['titleDepartureCheckpoint'], true));
                $departureCheckpoint->setCoordinates($security->escape($_POST['departureCoordinates'], true));
                $departureCheckpoint->setDepartureDate($security->escape($_POST['departure_date_checkpoint_1'], true));
                $departureCheckpoint->setArrivalDate($security->escape($_POST['arrival_date_checkpoint_1'], true));
                $departureCheckpoint->setOrderNumber(1);
                $departureCheckpoint->setRoadtripId($roadTripId);
                $checkpointManager->add($departureCheckpoint);


                // Créer arrival checkpoint
                $arrivalCheckpoint = new Checkpoint();
                $arrivalCheckpoint->setTitle($security->escape($_POST['titleArrivalCheckpoint'], true));
                $arrivalCheckpoint->setCoordinates($security->escape($_POST['arrivalCoordinates'], true));
                $arrivalCheckpoint->setDepartureDate($security->escape($_POST['departure_date_checkpoint_2'], true));
                $arrivalCheckpoint->setArrivalDate($security->escape($_POST['arrival_date_checkpoint_2'], true));
                $arrivalCheckpoint->setOrderNumber(2);
                $arrivalCheckpoint->setRoadtripId($roadTripId);
        
                $checkpointManager->add($arrivalCheckpoint);
                
                $flash->setMessageFlash('success', 'Votre roadtrip a bien été ajouté');
                $this->redirectToRoute('/roadtrips/{id}/editer', ['id' => $roadTripId]);
            } else {
                $flash->setMessageFlash('error', 'Erreur, votre roadtrip n\'a pas été ajouté');
            }
        }
        $flashMessage = $flash->getMessageFlash();
        return $this->renderView(
            'roadTrip/add.php',
            [
                'seo' => [
                    'title' => 'Ajouter un road trip',
                ], 'message' => $flashMessage['message'] ?? null,
                'color' => $flashMessage['color'] ?? 'primary',
                'carTypes' => $carTypes
            ]
        );
    }

    public function edit(int $id)
    {
        $authentificator = new Authentificator();
        $flash = new Flash();
        $security = new Security();
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
            if (isset($_POST['titleRoadTrip']) && isset($_POST['carTypeId'])) {
                $roadTrip->setTitle($security->escape($_POST['titleRoadTrip'], true));
                $roadTrip->setCarType($security->escape($carTypeManager->find($_POST['carTypeId'], true)));

                $roadTripManager->edit($roadTrip);

                // message flash (success, votre road trip a bien été modifié)
                $flash->setMessageFlash('success', 'Votre roadtrip a bien été modifié');
            }

            if (isset($_POST['titleCheckpoint']) && isset($_POST['coordinates']) && isset($_POST['arrival_date']) && isset($_POST['departure_date']) && isset($_POST['orderNumber'])) {
                if ($checkpoint === null) {
                    $checkpoint = new Checkpoint();
                }
                $checkpoint->setTitle($security->escape($_POST['titleCheckpoint'], true));
                $checkpoint->setCoordinates($security->escape($_POST['coordinates'], true));
                $checkpoint->setArrivalDate($security->escape($_POST['arrival_date'], true));
                $checkpoint->setDepartureDate($security->escape($_POST['departure_date'], true));
                $checkpoint->setOrderNumber($security->escape($_POST['orderNumber'], true));

                $checkpoint->setRoadtripId($roadTrip->getId());

                if (isset($_GET['checkpoint_id'])) {
                    $checkpointManager->edit($checkpoint);
                    $flash->setMessageFlash('success', 'Votre checkpoint a bien été modifié');
                } else {
                    $checkpointManager->add($checkpoint);
                    $flash->setMessageFlash('success', 'Votre checkpoint a bien été ajouté');
                }

                $roadTrip = $roadTripManager->find($id);
            } else {
                $flash->setMessageFlash('error', 'Erreur, votre checkpoint n\'a pas été ajouté');
            }
        }
        $checkpoints = $security->escape($roadTrip->getCheckpoints($roadTrip), true);
        $flashMessage = $flash->getMessageFlash();
        return $this->renderView(
            'roadTrip/edit.php',
            [
                'seo' => [
                    'title' => 'Modifier un road trip',
                ],
                'message' => $flashMessage['message'] ?? null,
                'color' => $flashMessage['color'] ?? 'primary',
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
        $flash = new Flash();
        $flash->setMessageFlash('success', 'Votre checkpoint a bien été supprimé');
    }
}
