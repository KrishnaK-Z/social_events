<?php

namespace App\delegate;

use App\DAO\EventsDao;
use App\DAO\AddressDao;

class Events extends BaseDelegate
{

  //addin the events
  public function addEvents( $datas )
  {
    $userObject = $this->helper->getUserObject( $datas );
    $eventObject = $this->helper->getEventObject( $datas );
    $categoryObject = $this->helper->getEventCategoryObject( $datas );
    $eventsDao = new EventsDao();
    
    $categoryObject->setEventCategoryId( $eventsDao->getEventCategoryId($categoryObject->getEventCategoryName())[0]['event_category_id'] );



    $address = new Address( $datas );

    if(!$address->getAddressId())
    $address->addAddressDetails();


    $eventsDao->insertEventDetails( $eventObject->getEventName(), $categoryObject->getEventCategoryId(), $userObject->getUserId(),
                                    $eventObject->getEventDate(), $eventObject->getStartTime(), $eventObject->getEndTime(),
                                    $eventObject->getSpots(), $address->getAddressId() );
  }



//display all the events details
  public function showAllEventsDetails()
  {
    $eventsDao = new EventsDao();
    return $eventsDao->showAllEventsDetails();
  }


  public function filterEvent($filter, $value){
    $eventsDao = new EventsDao();
    return $eventsDao->eventsSearch( $filter, $value );
  }


  public function getNewEvents( $datas ){
    $eventsDao = new EventsDao();
    $newEventLists = [];
    foreach( $datas as $data ){
      array_push($newEventLists, $eventsDao->getEventById($data));
    }
    return $newEventLists;
  }

}
 ?>
