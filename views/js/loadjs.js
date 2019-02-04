$(document).ready(function(){
    $('.event-card').hover(function(){
      console.log("hover");
        $(this).addClass('animate');
       }, function(){
        $(this).removeClass('animate');
    });
    $('.ham-wrapper').on('click', function() {
      $('.page-container').toggleClass('cols');
      });
    });
