<?php

namespace App\DAO;
use App\utils\DbConnect;

class SuggestionsNotification extends DbConnect
{

  public $tableName = "suggestions_notifications";


  public function initializeSuggNotification( $userId )
  {
    $zero = 0;
    $columns = array('user_id', 'suggest_count', 'event_count');
    $values = array('user_id' => $userId, 'suggest_count' => $zero, 'event_count' => $zero);
    parent::insert($this->tableName, $columns, $values);
  }

  public function lastSeenSuggestions( $userId )
  {
    $selector = "*";
    $wherePhrase = array('user_id' => $userId);
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }


  public function updateCurrentCount( $values ,$wherePhrase )
  {
    parent::update( $this->tableName, $values, $wherePhrase );
  }


}


 ?>
