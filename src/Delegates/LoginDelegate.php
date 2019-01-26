<?php

namespace App\Delegates;

use App\models\UserDetailsModel;
use App\DAO\UsersDao;
use App\DAO\RoleDao;

class LoginDelegate
{

  public function getUserObject($datas)
  {
    $userDetailsModel = new UserDetailsModel();
    $userDetailsModel->setUserEmail($datas['userEmail']);
    $userDetailsModel->setUserPassword($datas['password']);
    return $userDetailsModel;
  }

  public function loginUser($datas)
  {
    $userObject = $this->getUserObject($datas);

    $usersDao = new UsersDao();
    $userObject->setUserId( $usersDao->getUserByEmailPass( $userObject->getUserEmail(), $userObject->getUserPassword() )[0]['user_id'] );
    $userObject->setRoleId( $usersDao->getUserByEmailPass( $userObject->getUserEmail(), $userObject->getUserPassword() )[0]['role_id'] );

    if( $userObject->getUserId() ){
      session_start();
      $_SESSION['userId'] = $userObject->getUserId();
      $_SESSION['userRoleId'] = $userObject->getRoleId();
      // return $_SESSION['userId'];
      return 1;
    }
    else {
      return 0;
    }

  }

}

 ?>
