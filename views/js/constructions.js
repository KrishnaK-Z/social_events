export let constructEventCard = (event) => {

    let result =
    `<div class="grid-wrapper-item event-space" data-filter="${event.event_category_name}">
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
                  result += `<button type="cancel" name="cancel" class="join-cancel-btn cancel btn-show" id="${event.event_id}">CANCEL</button>
                             <button type="join" name="join" class="join-cancel-btn join" id="${event.event_id}">JOIN</button>`;
                  else
                  result += `<button type="join" name="join" class="join-cancel-btn join btn-show" id="${event.event_id}">JOIN</button>
                             <button type="cancel" name="cancel" class="join-cancel-btn cancel" id="${event.event_id}">CANCEL</button>`;

                  result += `<div class="details-container">
                          <span class="spots">${event.spots}</span>
                          <span classhi first notes="event-name">${event.event_name}</span>
                          <p id="${event.user_id}"><strong>Hosted By</strong><span> ${event.user_name}</span></p>
													<div class="more-details">
															<strong>Category</strong>
															<span>${event.event_category_name}</span>
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


export let constructAccountInfoForm=()=>{
  let result = `
  <form class="edit-form">
		<fieldset>
			<legend>Account Info</legend>

			<div class="info">
				<div class="message">
					Hosted: 45
				</div>
				<div class="message">
					Participated: 123
				</div>
			</div>

				<div>
				<label class="label" for="cd-name">User Name</label>
				<input class="user" type="text" name="userName" id="userName" required>
		    </div>

		    <div>
		    	<label class="label" for="userEmail">Email</label>
				<input type="email" name="userEmail" id="userEmail" required>
		    </div>

				<div>
				<label class="label" for="phonenumber">Phone Number</label>
				<input class="user" type="number" name="phonenumber" id="phonenumber" required>
		    </div>

				<div>
		    	<label class="label" for="password">Password</label>
				<input type="password" name="password" id="password" required>
		    </div>

				<div>
		    	<label class="label" for="confpassword">Confirm Password</label>
				<input type="password" name="confpassword" id="confpassword" required>
		    </div>

				<div>
				<label class="label" for="streetAddress">Street Address</label>
				<input type="text" name="streetAddress" id="streetAddress" required>
		    </div>

				<div>
				<label class="label" for="area">Area</label>
				<input type="text" name="area" id="area" required>
		    </div>

				<div>
				<label class="label" for="pincode">Pincode</label>
				<input type="number" name="pincode" id="pincode" required>
		    </div>

				<input type="submit" value="Update Account Details">
		</fieldset>

	</form>
  `;
  return result;
}



export let constructNewEventList=( data ) => {
  let result = `<li>${data[0].event_name}</li>`;
  return result;
}
