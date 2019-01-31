(function(){

let elementsType = {
  showAllEvents: document.querySelectorAll('[data-type = "all-events"]')[0],
  showMyEvents: document.querySelectorAll('[data-type = "my-event"]')[0],
  showSuggestedEvents: document.querySelectorAll('[data-type = "suggested-event"]')[0],
  showItemContainers: document.getElementsByClassName('grid-wrapper')[0]
};

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

elementsType.showAllEvents.addEventListener( 'click',(event) => {

  fetch( urls.showAllEvents,  getInit)
  .then( (response) => {
    return response.json();
  } )
  .then( (data) => {
    log(data.length);
  } )
  .catch( (error) => {
    log(error);
  } );

} );

let log = (el) => {
  console.log(el);
}

// log();

})();
