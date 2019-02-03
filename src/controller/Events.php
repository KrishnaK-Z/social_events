<?php
namespace App\controller;

use App\delegate\Events as EventsDelegate;
use App\delegate\ParticipateEvent;
use App\delegate\Suggestion;
use App\utils\DB_Logger;

class Events
{

  private $eventsDelegate, $participateEvents, $suggestion, $logger;

  public function __construct(){
    $this->eventsDelegate = new EventsDelegate();
    $this->participateEvents = new ParticipateEvent();
    $this->suggestion = new Suggestion();
    $this->logger = new DB_Logger();
  }



//use add the event they are hosting here
  public function addEvents($request, $response, $args)
  {
    $datas = $request->getParsedBody();
    $results = $this->eventsDelegate->addEvents($datas);
    $this->logger->log("info","New Event Added by " . " " . $_SESSION['userId'] );
    return $response->withJson($results);
  }



  public function showAllEventsPage($request, $response, $args)
  {
    $results = $this->eventsDelegate->showAllEventsDetails();
    return $response->withJson($results);
  }



  public function joinEvent( $request, $response, $args )
  {
    $participateResponse = $this->participateEvents->participateInEvent($args);
    return $response->withJson($participateResponse);
  }



  public function suggestEvent( $request, $response, $args )
  {
    $results = $this->uggestion->suggestionRequest($args);
    return $response->withJson($results);
  }



}

 ?>
