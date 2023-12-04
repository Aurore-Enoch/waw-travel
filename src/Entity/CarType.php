<?php
namespace App\Entity;

use App\Entity\RoadTrip;

class CarType {

	private ?int $id;
	private ?string $name;
    
	public function getId(): ?int {
		return $this->id;
	}

	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name): void {
		$this->name = $name;
	}

	

		
}