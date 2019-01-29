<?php

namespace App\abstracts;

interface Events
{
  
  public function getEventId();

  public function setEventId($eventId);

  public function getEventName();

  public function setEventName($eventName);

  public function getEventDate();

  public function setEventDate($eventDate);

  public function getStartTime();

  public function setStartTime($startTime);

  public function getEndTime();

  public function setEndTime($endTime);

  public function setUserId($userId);

  public function getUserId();

  public function setSpots($eventSpots);

  public function getSpots();


}


 ?>
