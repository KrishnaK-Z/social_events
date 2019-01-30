<?php

namespace App\controller;
use App\delegate\Users as UsersDelegate;

class Users extends BaseController
{
  //Show All User Details
  public function showAllUserDetails( $request,  $response, $args) {
    $usersDelegate = new UsersDelegate();
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
    echo $_GET['search'];
    // echo $args['search'];
    die();
  }

}

 ?>
