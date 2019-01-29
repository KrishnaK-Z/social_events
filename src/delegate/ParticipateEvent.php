<?php

 namespace App\delegate;

 use App\model\Users as UsersModel;
 use App\model\Events as EventsModel;
 use App\model\EventCategory as EventCatModel;
 use App\model\AddressDetails as AddressModel;

 use App\DAO\UsersDao;
 use App\DAO\EventsDao;
 use App\DAO\EventsParticipation;


 class ParticipateEvent
 {

   public function getUserObject( $datas )
   {
     $usersModel = new UsersModel();
     $usersModel->setUserId($datas['userId']);
     return $usersModel;
   }

   public function getEventObject( $datas )
   {
     $eventsModel = new EventsModel;
     $eventsModel->setEventId($datas['eventId']);
     return $eventsModel;
   }

   public function participateInEvent( $datas )
   {
     $eventObject = $this->getEventObject( $datas );
     $userObject = $this->getUserObject( $datas );

     $eventsDao = new EventsDao();
     //getting the total number of spots from the events table
     $totalSpots = $eventsDao->getEventSpots( $eventObject->getEventId() )[0]['spots'];

     //getting the booked spots from the participation table
     $eventsParticipation = new EventsParticipation();
     $bookedSpots = $eventsParticipation->getParticipatedSpots( $eventObject->getEventId() )[0]['booked_spots'];

     $availableSpots = $totalSpots - $bookedSpots;
     //checking the exsistence of the participation of the user
     if(!$eventsParticipation->searchExsistence( $userObject->getUserId(), $eventObject->getEventId() ) )
     {
       //checking if the spots available
       if($availableSpots > 0)
       {
         //inserting into the participation table
         $eventsParticipation->participate( $userObject->getUserId(), $eventObject->getEventId() );
         return 1;
       }
       else {
         return 0;
       }
     }

     return 0;

   }

 }

 ?>