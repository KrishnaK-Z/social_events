<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Righteous" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/reset.css">
    <style media="screen">
      body{
        font-family: 'Bree Serif', serif;
      }
    </style>
  </head>
  <body>
    <div class="page-container">
        <div class="side-bar">
          <div class="header">
            <div class="logo">Cabin</div>
          </div>
          <ul class="menu">

            <li class="has-children">
              <input type="checkbox" name="menu-list-1" value="" id="menu-list-1">

              <label for="menu-list-1"><i class="fas fa-caret-down"></i>Menu-1</label>
              <ul style="background: #1c1f22;">
                <li><a href="#">List 1</a></li>
                <li><a href="#">List 2</a></li>
              </ul>
            </li>

            <li class="has-children" id="events">
              <input type="checkbox" name="menu-list-2" value="" id="menu-list-2">

              <label for="menu-list-2"><i class="fas fa-caret-down"></i>Events</label>
              <ul>
                <li><a href="#" type="all-events">All Events</a></li>
                <li><a href="#" type="my-event">My Events</a></li>
                <li><a href="#" type="suggested-event">Suggestions</a></li>
              </ul>
            </li>

            <li class="has-children">
              <input type="checkbox" name="menu-list-3" value="" id="menu-list-3">

              <label for="menu-list-3"><i class="fas fa-caret-down"></i>Profile</label>
              <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>

          </ul>
          <button type="add-event" name="add-event" class="add-event">Add Event</button>
        </div>
        <div class="main-wrapper">
          <div class="top-bar">
            <div class="ham-wrapper">
              <div class="ham"></div>
            </div>
          </div>
          <div class="grid-wrapper" style="display: flex; padding: 3%;">
            <div class="event-space">
              <div class="hanging-bar">
                <i class="fas fa-pencil-alt"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-thumbs-up"></i>
                <i class="fas fa-user-friends"></i>
              </div>
                  <div class="event-card">

                      	<div class="shadow"></div>
                          <img src="https://images.unsplash.com/photo-1539805430028-e3aa3f6c2172?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=688&q=80" alt="" width="100%" height="100%"/>
                          <div class="overlay"></div>
                          <button type="join" name="join" id="join">JOIN</button>
                              <div class="details-container">
                                  <span class="spots">23/100</span>
                                  <span class="event-name">Event Name</span>
                                  <p><strong>Hosted By</strong><span> Put Chuttney</span></p>
                                  <div class="more-details">
                                  <strong>Venue</strong>
                                  <span>123 Street, Area, Ch-34.</span>
                                  <strong>Timing</strong>
                                  <span>8:00am to 7:00pm</span>
                              </div>
                              </div>
                  </div>
              </div>


          </div>
        </div>
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/home.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
      $('.event-card').hover(function(){
          $(this).addClass('animate');
         }, function(){
          $(this).removeClass('animate');
      });
      });
  </script>
  <script type="text/javascript" src="./ajaxrequest/events.js"></script>
</html>
