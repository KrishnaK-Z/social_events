<?php

namespace App\controllers;

use App\Delegates\Suggestion;

class SuggestedList extends BaseController
{

  private $suggestion;

  public function __construct(){
    parent::__construct();
    $this->uggestion = new Suggestion();
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
