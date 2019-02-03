<?php

namespace App\controller;
use App\delegate\Users as UsersDelegate;
use App\utils\DB_Logger;

class Users
{

  private $usersDelegate;

  public function __construct(){
    $this->usersDelegate = new UsersDelegate();
    $this->logger = new DB_Logger();
  }
  //Show All User Details
  public function showAllUserDetails( $request,  $response, $args) {

    //get all users for a name
    if( isset($_GET['name']) )
    $results = $this->usersDelegate->showAllUsersByName( $_GET['name'] );

    //find all users by area
    else if( isset($_GET['area']) )
    $results = $this->usersDelegate->showAllUsersByArea( $_GET['area'] );

    else
    $results = $this->usersDelegate->showAllUserDetails(); //returns an array

    return $response->withJson($results);
  }


  // work need to be done
  public function editUserDetails( $request, $response, $args )
  {
    $datas = $request->getParsedBody();
    $results = $this->usersDelegate->editUserDetails( $datas );
    return $response->withJson( $results );
  }

  // public function showUserDetails( $request, $response, $args )
  // {
  //   echo ($_GET['search']);
  // }

}

 ?>
