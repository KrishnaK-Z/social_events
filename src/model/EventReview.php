<?php

use App\models;

use App\Interphase\EventReviewI;

class EventReview implements EventReviewI
{
  public $rating;

  public $description;

  public $reId;

  public function setErId( $erId ){
    $this->erId = $erTd;
  }

  public function getErId(){
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
