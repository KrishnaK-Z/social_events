import  {urls, settings, fetchFunc}  from './fetchUtils.js'
import {constructEventCard} from './constructions.js'
(function(){
  $('.event-card').hover(function(){
    console.log("hover");
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

    });
  } );
})();




  // var els = document.getElementsByClassName("event-card");
  //
  // Array.prototype.forEach.call(els, function(el) {
  //     el.addEventListener("mouseover", function(event){
  //       addClass(event.target, 'animate', callBack);
  //       function callBack(el){
  //         removeClass(el,'animate');
  //       }
  //     });
  // });
