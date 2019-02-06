import  {urls, settings, fetchFunc}  from './fetchUtils.js'
export function load(){
  console.log("load function called");
  $('.event-card').hover(function(){
    // log("hover");
      $(this).addClass('animate');
     }, function(){
      $(this).removeClass('animate');
  });
  $('.ham-wrapper').on('click', function() {
    $('.page-container').toggleClass('cols');
    });

  let elements = {
    likeEvent: document.querySelectorAll('[type = "like"]'),
    joinBtns: document.querySelectorAll('[type = "join"]'),
    cancelBtns: document.querySelectorAll('[type="cancel"]'),
  }

  elements.cancelBtns.forEach( (cancelBtn) => {
    cancelBtn.addEventListener("click", (event)=>{
      var url = "http://localhost/social_events/public/join/"+localStorage.getItem('userId')+"/events/"+event.target.id;
      fetchFunc(url, settings.deleteInit(""))
      .then( (data)=>{
        log(data);
        // document.location.reload(true);
      } )
      .catch( (error)=>{
        log(error);
      } );
    });
  } );

  elements.joinBtns.forEach( (joinBtn) => {
    joinBtn.addEventListener("click", (event) => {
      var url = "http://localhost/social_events/public/join/"+localStorage.getItem('userId')+"/events/"+event.target.id;
      log(url);
      fetchFunc(url, settings.postInit(""))
      .then( (data) => {
        log(data);
        // document.location.reload(true);
      } )
      .catch((error) => {
        log(error);
      });
    });
  } );
}
