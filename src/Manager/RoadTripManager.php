<?php

namespace App\Manager;

use WawTravel\Manager\AbstractManager;
use App\Entity\RoadTrip;

class RoadTripManager extends AbstractManager
{

    public function findAll($userId = null)
    {
        $roadTrips = $this->readMany(RoadTrip::class, $userId ? ['user_id' => $userId] : [], ['id' => 'DESC']);

        $carTypeManager = new CarTypeManager();
        $userManager = new UserManager();
        $checkpointManager = new CheckpointManager();

        foreach ($roadTrips as $roadTrip) {
            $carType = $carTypeManager->find($roadTrip->car_type_id);
            $roadTrip->setCarType($carType);

            $user = $userManager->find($roadTrip->user_id);
            $roadTrip->setUser($user);

            $checkpoints = $checkpointManager->findAllByRoadTripId(['road_trip_id' => $roadTrip->getId()]);
            $roadTrip->setCheckpoints($checkpoints);
        }

        return $roadTrips;
    }

    public function find(int $id)
    {
        $roadTrip = $this->readOne(RoadTrip::class, ['id' => $id]);

        $carTypeManager = new CarTypeManager();
        $carType = $carTypeManager->find($roadTrip->car_type_id);
        $roadTrip->setCarType($carType);

        $userManager = new UserManager();
        $user = $userManager->find($roadTrip->user_id);
        $roadTrip->setUser($user);

        $checkpointManager = new CheckpointManager();
        $checkpoints = $checkpointManager->findAllByRoadTripId(['road_trip_id' => $roadTrip->getId()]);
        $roadTrip->setCheckpoints($checkpoints);

        return $roadTrip;
    }

    public function add(RoadTrip $roadTrip)
    {
        $this->create(
            RoadTrip::class,
            [
                'title' => $roadTrip->getTitle(),
                'user_id' => $roadTrip->getUser()->getId(),
                'car_type_id' => $roadTrip->getCarType()->getId(),
            ],

        );
    }

    public function edit(RoadTrip $roadTrip)
    {
        $this->update(
            RoadTrip::class,
            [
                'title' => $roadTrip->getTitle(),
                'user_id' => $roadTrip->getUser()->getId(),
                'car_type_id' => $roadTrip->getCarType()->getId(),
            ],
            $roadTrip->getId(),
        );
    }

    public function delete(RoadTrip $roadTrip)
    {
        $this->remove(RoadTrip::class, $roadTrip->getId());
    }

    public function findBy(array $filters = [], array $order = [], int $limit = null, int $offset = null)
    {
        $roadTrip = $this->readMany(RoadTrip::class, $filters, $order, $limit, $offset);
        return $roadTrip[0]->getId();
    }
}
