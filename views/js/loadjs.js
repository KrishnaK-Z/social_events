import  {urls, settings, fetchFunc}  from './fetchUtils.js'
(function(){
  $('.event-card').hover(function(){
      $(this).addClass('animate');
     }, function(){
      $(this).removeClass('animate');
  });
  $('.ham-wrapper').on('click', function() {
    $('.page-container').toggleClass('cols');
    });

  let elements = {
    likeEvent: document.querySelectorAll('[type = "like"]'),
    joinBtn: document.querySelectorAll('[type = "join"]')
  }

  elements.joinBtn.forEach( (btn) => {
    btn.addEventListener("click", (event) => {
      var url = "http://localhost/social_events/public/join/"+localStorage.getItem('userId')+"/events/"+event.target.id;
      fetchFunc(url, settings.postInit(""))
      .then( (data) => {
        log(data);
      } )
      .catch((error) => {
        log(error);
      });
    });
  } );
})();
