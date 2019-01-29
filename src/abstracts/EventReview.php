<?php

namespace App\abstracts;

interface EventReview
{
  public function setEventReviewId( $eventReviewId );

  public function getEventReviewId();

  public function setRating( $rating );

  public function getRating();

  public function setDescription( $description );

  public function getDescription();

}

 ?>
