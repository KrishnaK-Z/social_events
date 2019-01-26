$(document).ready(function(){

var grid = $(".grid");

		$.ajax({
					 url: "http://localhost:7000/showuser",
					 contentType: "application/json",

					 headers: { 'Access-Control-Allow-Origin': '*' },
					 type: 'GET',
					 crossDomain: true,
					 dataType: 'json',
           success: function(result) {
           console.log(result);
           var output = " ";
           for(var i in result)
           {
             output += "<div class='grid__item' data-size='1280x1280'>" +
             "<a href='' class='img-wrap'><img src='" + result[i].profile_pic + "' alt='ImageNotLoaded' /></a>" +
             "<div class='description description--grid'>" +
             "<h3>" + result[i].user_name + "</h3>" +
             "<p>" + result[i].user_email + "</p>" +
             "<div class='details'>" +
             "<ul>" +
             "<li> <span>" + result[i].phone_number + "</span></li>" +
             "<li> <span>" + result[i].street_address + "</span></li>" +
             "<li> <span>" + result[i].area + "</span></li>" +
             "<li> <span>" + result[i].pincode + "</span></li>" +
             "</ul>" +
             "</div>" +
             "</div>" +
             "</a>" +
             "</div>"
           }

           grid.html(output);

           }
        });

	});
