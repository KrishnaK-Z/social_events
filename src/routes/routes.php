<?php

use App\controller\RegisterLogin;
use App\controller\Events;
use App\controller\SuggestedList;
use App\controller\Reviews;
use App\controller\Users;


$app->group('/home',function(){
  $this->post('/signup', RegisterLogin::class . ':registerSubmit');
  $this->post('/signin', RegisterLogin::class . ':loginSubmit');
});

$app->put('/users/profile', Users::class . ':editUserDetails');

$app->get('/users', Users::class . ':showAllUserDetails');

$app->get('/find', Users::class . ':showUserDetails');

$app->get('/events', Events::class . ':showAllEventsPage');

$app->get('/sugg/notify', SuggestedList::class . ':loadSuggestions');


$app->get('/events/notify', SuggestedList::class . ':loadNewEvents');
//
// // $app->get('/users/profile?search=name', Users::class . ':showUserDetails');
//

//
// $app->group('/events',function(){
//   $this->get('', EventsCtrl::class . ':showAddEventPage');
//   $this->post('/addevent', EventsCtrl::class . ':addEvents');
//   $this->get('/showAllEvents',EventsCtrl::class . ':showAllEventsPage');
//   $this->post('/{eventId}/suggest/{suggestedToUserId}', EventsCtrl::class . ':suggestEvent');//done
// });
//
// $app->get('/se', EventsCtrl::class . ':showAllEventsPage');
//
// $app->post('/join/{userId}/events/{eventId}', EventsCtrl::class . ':joinEvent');
//

//
// //load this api for page load
// //to see the new updated events wrt the old ones
// $app->get('/notification/events', SuggestedList::class . ':loadNewEvents');
//
// //checking
// //updating the unseen suggestions by clicking the notification button
// $app->put('/notification/suggestions/seen', SuggestedList::class . ':updateSuggestions');
//
// //updating the old seen event count with new came events
// $app->put('/notification/events/seen', SuggestedList::class . ':updateNewEventsNotfy');
//
// //rating the event by the particular reviews
// $app->put('/review/{userId}/event/{eventId}/rate', Reviews::class . ':reviewEvent');
//
// //show reviews by all users
// $app->get('/reviews', Reviews::class . ':reviewsByUser');
//
// $app->get('/reviews/{eventId}', Reviews::class . ':reviewsForEvent');



?>
