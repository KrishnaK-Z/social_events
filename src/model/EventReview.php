<?php

namespace App\model;

use App\abstracts\EventReview as EventReviewAbs;

class EventReview implements EventReviewAbs
{
  public $rating;
  public $description;
  public $eventReviewId;

  public function setEventReviewId( $eventReviewId ){
    $this->eventReviewId = $eventReviewId;
  }

  public function getEventReviewId(){
    return $this->erId;
  }

  public function setRating( $rating ){
    $this->rating = $rating;
  }

  public function getRating(){
    return $this->rating;
  }

  public function setDescription( $description ){
    $this->description = $description;
  }

  public function getDescription(){
    return $this->description;
  }

}

 ?>
