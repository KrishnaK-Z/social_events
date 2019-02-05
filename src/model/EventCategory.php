<?php

namespace App\model;

use App\abstracts\EventCategory as EventCatAbs;

class EventCategory implements EventCatAbs
{

  public $eventCategoryId;
  public $eventCategoryName;

  public function getEventCategoryId(){
    return $this->eventCategoryId;
  }

  public function setEventCategoryId($eventCategoryId){
    $this->eventCategoryId = $eventCategoryId;
  }

  public function getEventCategoryName(){
    return $this->eventCategoryName;
  }

  public function setEventCategoryName($eventCategoryName){
    $this->eventCategoryName = $eventCategoryName;
  }

}

 ?>
