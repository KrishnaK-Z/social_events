<?php

namespace App\delegate;

use App\model\Users as UsersModel;
use App\model\AddressDetails as AddressModel;
use App\model\Events as EventsModel;
use App\model\EventCategory as EventCatModel;
use App\model\EventReview as EventReviewModel;
use App\model\Roles as RolesModel;

class Helper
{

  public $usersModel, $addressModel, $eventsModel,
         $eventReviewModel, $eventCatModel, $rolesModel;

  public function __construct(){
    $this->usersModel = new UsersModel();
    $this->addressModel = new AddressModel();
    $this->eventsModel = new EventsModel();
    $this->eventReviewModel = new EventReviewModel();
    $this->eventCatModel = new EventCatModel();
    $this->rolesModel = new RolesModel();
  }

  public function getUserObject( $datas )
  {
    $this->usersModel->setUserId( $datas['userId'] );  //change into the session id in the future reference.
    $this->usersModel->setUserName( $datas['userName'] );
    $this->usersModel->setUserEmail( $datas['userEmail'] );
    $this->usersModel->setUserPassword( $datas['password'] );
    $this->usersModel->setProfilePics( $datas['profilePic'] );
    $this->usersModel->setPhoneNumber( $datas['phonenumber'] );
    $this->usersModel->setOrganisationWebsite( $datas['organisationWebsite'] );
    return $this->usersModel;
  }

  public function getEventObject( $datas )
  {
    $this->eventsModel->setEventName( $datas['eventName'] );
    $this->eventsModel->setEventDate( $datas['eventDate'] );
    $this->eventsModel->setStartTime( $datas['startTime'] );
    $this->eventsModel->setEndTime( $datas['endTime'] );
    $this->eventsModel->setSpots( $datas['spots'] );
    return $this->eventsModel;
  }

  public function getEventReview( $datas )
  {
    $this->eventReviewModel->setRating( $datas['Rating'] );
    $this->eventReviewModel->setDescription( $datas['Description'] );
    return $this->eventReviewModel;
  }

  public function getRolesObject( $datas )
  {
    $this->rolesModel->setRoleType( $datas['roleType'] );
    return $this->rolesModel;
  }

}


 ?>
