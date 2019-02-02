<?php

namespace App\delegate;

use App\DAO\UsersDao;
use App\DAO\AddressDao;

use App\model\Users as UsersModel;
use App\model\AddressDetails as AddressModel;

class Users
{
  public $fileLocation=null;

  public function getUserObject( $datas )
  {
    $usersModel = new UsersModel();
    $usersModel->setUserId( $datas['userId'] );
    $usersModel->setUserName( $datas['userName'] );
    $usersModel->setUserEmail( $datas['userEmail'] );
    $usersModel->setUserPassword( $datas['password'] );
    $usersModel->setProfilePics( $datas['profilePic'] );
    $usersModel->setPhoneNumber( $datas['phonenumber'] );
    $usersModel->setOrganisationWebsite( $datas['organisation_website'] );
    return $usersModel;
  }

  //show all the user details
  public function showAllUserDetails()
  {
    $usersDao = new UsersDao();
    return $usersDao->showAllUserDetails();
  }

  public function showAllUsersByName( $name )
  {
    $usersDao = new UsersDao();
    return $usersDao->showAllUsersByName( $name );
  }
  public function showAllUsersByArea( $area )
  {
    $userDao = new UserDao();
    return $usersDao->showAllUsersByArea( $area );
  }

//edit the user detailss
  public function editUserDetails( $datas )
  {

    $userObject = $this->getUserObject( $datas );

    $address = new Address( $datas );


    if(!$address->getAddressId())
    $address->addAddressDetails();




    $usersDao = new UsersDao();
    $usersDao->editUserDetails( $userObject->getUserName(), $userObject->getUserEmail(),
                               $userObject->getUserPassword(), $userObject->getPhoneNumber(),
                                $userObject->getUserId());



    //check for the address exsistence and then change the user details
  }

}

 ?>
