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
    $eventReview->setDescription( $datas['Description'] );
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
    
  }


}


 ?>
