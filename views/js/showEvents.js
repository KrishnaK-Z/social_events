
import  {urls, settings, fetchFunc}  from './fetchUtils.js'
import {constructEventCard} from './constructions.js'

(function(){


let elementsType = {
  showAllEvents: document.querySelectorAll('[data-type = "all-events"]')[0],
  showMyEvents: document.querySelectorAll('[data-type = "my-event"]')[0],
  showSuggestedEvents: document.querySelectorAll('[data-type = "suggested-event"]')[0],
  showItemContainers: document.getElementsByClassName('grid-wrapper')[0],
  eventNotify: document.querySelectorAll('[type = "event-notfy"]')[0],
  suggNotify: document.querySelectorAll('[type = "sugg-notfy"]')[0],
  likeEvent: document.querySelectorAll('[type = "like"]')
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


elementsType.showAllEvents.addEventListener( 'click',(event) => {

  elementsType.showItemContainers.innerHTML = "";

  fetchFunc(urls.showAllEvents, settings.getInit)
  .then( (events) => {
    events.forEach( (event)=>{
      elementsType.showItemContainers.innerHTML+=constructEventCard(event);
    }  );
  } )
  .catch( (error) => {
    log(error);
  } );

} );

setInterval(suggNotify, 3000);
setInterval(eventNotify, 3000);

})();
