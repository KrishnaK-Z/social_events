<?php

namespace App\controller;
use App\delegate\Users as UsersDelegate;

class Users extends BaseController
{
  //Show All User Details
  public function showAllUserDetails( $request,  $response, $args) {
    $usersDelegate = new UsersDelegate();

    //get all users for a name
    if( isset($_GET['name']) )
    $results = $usersDelegate->showAllUsersByName( $_GET['name'] );

    //find all users by area
    else if( isset($_GET['area']) )
    $results = $usersDelegate->showAllUsersByArea( $_GET['area'] );

    else
    $results = $usersDelegate->showAllUserDetails(); //returns an array
    // $this->c->logger->info(" from the appache 2 " );
    return $response->withJson($results);
  }


  // work need to be done
  public function editUserDetails( $request, $response, $args )
  {
    $usersDelegate = new UsersDelegate();
    $datas = $request->getParsedBody();
    $results = $usersDelegate->editUserDetails( $datas );
    return $response->withJson( $results );
  }

  public function showUserDetails( $request, $response, $args )
  {
    echo ($_GET['search']);

  }

}

 ?>
