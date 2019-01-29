<?php

namespace App\delegate;
use App\DAO\UsersDao;

class Users
{

  //show all the user details
  public function showAllUserDetails()
  {
    $usersDao = new UsersDao();
    return $usersDao->showAllUserDetails();
  }

//edit the user detailss
  // public function editUserDetails($datas, $args)
  // {
  //
  // }

}

 ?>
