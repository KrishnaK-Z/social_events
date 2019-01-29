<?php

namespace App\Delegates;
use App\DAO\EventsDao;

class AllEventsDelegate
{

  public function showAllEventsDetails()
  {
    $eventsDao = new EventsDao();
    return $eventsDao->showAllEventsDetails();
  }

}

 ?>
