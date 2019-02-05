const baseUrl = "http://localhost/social_events/public";

export let urls = {
  showAllEvents: baseUrl+"/events",
  suggNotify: baseUrl+"/sugg/notify",
  eventNotify: baseUrl+"/events/notify",
  eventSeen: baseUrl+"/events/notify/seen",
  suggSeen: baseUrl+"/sugg/notify/seen",
  newEvents: baseUrl+"/new/events",
  addEvents: baseUrl+"/addevent",
}

const defHeaders = {
    "Content-Type": "application/json",
    "Accept": "application/json"
}

export let settings = {
  getInit:   {
    method: "GET",
    headers: defHeaders,
    mode: "cors",
    cache: "default"
  },

  postInit: (data)=>{
    return {
      method: "POST",
      headers: defHeaders,
      mode: "cors",
      cache: "default",
      body: data
    }
  },

  putInit: (data)=>{
    return {
      method: "PUT",
      headers: defHeaders,
      mode: "cors",
      cache: "default",
      body: data
    }
  }
}


export let fetchFunc=( url, settings )=>{
  return fetch( url, settings )
  .then( (response) => {
    return response.json();
  });
}

export let loadJsFiles = ( list ) =>{
  list.forEach(function(src) {
    var script = document.createElement('script');
    script.type= "module";
    script.setAttribute("dynamic", "load");
    script.src = src;
    script.async = false;
    document.body.appendChild(script);
  });
}
