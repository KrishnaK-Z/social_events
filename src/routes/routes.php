<?php

use App\controller\RegisterLogin;
use App\controller\EventsCtrl;
use App\controller\SuggestedList;
use App\controller\Reviews;

$app->group('/home',function(){
  $this->post('/signup', RegisterLogin::class . ':registerSubmit');
  $this->post('/signin', RegisterLogin::class . ':loginSubmit');
});


$app->get('/showuser', RegisterLoginCtrl::class . ':showAllUserDetailsCtrl');

$app->post('/edit/{userId}', RegisterLoginCtrl::class . ':editUserDetails');

$app->group('/login',function(){
  $this->get('', RegisterLoginCtrl::class . ':loginHome');
  $this->post('', RegisterLoginCtrl::class . ':loginSubmit');
});

$app->group('/events',function(){
  $this->get('', EventsCtrl::class . ':showAddEventPage');
  $this->post('/addevent', EventsCtrl::class . ':addEvents');
  $this->get('/showAllEvents',EventsCtrl::class . ':showAllEventsPage');
  $this->post('/{eventId}/suggest/{suggestedToUserId}', EventsCtrl::class . ':suggestEvent');//done
});

$app->get('/se', EventsCtrl::class . ':showAllEventsPage');

$app->post('/join/{userId}/events/{eventId}', EventsCtrl::class . ':joinEvent');


//load this api on page load
//load the new suggestions for us
$app->get('/notification/suggestions', SuggestedList::class . ':loadSuggestions');

//load this api for page load
//to see the new updated events wrt the old ones
$app->get('/notification/events', SuggestedList::class . ':loadNewEvents');

//checking
//updating the unseen suggestions by clicking the notification button
$app->put('/notification/suggestions/seen', SuggestedList::class . ':updateSuggestions');

//updating the old seen event count with new came events
$app->put('/notification/events/seen', SuggestedList::class . ':updateNewEventsNotfy');

//rating the event by the particular reviews
$app->put('/review/{userId}/event/{eventId}/rate', Reviews::class . ':reviewEvent');

//show reviews by all users
$app->get('/reviews', Reviews::class . ':reviewsByUser');

$app->get('/reviews/{eventId}', Reviews::class . ':reviewsForEvent');

$app->get('/reviews/users/{userId}/events/{eventId}' . Reviews::class, .':reviewByuserForEvent');

?>
