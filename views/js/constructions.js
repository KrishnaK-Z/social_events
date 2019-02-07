export let constructEventCard = (event) => {

    let result =
    `<div class="event-space" data-category="${event.event_category_name}">
      <div class="hanging-bar">
        <i class="fas fa-pencil-alt"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-thumbs-up" type="like"></i>
        <i class="fas fa-user-friends"></i>
      </div>
          <div class="event-card">

                <div class="shadow"></div>
                  <img src="https://images.unsplash.com/photo-1539805430028-e3aa3f6c2172?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=688&q=80" alt=""/>
                  <div class="overlay"></div>`

                  if(`${event.participation_id}`>0)
                  result += `<button type="cancel" name="cancel" class="join-cancel-btn cancel btn-show" id="${event.event_id}">CANCEL</button><button type="join" name="join" class="join-cancel-btn join" id="${event.event_id}">JOIN</button>`;
                  else
                  result += `<button type="join" name="join" class="join-cancel-btn join btn-show" id="${event.event_id}">JOIN</button><button type="cancel" name="cancel" class="join-cancel-btn cancel" id="${event.event_id}">CANCEL</button>`;

                  result += `<div class="details-container">
                          <span class="spots">${event.spots}</span>
                          <span classhi first notes="event-name">${event.event_name}</span>
                          <p id="${event.user_id}"><strong>Hosted By</strong><span> ${event.user_name}</span></p>
                          <div class="more-details">
                              <strong>Venue</strong>
                              <span>${event.street_address}, ${event.area}, ${event.pincode}</span>
                              <strong>Timing</strong>
                              <span>${event.start_time} to ${event.end_time}pm</span>
                          </div>
                      </div>
          </div>
      </div>`;
      return result;
}




export let constructNewEventList=( data ) => {
  let result = `<li>${data[0].event_name}</li>`;
  return result;
}
