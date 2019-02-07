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
