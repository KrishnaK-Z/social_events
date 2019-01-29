<?php

namespace App\delegate;
use App\model\Users as UsersModel;
use App\model\Events as EventsModel;
use App\model\EventCategory as EventCatModel;
use App\model\AddressDetails as AddressModel;
use App\DAO\EventsDao;
use App\DAO\AddressDao;

class Events
{

  private function getUserObject( $datas )
  {
    $usersModel = new UsersModel();
    $usersModel->setUserId( $_SESSION['userId'] );
    return $usersModel;
  }

  private function getEventObject( $datas )
  {
    $eventsModel = new EventsModel();
    $eventsModel->setEventName( $datas['eventName'] );
    $eventsModel->setEventDate( $datas['eventDate'] );
    $eventsModel->setStartTime( $datas['startTime'] );
    $eventsModel->setEndTime( $datas['endTime'] );
    $eventsModel->setSpots( $datas['spots'] );
    return $eventsModel;
  }

  private function getEventCategoryObject( $datas )
  {
    $eventCatModel = new EventCatModel();
    $eventCatModel->setCategoryType( $datas['eventCategory'] );
    return $eventCatModel;
  }

  private function getAddressObject( $datas )
  {
    $addressModel = new AddressModel();
    $addressModel->setStreetAddress( $datas['streetAddress'] );
    $addressModel->setArea( $datas['area'] );
    $addressModel->setPincode( $datas['pincode'] );
    return $addressModel;
  }

  //addin the events
  public function addEvents( $datas )
  {

    $userObject = $this->getUserObject( $datas );
    $eventObject = $this->getEventObject( $datas );
    $categoryObject = $this->getEventCategoryObject( $datas );
    $addressObject = $this->getAddressObject( $datas );

    $eventsDao = new EventsDao();

    $categoryObject->setCategoryId( $eventsDao->getEventCategoryId($categoryObject->getCategoryType())[0]['event_category_id'] );

    $addressDao = new AddressDao();

    if( !$addressDao->getAddressId( $addressObject->getStreetAddress(), $addressObject->getArea(), $addressObject->getPincode()) )
    {
      $addressDao->insertAddressDetails( $addressObject->getStreetAddress(), $addressObject->getArea(), $addressObject->getPincode() );
    }

    $addressObject->setAddressId( $addressDao->getAddressId( $addressObject->getStreetAddress(), $addressObject->getArea(),
                                                           $addressObject->getPincode())[0]['address_id'] );

    $eventsDao->insertEventDetails( $eventObject->getEventName(), $categoryObject->getCategoryId(), $userObject->getUserId(),
                                    $eventObject->getEventDate(), $eventObject->getStartTime(), $eventObject->getEndTime(),
                                    $eventObject->getSpots(), $addressObject->getAddressId());
  }



//display all the events details 
  public function showAllEventsDetails()
  {
    $eventsDao = new EventsDao();
    return $eventsDao->showAllEventsDetails();
  }



}
 ?>
