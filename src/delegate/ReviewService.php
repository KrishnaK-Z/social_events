<?php

namespace App\delegate;
use App\DAO\ReviewOp;

class EventReview extends BaseDelegate;
{

//adding the review
  public function addReview( $datas, $args )
  {
    $userObject = $this->helper->getUserObject( $args );//later need to set with the session id
    $eventObject = $this->helper->getEventObject( $args );
    $eventReviewObject = $this->helper->getEventReview( $datas );

    $reviewOp = new ReviewOp();
    $reviewOp->insertReview( $eventObject->getEventId(), $userObject->getUserId(),
                             $eventReviewObject->getRating(), $eventReviewObject->getDescription() );
  }

//select all the reviews by a user
  public function getReviewsByUser()
  {
    $var = 1;
    $userObject = $this->helper->getUserObject( $var );
    // $userObject = $this->getUserObject( $_SESSION['userId'] );

    $reviewOp = new ReviewOp();
    $results = $reviewOp->selectAllReviewsByUser( $userObject->getUserId() );
    return $results;

  }

  public function getReviewsForEvent( $args )
  {
    $eventObject = $this->helper->getEventObject( $args );

    $reviewOp = new ReviewOp();
    $results = $reviewOp->selectAllReviewsForEvent( $eventObject->getEventId() );
    return $results;
  }

  public function getReviewsByUserForEvent( $args )
  {
    $var = 1;
    $eventObject = $this->helper->getEventObject( $args );
    $userObject = $this->helper->getUserObject( $var );

    $reviewOp = new ReviewOp();
    $results = $reviewOp->selectAllReviewsByUserForEvent( $userObject->getUserId(),
                                                          $eventObject->getEventId() );
    return $results;
  }




}


 ?>
