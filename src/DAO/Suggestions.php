<?php

namespace App\DAO;
use App\utils\DbConnect;

class Suggestions extends DbConnect
{
  public $tableName = "suggested";

  public function checkSuggExsistence( $suggestedBy, $suggestedTo, $suggestedEvent )
  {
    $selector = "suggested_id";
    $wherePhrase = array('suggested_by' => $suggestedBy, 'suggested_to' => $suggestedTo, 'event_id' => $suggestedEvent );
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

  public function suggestedEvent( $suggestedBy, $suggestedTo, $suggestedEvent )
  {
    $columns = array( 'suggested_by', 'suggested_to', 'event_id');
    $values = array('suggested_by' => $suggestedBy, 'suggested_to' => $suggestedTo,
                    'event_id' => $suggestedEvent );
    parent::insert($this->tableName, $columns, $values);
  }

  public function getTotalSuggestedList( $suggestedTo )
  {
    $selector = "count(suggested_to) as suggestion_count";
    $wherePhrase = array( 'suggested_to' => $suggestedTo );
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

}

 ?>
