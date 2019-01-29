<?php

namespace App\model;

use App\abstracts\Events as EventsAbs;

class Events implements EventsAbs
{

  public $eventId;
  public $eventName;
  public $eventDate;
  public $startTime;
  public $endTime;
  public $eventSpots;

  public function getEventId()
  {
    return $this->eventId;
  }

  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }

  public function getEventName()
  {
    return $this->eventName;
  }

  public function setEventName($eventName)
  {
    $this->eventName = $eventName;
  }

  public function getCategoryType()
  {
    return $this->categoryType;
  }

  public function setCategoryType($categoryType)
  {
    $this->categoryType = $categoryType;
  }

  public function getCategoryId()
  {
    return $this->categoryId;
  }

  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;
  }

  public function getEventDate()
  {
    return $this->eventDate;
  }

  public function setEventDate($eventDate)
  {
    $this->eventDate = $eventDate;
  }

  public function getStartTime()
  {
    return $this->startTime;
  }

  public function setStartTime($startTime)
  {
      $this->startTime = $startTime;
  }

  public function getEndTime()
  {
    return $this->endTime;
  }

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }

  public function setUserId($userId)
  {
    $this->userId = $userId;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  public function setStreetAddress($streetAddress)
  {
    $this->streetAddress = $streetAddress;
  }

  public function getStreetAddress()
  {
    return $this->streetAddress;
  }

  public function setArea($area)
  {
    $this->area = $area;
  }

  public function getArea()
  {
    return $this->area;
  }

  public function setPincode($pincode)
  {
    $this->pincode = $pincode;
  }

  public function getPincode()
  {
    return $this->pincode;
  }

  public function setAddressId($addressId)
  {
    $this->addressId = $addressId;
  }

  public function getAddressId()
  {
    return $this->addressId;
  }

  public function setSpots($eventSpots)
  {
    $this->eventSpots = $eventSpots;
  }

  public function getSpots()
  {
    return $this->eventSpots;
  }


}

 ?>
