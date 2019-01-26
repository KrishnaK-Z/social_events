<?php
 namespace App\DAO;
 use App\utils\DbConnect;

 class EventsParticipation extends DbConnect
 {
   public $tableName = "participation";

   public function getParticipatedSpots($eventId)
   {
     $sql = "select count(user_id) as booked_spots from participation where event_id = " . $eventId;
     $results = parent::hardCodeSelect($sql);
     return $results;
   }

   public function participate( $userId, $eventId )
   {
     $columns = array( 'user_id', 'event_id' );
     $values = array('user_id' => $userId, 'event_id' => $eventId);
     parent::insert($this->tableName, $columns, $values);
   }

   public function searchExsistence( $userId, $eventId )
   {
     $selector = "participation_id";
     $wherePhrase = array('user_id' => $userId, "event_id" => $eventId);
     $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
     return $results;
   }

 }

 ?>
