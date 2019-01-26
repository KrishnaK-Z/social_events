<?php

namespace App\controllers;

use App\Delegates\Suggestion;

class SuggestedList extends BaseController
{
  public function loadSuggestions( $request, $response, $args )
  {
    $suggestion = new Suggestion();
    $results = $suggestion->loadSuggestedList();
    return $response->withJson($results);
  }

  public function loadNewEvents( $request, $response, $args )
  {
    $suggestion = new Suggestion();
    $results = $suggestion->loadEventsList();
    return $response->withJson($results);
  }

  public function updateSuggestions( $request, $response, $args )
  {
    $suggestion = new Suggestion();
    $results = $suggestion->updateSuggestNotify();
    return $response->withJson($results);
  }

  public function updateNewEventsNotfy( $request, $response, $args )
  {
    $suggestion = new Suggestion();
    $results = $suggestion->updateEventNotfy();
    return $response->withJson($results);
  }


}


 ?>
