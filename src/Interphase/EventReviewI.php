<?php

namespace App\Interphase;

interface EventReviewI
{
  public function setErId( $erId );

  public function getErId();

  public function setRating( $rating );

  public function getRating();

  public function setDescription( $description );

  public function getDescription();

}

 ?>
