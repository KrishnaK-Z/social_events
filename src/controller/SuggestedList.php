<?php

namespace App\controller;

use App\delegate\Suggestion;
use App\utils\DB_Logger;

class SuggestedList
{

  private $suggestion, $logger;

  public function __construct(){
    $this->suggestion = new Suggestion();
    $this->logger = new DB_Logger();
  }



  public function loadSuggestions( $request, $response, $args )
  {
    $results = $this->suggestion->loadSuggestedList();
    return $response->withJson($results);
  }

  public function loadNewEvents( $request, $response, $args )
  {
    $results = $this->suggestion->loadEventsList();
    return $response->withJson($results);
  }



  public function updateSuggestions( $request, $response, $args )
  {
    $results = $this->suggestion->updateSuggestNotify();
    return $response->withJson($results);
  }



  public function updateNewEventsNotfy( $request, $response, $args )
  {
    $results = $this->suggestion->updateEventNotfy();
    return $response->withJson($results);
  }




}


 ?>
