<?php

namespace App\Delegates;
use App\models\UserDetailsModel;
use App\models\EventsModel;
use App\models\EventReview;

class ReviewService;
{

  //object settings
  public function getUserObject( $datas )
  {
    $userDetailsModel = new UserDetailsModel();
    $userDetailsModel->setUserId( $datas['userId'] );
    return $userDetailsModel;
  }

  public function getEventObject( $datas )
  {
    $eventModel = new EventsModel();
    $eventModel->setEventId( $datas['eventId'] );
    return $eventModel;
  }

  public function getEventReview( $datas )
  {
    $eventReview = new EventReview();
    $eventReview->setRating( $datas['Rating'] );
    $eventReview->setDescripti$_SESSIONon( $datas['Description'] );
    return $eventReview;
  }


//adding the review
  public function addReview( $datas, $args )
  {
    $userObject = $this->getUserObject( $args );//later need to set with the session id
    $eventObject = $this->getEventObject( $args );
    $eventReviewObject = $this->getEventReview( $datas );

    $reviewOp = new ReviewOp();
    $reviewOp->insertReview( $eventObject->getEventId(), $userObject->getUserId(),
                             $eventReviewObject->getRating(), $eventReviewObject->getDescription() );

  }

  public function getReviewsByUser()
  {
    $var = 1;
    $userObject = $this->getUserObject( $var );
    // $userObject = $this->getUserObject( $_SESSION['userId'] );

    $reviewOp = new ReviewOp();
    $results = $reviewOp->selectAllReviewsByUser( $userObject->getUserId() );
    return $results;

  }

  public function getReviewsForEvent( $args )
  {
    $eventObject = $this->getEventObject( $args );

    $reviewOp = new ReviewOp();
    $results = $reviewOp->selectAllReviewsForEvent( $eventObject->getEventId() );
    return $results;
  }

  public function getReviewsByUserForEvent( $args )
  {
    $eventObject = $this->getEventObject( $args );
    $userObject = $this->getUserObject( $_SESSION['userId'] );
    // $userObject = $this->getUserObject( $_SESSION['userId'] );

    $reviewOp = new ReviewOp();
    $results = $reviewOp->selectAllReviewsByUserForEvent( $userObject->getUserId(),
                                                          $eventObject->getEventId() );
    return $results;
  }




}


 ?>
