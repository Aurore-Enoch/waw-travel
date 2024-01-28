<?php
namespace App\Entity;

use App\Entity\CarType;
use App\Entity\User;
use App\Entity\Checkpoint;
use App\Manager\CarTypeManager;
use App\Manager\CheckpointManager;

#[\AllowDynamicProperties]
class RoadTrip {

	private ?int $id;
	private ?string $title;
    private ?CarType $carType;
    private ?User $user;
    private array $checkpoints = [];


	public function getId(): ?int {
		return $this->id;
	}

	public function getTitle(): ?string {
		return $this->title;
	}
	public function setTitle(?string $title): void {
		$this->title = $title;
	}

    public function getCarType(): ?CarType {
        return $this->carType;
    }

    public function setCarType(CarType $carType): self {
        $this->carType = $carType;
        return $this;
    }

    public function getUser(): ?User {
        return $this->user;
    }

    public function setUser(User $user): self {
        $this->user = $user;
        return $this;
    }

    public function getCheckpoints(): array {
        usort($this->checkpoints, function($a, $b) {
            return $a->getOrderNumber() <=> $b->getOrderNumber();
        });
        return $this->checkpoints;
    }
    public function getFirstCheckpoint(): ?Checkpoint {
        usort($this->checkpoints, function($a, $b) {
            return $a->getOrderNumber() <=> $b->getOrderNumber();
        });
        
        return (!empty($this->checkpoints)) ? $this->checkpoints[0] : null;

    }
    public function getLastCheckpoint(): ?Checkpoint {
        usort($this->checkpoints, function($a, $b) {
            return $a->getOrderNumber() <=> $b->getOrderNumber();
        });
        return (!empty($this->checkpoints)) ? $this->checkpoints[count($this->checkpoints) - 1] : null;
    }

    public function setCheckpoints(array $checkpoints): self {
        $this->checkpoints = $checkpoints;
        return $this;
    }                                                                                                                                                                                                                                                                                                                       
}                                                                                                                                                                                                                                                                                                                           