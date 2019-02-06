<?php
  namespace App\DAO;
  use App\utils\DbConnect;

  class EventsDao extends DbConnect
  {
    public $tableName = 'events';
    public $categoryId;

    public function getEventById($eventId){
      $selector = "event_id, event_name";
      $wherePhrase = array('event_id' => $eventId);
      $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
      return $results;
    }

    public function getEventCategoryId($categoryType)
    {
      $selector = "event_category_id";
      $wherePhrase = array('event_category_name' => $categoryType);
      $results = parent::selectBy("event_category", $wherePhrase, $selector);
      return $results;
    }

    public function insertEventDetails($eventName, $categoryId, $coordinatorId, $eventDate, $startTime,
                                       $endTime, $spots, $addressId)
    {
      $columns = array('event_name', 'event_category_id', 'coordinator_id', 'event_date', 'start_time', 'end_time', 'spots', 'address_id');
      $values = array('event_name' => $eventName, 'event_category_id' => $categoryId,
                      'coordinator_id' => $coordinatorId, 'event_date' => $eventDate,
                      'start_time' => $startTime, 'end_time' => $endTime,
                      'spots' => $spots, 'address_id' => $addressId);
      parent::insert($this->tableName, $columns, $values);

    }

    public function showAllEventsDetails($userId)
    {
      $results = parent::hardCodeSelect("select events.event_id, events.event_name,events.spots,event_category.event_category_id,event_category.event_category_name,events.start_time,events.event_date,events.end_time, users.user_name,address_details.street_address, address_details.area, address_details.pincode,participation.participation_id from events inner join address_details on events.address_id = address_details.address_id inner join event_category on events.event_category_id = event_category.event_category_id inner join users on users.user_id = events.coordinator_id left join participation on participation.user_id = ".$userId."
and participation.event_id = events.event_id");
      return $results;
    }

    public function getEventSpots($eventId)
    {
      $selector = "spots";
      $wherePhrase = array('event_id' => $eventId);
      $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
      return $results;
    }

    public function getTotalEventsList()
    {
      $selector = "count(event_id) as events_count";
      $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
      return $results;
    }

    // public function eventsSearch( $select, $value ){
    //   $results = parent::hardCodeSelect("select * from events inner join address_details on events.address_id = address_details.address_id
    //                                 inner join event_category on events.event_category_id = event_category.event_category_id
    //                                 inner join users on users.user_id = events.coordinator_id where ".$select." = '".$value."'");
    //   return $results;
    // }

    public function eventByUserId( $coordinatorId ){
      $results = parent::hardCodeSelect("select * from events inner join address_details on events.address_id = address_details.address_id
                                    inner join event_category on events.event_category_id = event_category.event_category_id
                                    inner join users on users.user_id = events.coordinator_id where events.coordinator_id = ".$coordinatorId);
      return $results;
    }

  }


 ?>
