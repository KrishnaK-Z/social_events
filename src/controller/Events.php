<?php
namespace App\controller;

use App\delegate\Events as EventsDelegate;
use App\delegate\ParticipateEvent;
use App\delegate\Suggestion;

class Events extends BaseController
{

//use add the event they are hosting here
  public function addEvents($request, $response, $args)
  {
    $eventsDelegate = new EventsDelegate();
    $datas = $request->getParsedBody();
    $results = $eventsDelegate->addEvents($datas);
    $this->c->logger->info("New Event Added by " . " " . $_SESSION['userId'] );
    return $response->withJson($results);
  }

  public function showAllEventsPage($request, $response, $args)
  {
    $eventsDelegate = new EventsDelegate();
    $results = $eventsDelegate->showAllEventsDetails();
    return $response->withJson($results);
  }

  public function joinEvent( $request, $response, $args )
  {
    $participateEvents = new ParticipateEvent();
    $participateResponse = $participateEvents->participateInEvent($args);
    return $response->withJson($participateResponse);
  }

  public function suggestEvent( $request, $response, $args )
  {
    $suggestion = new Suggestion();
    $results = $suggestion->suggestionRequest($args);
    return $response->withJson($results);
  }

}

 ?>
