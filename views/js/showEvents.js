
import  {urls, settings, fetchFunc, loadJsFiles}  from './fetchUtils.js';
import {constructEventCard} from './constructions.js';

(function(){

let eventArray = {
  loadedEvents: localStorage.getItem('loadedId') ?
                  JSON.parse(localStorage.getItem('loadedId')) : [],
  lastSeenEvents: localStorage.getItem('eventsId') ?
                      JSON.parse(localStorage.getItem('eventsId')) : [],
}
let newEventId = () => {
  return eventArray.loadedEvents.filter(function(item) { return eventArray.lastSeenEvents.indexOf(item) == -1; });
}

// lastSeenEvents = loadedEvents.slice();

fetchFunc( urls.newEvents, settings.postInit( JSON.stringify( newEventId() ) ) )
.then( (datas) => {
  datas.forEach( (data)=>{
    log(data[0].event_name);
  } );
} )
.catch( (error)=>{
  log(error);
} );


let elementsType = {
  showAllEvents: document.querySelectorAll('[data-type = "all-events"]')[0],
  showMyEvents: document.querySelectorAll('[data-type = "my-event"]')[0],
  showSuggestedEvents: document.querySelectorAll('[data-type = "suggested-event"]')[0],
  showItemContainers: document.getElementsByClassName('grid-wrapper')[0],
  eventNotify: document.querySelectorAll('[type = "event-notfy"]')[0],
  suggNotify: document.querySelectorAll('[type = "sugg-notfy"]')[0],
}

let suggNotify = () => {
  fetchFunc(urls.suggNotify, settings.getInit).then( (suggCount) => {
    elementsType.suggNotify.innerHTML = suggCount;
  } )
  .catch( (error) => {
    log(error);
  } );
}

let eventNotify = () => {
  fetchFunc(urls.eventNotify, settings.getInit).then( (eventCount) => {
    elementsType.eventNotify.innerHTML = eventCount;
  } )
  .catch( (error) => {
    log(error);
  } );
}

elementsType.eventNotify.addEventListener("click", (event)=>{
  fetchFunc(urls.eventSeen, settings.putInit("") )
  .then((data)=>{
    log(data);
  })
});

elementsType.suggNotify.addEventListener("click", (event)=>{
  fetchFunc(urls.suggSeen, settings.putInit("") )
  .then((data)=>{
    log(data);
  })
});

// To load all the events in the list
elementsType.showAllEvents.addEventListener( 'click',(event) => {

  elementsType.showItemContainers.innerHTML = "";

  fetchFunc(urls.showAllEvents, settings.getInit)
  .then( (events) => {
    log("fetch");
    // eventArray.loadedEvents = [];
    events.forEach( (event)=>{
      elementsType.showItemContainers.innerHTML+=constructEventCard(event);
    }  );

    loadJsFiles([
      './js/loadjs.js'
    ]);

  } )
  .catch( (error) => {
    log(error);
  } );

} );

setInterval(suggNotify, 3000);
setInterval(eventNotify, 3000);

})();
