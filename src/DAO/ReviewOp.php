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

  public function selectAllReviewsByUser( $userId )
  {
    $selector = "*";
    $wherePhrase = array( "review_by"=> $userId );
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

  public function selectAllReviewsForEvent( $eventId )
  {
    $selector = "*";
    $wherePhrase = array( "event_id" => $eventId );
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

  public function selectAllReviewsByUserForEvent( $userId, $eventId )
  {
    $selector = "*";
    $wherePhrase = array( "user_id"=>$userId, "event_id"=>$eventId );
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

}


 ?>
