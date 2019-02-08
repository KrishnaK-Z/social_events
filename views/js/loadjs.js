import  {urls, settings, fetchFunc}  from './fetchUtils.js'

function load(){
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

filter();

}

function filter(){

let debounce=(func, delay)=>{
  let inDebounce
  return function() {
    // clearTimeout();
    const context = this
    const args = arguments
    clearTimeout(inDebounce)
    inDebounce = setTimeout(() => func.apply(context, args), delay)
      }
  }

  var qsRegex;

  var $grid = $('.grid-wrapper').isotope({
    itemSelector: '.grid-wrapper-item',
    layoutMode: 'fitRows',
    filter: function() {

      return qsRegex ? $(this).text().match( qsRegex ) : true;
    }
  });

  // use value of search field to filter
  var $quicksearch = $('.quicksearch').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $grid.isotope();
  }, 200 ) );

}


export {load, filter}
