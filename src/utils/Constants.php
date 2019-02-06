<?php

namespace App\utils;

class Constants
{
  const SELECT_EVENT_FIELDS = "SELECT events.event_id, events.event_name,events.spots,event_category.event_category_id,
                               event_category.event_category_name,events.start_time,events.event_date,events.end_time,
                               users.user_name,address_details.street_address, address_details.area, address_details.pincode,
                               participation.participation_id from events ";

  const PARTICIPATED = "JOIN users on events.coordinator_id = users.user_id
                        JOIN event_category on events.event_category_id = event_category.event_category_id
                        JOIN address_details on events.address_id = address_details.address_id
                        JOIN participation on participation.event_id = events.event_id WHERE participation.user_id ";

  const ALL_EVENTS_FIRST = "inner join address_details on events.address_id = address_details.address_id
                        INNER JOIN event_category on events.event_category_id = event_category.event_category_id
                        INNER JOIN users on users.user_id = events.coordinator_id left join participation on
                        participation.user_id = ";
 const ALL_EVENTS_LAST = " and participation.event_id = events.event_idJOIN";
}

 ?>
