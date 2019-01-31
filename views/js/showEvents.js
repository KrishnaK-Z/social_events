(function(){


let log = (el) => {
  console.log(el);
}

let elementsType = {
  showAllEvents: document.querySelectorAll('[data-type = "all-events"]')[0],
  showMyEvents: document.querySelectorAll('[data-type = "my-event"]')[0],
  showSuggestedEvents: document.querySelectorAll('[data-type = "suggested-event"]')[0],
  showItemContainers: document.getElementsByClassName('grid-wrapper')[0]
}

const urls = {
  showAllEvents: "http://localhost/social_events/public/events"
}

const defHeaders = {
    "Content-Type": "application/json",
}

let getInit = {
  method: "GET",
  headers: defHeaders,
  mode: "cors",
  cacje: "default"
}

const eventCard = {
  eventMain: create('div'),
  shadow: create('div'),
  img: create('img'),
  overlay: create('div'),
  join: create('button'),
  detCont: create('div'),
  spots: create('span'),
  eventName: create('span'),
  hostedP: create('p'),
  hostedBy: create('strong'),
  host: create('span'),
  moreDet: create('div'),
  venue: create('strong'),
  street: create('span'),
  timeH: create('strong'),
  timeD: create('span')
}

log(eventCard);

let constructEventCard = (data) => {
  
}

elementsType.showAllEvents.addEventListener( 'click',(event) => {

  fetch( urls.showAllEvents,  getInit)
  .then( (response) => {
    return response.json();
  } )
  .then( (data) => {
    // log(data[2].street_address);
    for(let i=0; i<data.length; i++)
    constructEventCard(data[i]);
  } )
  .catch( (error) => {
    log(error);
  } );

} );


// log();

})();
