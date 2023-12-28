<?php
namespace App\Entity;

use DateTime;
#[\AllowDynamicProperties]
class Checkpoint {

	private ?int $id;
	private ?string $title;
	private ?string $coordinates;
	private ?DateTime $arrivalDate;
	private ?DateTime $departureDate;
	private $road_trip_id;
    

	public function getId(): ?int {
		return $this->id;
	}

	public function getTitle(): ?string {
		return $this->title;
	}
	public function setTitle(?string $title): void {
		$this->title = $title;
	}

	public function getCoordinates(): ?string {
		return $this->coordinates;
	}
	public function setCoordinates(?string $coordinates): void {
		$this->coordinates = $coordinates;
	}
	
	public function getArrivalDate(): ?DateTime {
		return $this->arrivalDate;
	}
	public function setArrivalDate(?DateTime $arrivalDate): void {
		$this->arrivalDate = $arrivalDate;
	}

	public function getDepartureDate(): ?DateTime {
		return $this->departureDate;
	}
	public function setDepartureDate(?DateTime $departureDate): void {
		$this->departureDate = $departureDate;
	}

	public function getRoadTripId(): ?int {
		return $this->road_trip_id;
	}

	public function setRoadTripId(?int $road_trip_id): void {
		$this->road_trip_id = $road_trip_id;
	}

}