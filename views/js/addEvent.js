import  {urls, settings, fetchFunc}  from './fetchUtils.js'

(function(){

const elementsType = {
  addEventBtn: document.getElementById('addEventBtn'),
};


elementsType.addEventBtn.addEventListener("click", (event)=>{
  event.preventDefault();
  let addEventForm = document.getElementById("addEventForm");

  fetchFunc( urls.addEvents, settings.postInit( toJSONString( addEventForm ) ) )
  .then( (datas) => {
    log(datas);
  } )
  .catch( (error) => {
    log(error);
  } );
});

})();
