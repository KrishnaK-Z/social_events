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
    session_start();
    $datas['userId'] = $_SESSION['userId'];
    $results = $this->eventsDelegate->addEvents($datas);
    $this->logger->log("info","New Event Added by " . " " . $_SESSION['userId'] );
    return $response->withJson($results);
  }

  public function showNewEvents($request, $response, $args){
    $datas = $request->getParsedBody();//array
    $results = $this->eventsDelegate->getNewEvents( $datas );
    return $response->withJson($results);
  }

  public function showAllEventsPage($request, $response, $args)
  {
    $results;
    // search by area date rating participation hosted by
    if( isset($_GET['name']) ){
      $result = $this->eventsDelegate->filterEvent("event_name", $_GET['name']);
    }
    else if( isset($_GET['date']) ){
      $result = $this->eventsDelegate->filterEvent("event_date", $_GET['date']);
    }
    else if( isset($_GET['area']) ){
      $result = $this->eventsDelegate->filterEvent("area", $_GET['area']);
    }
    else {
      $results = $this->eventsDelegate->showAllEventsDetails( $args['userId'] );
    }
    return $response->withJson($results);
  }



  public function joinEvent( $request, $response, $args )
  {
    $participateResponse = $this->participateEvents->participateInEvent($args);
    return $response->withJson($participateResponse);
  }

  public function leaveEvent( $request, $response, $args )
  {
    $leaveResponse = $this->participateEvents->cancelParticipation($args);
    return $response->withJson($leaveResponse);
  }

  public function suggestEvent( $request, $response, $args )
  {
    $results = $this->suggestion->suggestionRequest($args);
    return $response->withJson($results);
  }

  public function showMyEvents( $request, $response, $args )
  {
    $results = $this->eventsDelegate->showEventsByUserId( $args['myid'] );
    return $response->withJson($results);
  }


}

 ?>
