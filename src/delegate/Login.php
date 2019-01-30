<?php

namespace App\delegate;

use App\model\Users as UsersModel;
use App\model\Roles as RolesModel;
use App\DAO\UsersDao;
use App\DAO\RoleDao;

class Login
{

  public function getUserObject( $datas )
  {
    $usersModel = new UsersModel();
    $usersModel->setUserEmail( $datas['userEmail'] );
    $usersModel->setUserPassword( $datas['password'] );
    return $usersModel;
  }

  public function getRolesObject(){
    $rolesModel = new RolesModel();
    return $rolesModel;
  }

  public function loginUser( $datas )
  {
    $userObject = $this->getUserObject( $datas );
    $rolesObject = $this->getRolesObject();


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
