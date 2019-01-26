<?php

namespace App\Delegates;
use App\models\EventsModel;
use App\DAO\EventsDao;
use App\DAO\AddressDao;

class EventsDelegates
{

  protected function getEventObject($datas)
  {
    $eventsModel = new EventsModel;
    $eventsModel->setEventName($datas['eventName']);
    $eventsModel->setCategoryType($datas['eventCategory']);
    $eventsModel->setUserId($_SESSION['userId']);
    $eventsModel->setEventDate($datas['eventDate']);
    $eventsModel->setStartTime($datas['startTime']);
    $eventsModel->setEndTime($datas['endTime']);
    $eventsModel->setStreetAddress($datas['streetAddress']);
    $eventsModel->setArea($datas['area']);
    $eventsModel->setPincode($datas['pincode']);
    $eventsModel->setSpots($datas['spots']);
    return $eventsModel;
  }

  public function addEvents($datas)
  {

    $eventObject = $this->getEventObject($datas);
    $eventsDao = new EventsDao();

    $eventObject->setCategoryId( $eventsDao->getEventCategoryId($eventObject->getCategoryType())[0]['event_category_id'] );

    $addressDao = new AddressDao();

    if( !$addressDao->getAddressId( $eventObject->getStreetAddress(), $eventObject->getArea(), $eventObject->getPincode()) )
    {
      // die();
      $addressDao->insertAddressDetails( $eventObject->getStreetAddress(), $eventObject->getArea(), $eventObject->getPincode() );
    }

    $eventObject->setAddressId( $addressDao->getAddressId( $eventObject->getStreetAddress(), $eventObject->getArea(),
                                                           $eventObject->getPincode())[0]['address_id'] );
    
    $eventsDao->insertEventDetails( $eventObject->getEventName(), $eventObject->getCategoryId(), $eventObject->getUserId(),
                                    $eventObject->getEventDate(), $eventObject->getStartTime(), $eventObject->getEndTime(),
                                    $eventObject->getSpots(), $eventObject->getAddressId());
  }

}
 ?>
