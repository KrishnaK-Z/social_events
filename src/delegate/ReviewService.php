<?php

namespace App\delegate;
use App\model\Users as UsersModel;
use App\model\Events as EventsModel;
use App\model\EventReview as EventReviewModel;

class EventReview;
{

  //object settings
  public function getUserObject( $datas )
  {
    $usersModel = new UsersModel();
    $usersModel->setUserId( $datas['userId'] );
    return $usersModel;
  }

  public function getEventObject( $datas )
  {
    $eventModel = new EventsModel();
    $eventModel->setEventId( $datas['eventId'] );
    return $eventModel;
  }

  public function getEventReview( $datas )
  {
    $eventReviewModel = new EventReviewModel();
    $eventReviewModel->setRating( $datas['Rating'] );
    $eventReviewModel->setDescripti$_SESSIONon( $datas['Description'] );
    return $eventReviewModel;
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

//select all the reviews by a user
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
    $var = 1;
    $eventObject = $this->getEventObject( $args );
    $userObject = $this->getUserObject( $var );
    // $userObject = $this->getUserObject( $_SESSION['userId'] );

    $reviewOp = new ReviewOp();
    $results = $reviewOp->selectAllReviewsByUserForEvent( $userObject->getUserId(),
                                                          $eventObject->getEventId() );
    return $results;
  }




}


 ?>
