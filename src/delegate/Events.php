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

  //addin the events
  public function addEvents( $datas )
  {

    $userObject = $this->getUserObject( $datas );
    $eventObject = $this->getEventObject( $datas );
    $categoryObject = $this->getEventCategoryObject( $datas );

    $eventsDao = new EventsDao();

    $categoryObject->setCategoryId( $eventsDao->getEventCategoryId($categoryObject->getCategoryType())[0]['event_category_id'] );



    $address = new Address( $datas );

    if(!$address->getAddressId())
    $address->addAddressDetails();


    $eventsDao->insertEventDetails( $eventObject->getEventName(), $categoryObject->getCategoryId(), $userObject->getUserId(),
                                    $eventObject->getEventDate(), $eventObject->getStartTime(), $eventObject->getEndTime(),
                                    $eventObject->getSpots(), $address->getAddressId() );
  }



//display all the events details
  public function showAllEventsDetails()
  {
    $eventsDao = new EventsDao();
    return $eventsDao->showAllEventsDetails();
  }



}
 ?>
