<?php

namespace App\controller;
use App\delegate\Users as UsersDelegate;

class Users extends BaseController
{

  private $usersDelegate;

  public function __construct(){
    parent::__construct();
    $this->usersDelegate = new UsersDelegate();
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
    // $this->c->logger->info(" from the appache 2 " );
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
