<?php

namespace App\Delegates;
use App\DAO\UsersDao;

class AllUsersDelegate
{

  public function showAllUserDetails()
  {
    $usersDao = new UsersDao();
    return $usersDao->showAllUserDetails();
  }

}

 ?>
