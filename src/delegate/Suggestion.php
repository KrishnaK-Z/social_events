<?php

namespace App\delegate;
use App\model\Users as UsersModel;
use App\model\Events as EventsModel;
use App\DAO\Suggestions;
use App\DAO\SuggestionsNotification;
use App\DAO\EventsDao;

class Suggestion
{

  public function getSuggestedBy($userId)
  {
    $usersModel = new UsersModel();
    $usersModel->setUserId($userId);
    return $usersModel;
  }

  public function getSuggestedTo($data)
  {
    $usersModel = new UsersModel();
    $usersModel->setUserId($data);
    return $usersModel;
  }

  public function getSuggestedEvent($data)
  {
    $eventsModel = new EventsModel();
    $eventsModel->setEventId($data);
    return $eventsModel;
  }


//send the suggestions list to the user
  public function suggestionRequest($datas)
  {
    //sample input
    $user = 2;
    // $suggestedBy = $this->getSuggestedBy($user);
    $suggestedBy = $this->getSuggestedBy($_SESSION['userId']);

    $suggestedTo = $this->getSuggestedTo( $datas['suggestedToUserId'] );
    $suggestedEvent = $this->getSuggestedEvent( $datas['eventId'] );

    //using the Suggestions DAO
    $suggestions = new Suggestions();

    //check if a user already suggested a particular event to a particular user
    if( $suggestions->checkSuggExsistence( $suggestedBy->getUserId(), $suggestedTo->getUserId(), $suggestedEvent->getEventId() ) )
    {
      return false;
    }
    else {
      $suggestions->suggestedEvent( $suggestedBy->getUserId(), $suggestedTo->getUserId(), $suggestedEvent->getEventId() );
      return true;
    }
  }

//getting the suggestion list from the database and show notification if any new suggestions
  public function loadSuggestedList()
  {
    // $var = 1;
    session_start();
    $suggestedTo = $this->getSuggestedTo( $_SESSION['userId'] );

    $suggestionsNotification = new SuggestionsNotification();
    if( !$suggestionsNotification->lastSeenSuggestions( $suggestedTo->getUserId() ) )
    {
      $suggestionsNotification->initializeSuggNotification( $suggestedTo->getUserId() );
    }
    //getting the suggestion count from the suggestions_notifications table
    $lastSeenSugCount = $suggestionsNotification->lastSeenSuggestions( $suggestedTo->getUserId() )[0]['suggest_count'];

    //getting the suggestion count from the suggestion table
    $suggestions = new Suggestions();
    $suggestionTotalCount = $suggestions->getTotalSuggestedList( $suggestedTo->getUserId() )[0]['suggestion_count'];
    if( $lastSeenSugCount < $suggestionTotalCount )
    {
      return ( $suggestionTotalCount-$lastSeenSugCount );
    }
    else {
      return 0;
    }

  }

  public function loadEventsList()
  {
    $user = 1;
    $userObject = $this->getSuggestedBy($user);
    // $userId = $this->getSuggestedBy( $_SESSION['userId'] );
    $suggestionsNotification = new SuggestionsNotification();
    if( !$suggestionsNotification->lastSeenSuggestions( $userObject->getUserId() ) )
    {
      $suggestionsNotification->initializeSuggNotification( $userObject->getUserId() );
    }
    $lastSeenEventsCount = $suggestionsNotification->lastSeenSuggestions( $userObject->getUserId() )[0]['event_count'];

    $eventsDao = new EventsDao();
    $eventTotalCount = $eventsDao->getTotalEventsList()[0]['events_count'];

    if( $lastSeenEventsCount < $eventTotalCount )
    {
      return ( $eventTotalCount-$lastSeenEventsCount );
    }
    else {
      return 0;
    }

  }

  public function updateSuggestNotify()
  {
    $user = 1;
    $userObject = $this->getSuggestedTo($user);
    // $userId = $this->getSuggestedBy( $_SESSION['userId'] );
    $suggestions = new Suggestions();
    $suggestionTotalCount = $suggestions->getTotalSuggestedList( $userObject->getUserId() )[0]['suggestion_count'];

    $suggestionsNotification = new SuggestionsNotification();
    $suggestionsNotification->updateCurrentCount( array( 'suggest_count' => $suggestions->getTotalSuggestedList( $userObject->getUserId() )[0]['suggestion_count'] ) ,
                        array('user_id' => $userObject->getUserId()) );
    return array("message" => "updated  ");
  }

  public function updateEventNotfy()
  {
    $user = 1;
    $userObject = $this->getSuggestedTo($user);
    // $userId = $this->getSuggestedBy( $_SESSION['userId'] );
    $eventsDao = new EventsDao();
    $suggestionsNotification = new SuggestionsNotification();
    $suggestionsNotification->updateCurrentCount( array( 'event_count' => $eventsDao->getTotalEventsList()[0]['events_count'] ) ,
                        array('user_id' => $userObject->getUserId()) );

    return array("message" => "updated  ");
  }


}


 ?>
