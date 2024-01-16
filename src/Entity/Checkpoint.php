<?php
namespace App\Entity;

use DateTime;
#[\AllowDynamicProperties]
class Checkpoint {

	private ?int $id;
	private ?string $title;
	private ?string $coordinates;
	private ?DateTime $arrival_date;
	private ?DateTime $departure_date;
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
		return $this->arrival_date;
	}
	public function setArrivalDate(?DateTime $arrival_date): void {
		$this->arrival_date = $arrival_date;
	}

	public function getDepartureDate(): ?DateTime {
		return $this->departure_date;
	}
	public function setDepartureDate(?DateTime $departure_date): void {
		$this->departure_date = $departure_date;
	}

	public function getRoadTripId(): ?int {
		return $this->road_trip_id;
	}

	public function setRoadTripId(?int $road_trip_id): void {
		$this->road_trip_id = $road_trip_id;
	}

}