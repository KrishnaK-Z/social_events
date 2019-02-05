17-01-2019


MVC

|----->      Users -> Controllers -> Models -> Views ---> |
|_________________________________________________________|



In the example you suggested, you're right: "user clicked the 'delete this item' button" in the interface should basically just call the controller's "delete" function. The controller, however, has no idea what the view looks like, and so your view must collect some information such as, "which item was clicked?"

In a conversation form:

View: "Hey, controller, the user just told me he wants item 4 deleted."
Controller: "Hmm, having checked his credentials, he is allowed to do that... Hey, model, I want you to get item 4 and do whatever you do to delete it."
Model: "Item 4... got it. It's deleted. Back to you, Controller."
Controller: "Here, I'll collect the new set of data. Back to you, view."
View: "Cool, I'll show the new set to the user now."

Controllers -> accepts data from the user and converts to commands to the model
>>>Locating the appropriate action method to call and validating that it can be called.
>>>Getting the values to use as the action method's arguments.
>>>Handling all errors that might occur during the execution of the action method.


The idea with DAO is to ‘provide some specific data operations without exposing details of the database’ as well as avoiding queries on every script we create. So we’ll create a class per each table and relationship (n to n) we have on our database.


Default parameter in the function

Creating a default parameter in a function is very simple and is quite like normal variable assignment. The following function has a single parameter that is set to 1 if it is not passed when calling the function.

function testFunction($a = 1)
{
    return $a;
}





<!-- <a href="{{ asset(result.profile_pic) }}" class="img-wrap"><img src="{{ asset(result.profile_pic) }}" alt="img07" /></a> -->



[configuration]
server_name = 'localhost'
user = 'kkroot'
pass = 'veronica007KK!@#$%'
db_name = 'social_events'


[database]
driver = 'mysql'
host = 'localhost'
database = 'social_events'
username = 'kkroot'
password = 'veronica007KK!@#$%'
charset = 'utf8'
collation = 'utf8_unicode_ci'





view -> routes -> controller -> delegates -> dao -> use the utils


action="{{path_for('register_form_action')}}"


events
js output
form data
try catch
connection.php
const php
namings
arrange the ui
authentication
validation







  https://www.codementor.io/geggleto/slim-3-controllers-and-actions-cwztvuhg8


  https://stackoverflow.com/questions/36845725/dependency-injection-slim-framework-3

  throwanble and exception








array("message" => "updated  ")









// let eventNotify = () => {
//   fetch( urls.suggNotify, settings.getInit )
//   .then( (response) => {
//     return response.json();
//   } )
//   .then( (suggCount) => {
//     elementsType.suggNotify.innerHTML = suggCount;
//   } )
//   .catch( (error) => {
//     log(error);
//   } );
// }


//
