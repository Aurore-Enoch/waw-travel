<?php
namespace App\Entity;

use DateTime;
#[\AllowDynamicProperties]
class Checkpoint {

	private ?int $id;
	private ?string $title;
	private ?string $coordinates;
	private ?string $arrival_date;
	private ?string $departure_date;
	private ?int $order_number;   
	private ?int $road_trip_id; 

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
	
	public function getArrivalDate(): ?string {
		return $this->arrival_date;
	}
	public function setArrivalDate(?string $arrival_date): void {
		$this->arrival_date = $arrival_date;
	}

	public function getDepartureDate(): ?string {
		return $this->departure_date;
	}
	public function setDepartureDate(?string $departure_date): void {
		$this->departure_date = $departure_date;
	}

	public function getRoadTripId(): ?int {
		return $this->road_trip_id;
	}

	public function setRoadTripId(?int $road_trip_id): void {
		$this->road_trip_id = $road_trip_id;
	}

	public function getOrderNumber(): ?int {
		return $this->order_number;
	}

	public function setOrderNumber(?int $order_number): void {
		$this->order_number = $order_number;
	}

}