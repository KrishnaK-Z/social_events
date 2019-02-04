const baseUrl = "http://localhost/social_events/public";

export let urls = {
  showAllEvents: baseUrl+"/events",
  suggNotify: baseUrl+"/sugg/notify",
  eventNotify: baseUrl+"/events/notify",

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
  }
}


export let fetchFunc=( url, settings )=>{
  return fetch( url, settings )
  .then( (response) => {
    return response.json();
  });
}
