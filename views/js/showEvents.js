import  {urls, settings, fetchFunc, loadJsFiles}  from './fetchUtils.js';
import {constructEventCard, constructNewEventList, constructAccountInfoForm} from './constructions.js';
import {load, filter} from './loadjs.js';


(function(){

// Filter the events bsed on the category


// quick search regex


let eventArray = {
  loadedEvents: localStorage.getItem('loadedId') ?
                  JSON.parse(localStorage.getItem('loadedId')) : [],
  lastSeenEvents: localStorage.getItem('eventsId') ?
                      JSON.parse(localStorage.getItem('eventsId')) : [],
}
let newEventId = () => {
  return eventArray.loadedEvents.filter(function(item) { return eventArray.lastSeenEvents.indexOf(item) == -1; });
}


let elementsType = {
  showAllEvents: document.querySelectorAll('[data-type = "all-events"]')[0],
  showMyEvents: document.querySelectorAll('[data-type = "my-event"]')[0],
  showSuggestedEvents: document.querySelectorAll('[data-type = "suggested-event"]')[0],
  showItemContainers: document.getElementsByClassName('grid-wrapper')[0],
  eventNotify: document.querySelectorAll('[type = "event-notfy"]')[0],
  suggNotify: document.querySelectorAll('[type = "sugg-notfy"]')[0],
  newEventsList: document.getElementsByClassName('newEventsList')[0],
  myEvents: document.querySelectorAll('[data-type="my-event"]')[0],
  joinedEvents: document.querySelectorAll('[data-type="joined-event"]')[0],
  myAccount: document.querySelectorAll('[data-type="my-account"]')[0],
  search: document.getElementsByClassName('quicksearch')[0],
}


elementsType.myAccount.addEventListener("click", (event)=>{
  elementsType.showItemContainers.innerHTML = constructAccountInfoForm();
});



// To show notification for the newly added events
fetchFunc( urls.newEvents, settings.postInit( JSON.stringify( newEventId() ) ) )
.then( (datas) => {
  // log(datas);
  datas.forEach( (data)=>{
    elementsType.newEventsList.innerHTML+=constructNewEventList(data);
  } );
} )
.catch( (error)=>{
  log(error);
} );


// Function for loading the events based on the urls
let loadAllEvents = (url) => {
  fetchFunc(url, settings.getInit)
  .then( (events) => {
    elementsType.showItemContainers.innerHTML = "";
    // log(events);
    events.forEach( (event)=>{
      elementsType.showItemContainers.innerHTML+=constructEventCard(event);
    }  );

    // loadJsFiles([
    //   './js/loadjs.js'
    // ]);
    load();

  } )
  .catch( (error) => {
    log(error);
  } );
}

//initially load the all events page
loadAllEvents(urls.showAllEvents);

// Button Click action in the my events
elementsType.myEvents.addEventListener("click", (event)=>{
  elementsType.showItemContainers.innerHTML = "";
  loadAllEvents(urls.myEvents);
});

elementsType.joinedEvents.addEventListener("click", (event)=>{
  elementsType.showItemContainers.innerHTML = "";
  loadAllEvents(urls.joinedEvents);
});

// To load the number of new suggestions.
let suggNotify = () => {
  fetchFunc(urls.suggNotify, settings.getInit).then( (suggCount) => {
    elementsType.suggNotify.innerHTML = suggCount;
  } )
  .catch( (error) => {
    log(error);
  } );
}


// To load the number of new events
let eventNotify = () => {
  fetchFunc(urls.eventNotify, settings.getInit).then( (eventCount) => {
    elementsType.eventNotify.innerHTML = eventCount;
  } )
  .catch( (error) => {
    log(error);
  } );
}


// Click the event notification button -- updates the last seen count in the database
elementsType.eventNotify.addEventListener("click", (event)=>{
  fetchFunc(urls.eventSeen, settings.putInit("") )
  .then((data)=>{
    log(data);
    eventArray.lastSeenEvents = eventArray.loadedEvents.slice();
  })
});


// Click the suggestions button -- updates the seen sugg count in the DB
elementsType.suggNotify.addEventListener("click", (event)=>{
  fetchFunc(urls.suggSeen, settings.putInit("") )
  .then((data)=>{
    log(data);
  })
});

// To load all the events in the list
elementsType.showAllEvents.addEventListener( 'click',(event) => {

  elementsType.showItemContainers.innerHTML = "";

  loadAllEvents(urls.showAllEvents);

} );


// Calls in an equal interval on page load.
setInterval(suggNotify, 3000);
setInterval(eventNotify, 3000);


})();
