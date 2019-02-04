<?php

namespace App\delegate;

use App\model\Users as UsersModel;
use App\model\Roles as RolesModel;
use App\DAO\UsersDao;
use App\DAO\RoleDao;

class Login extends BaseDelegate
{

  public function loginUser( $datas )
  {
    $userObject = $this->helper->getUserObject( $datas );
    $rolesObject = $this->helper->getRolesObject( $datas );


    $usersDao = new UsersDao();
    $userObject->setUserId( $usersDao->getUserByEmailPass( $userObject->getUserEmail(), $userObject->getUserPassword() )[0]['user_id'] );
    $rolesObject->setRoleId( $usersDao->getUserByEmailPass( $userObject->getUserEmail(), $userObject->getUserPassword() )[0]['role_id'] );

    if( $userObject->getUserId() ){
      session_start();
      $_SESSION['userId'] = $userObject->getUserId();
      $_SESSION['userRoleId'] = $rolesObject->getRoleId();
      return array("message" => "Login Success");
    }
    else {
      return array("message" => "Login Failed");
    }

  }

}

 ?>
