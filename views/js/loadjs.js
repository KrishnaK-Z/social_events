import  {urls, settings, fetchFunc}  from './fetchUtils.js'
export function load(){
  // Event Card the more details animation
  $('.event-card').hover(function(){
    // log("hover");
      $(this).addClass('animate');
     }, function(){
      $(this).removeClass('animate');
  });
  // The hamburgger icon transition are her
  $('.ham-wrapper').on('click', function() {
    $('.page-container').toggleClass('cols');
    });

  let elements = {
    likeEvent: document.querySelectorAll('[type = "like"]'),
    joinBtns: document.querySelectorAll('[type = "join"]'),
    cancelBtns: document.querySelectorAll('[type="cancel"]'),
  }

// Cancel button for the event cards
  elements.cancelBtns.forEach( (cancelBtn, index) => {
    cancelBtn.addEventListener("click", (event)=>{
      let url = "http://localhost/social_events/public/join/"+localStorage.getItem('userId')+"/events/"+event.target.id;
      fetchFunc(url, settings.deleteInit(""))
      .then( (data)=>{
        log("cancel");
        elements.cancelBtns[index].classList.toggle("btn-show");
        elements.joinBtns[index].classList.toggle("btn-show");
      } )
      .catch( (error)=>{
        log(error);
      } );
    });
  } );

// Join button for the event cards
  elements.joinBtns.forEach( (joinBtn, index) => {
    joinBtn.addEventListener("click", (event) => {
      let url = "http://localhost/social_events/public/join/"+localStorage.getItem('userId')+"/events/"+event.target.id;
      fetchFunc(url, settings.postInit(""))
      .then( (data) => {
        log("join");
        elements.cancelBtns[index].classList.toggle("btn-show");
        elements.joinBtns[index].classList.toggle("btn-show");
      } )
      .catch((error) => {
        log(error);
      });
    });
  } );



}
