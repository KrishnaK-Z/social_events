<?php

use App\controllers\RegisterLoginCtrl;
use App\controllers\EventsCtrl;
use App\controllers\SuggestedList;
use App\controllers\Reviews;

//done
$app->group('/register',function(){
  $this->get('', RegisterLoginCtrl::class . ':registerHome');
  $this->post('', RegisterLoginCtrl::class . ':registerSubmit');
});

//done
$app->get('/showuser', RegisterLoginCtrl::class . ':showAllUserDetailsCtrl');

$app->post('/edit/{userId}', RegisterLoginCtrl::class . ':editUserDetails');

//done
$app->group('/login',function(){
  $this->get('', RegisterLoginCtrl::class . ':loginHome');
  $this->post('', RegisterLoginCtrl::class . ':loginSubmit');
});

//done
$app->group('/events',function(){
  $this->get('', EventsCtrl::class . ':showAddEventPage');
  $this->post('/addevent', EventsCtrl::class . ':addEvents');
  $this->get('/showAllEvents',EventsCtrl::class . ':showAllEventsPage');
  $this->post('/{eventId}/suggest/{suggestedToUserId}', EventsCtrl::class . ':suggestEvent');//done
});

//done
$app->get('/se', EventsCtrl::class . ':showAllEventsPage');

//done
$app->post('/join/{userId}/events/{eventId}', EventsCtrl::class . ':joinEvent');


//load this api on page load
//load the new suggestions for us
//done
$app->get('/notification/suggestions', SuggestedList::class . ':loadSuggestions');

//load this api for page load
//to see the new updated events wrt the old ones
//done
$app->get('/notification/events', SuggestedList::class . ':loadNewEvents');

//checking
//updating the unseen suggestions by clicking the notification button
//done
$app->put('/notification/suggestions/seen', SuggestedList::class . ':updateSuggestions');

//updating the old seen event count with new came events
//done
$app->put('/notification/events/seen', SuggestedList::class . ':updateNewEventsNotfy');

//rating the event by the particular reviews
$app->put('/review/{userId}/event/{eventId}/rate', Reviews::class, ':reviewEvent');

//show reviews by all users for a review
$app->get('/review/{userId}', Reviews::class, ':reviewsByUser');

?>
