<?php

namespace App\DAO;
use App\utils\DbConnect;


class ReviewOp extends DbConnect
{
  public tableName = "event_review";

  public function insertReview( $eventId, $userId, $rating, $description )
  {
    $columns = array( 'event_id', 'review_by', 'rating', 'description' );
    $values = array('event_id' => $userId, 'review_by' => $userId, 'rating' => $rating, '$description' => $description);
    parent::insert( $this->tableName, $columns, $values );
  }

}


 ?>
