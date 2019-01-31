$(document).ready(function(){

  $('#events').click(function(event){
    // console.log(event.target.getAttribute('type'));
    let type  = event.target.getAttribute('type');
    switch (type) {
      case "all-events":
        event.preventDefault();
        let grid = $('.grid-wrapper')[0];

        $.ajax({

    					 url: $(form).attr('action'),
    					 processData: false,
    					 headers: { 'Access-Control-Allow-Origin': '*' },
    					 type: 'POST',
    					 crossDomain: true,
    					 dataType: 'json',
    										}) .done(function (json){
    										 // console.log(json)
    										 if(json==1){
    											 alert("Success")
    										 }
    										 else{
    											 alert("Error")
    										 }

    			 }).fail(function(xhr,status,errorThrow){
    				 // console.log('error'+errorThrow)
    			 });

        break;
      default:

    }
  });


});
