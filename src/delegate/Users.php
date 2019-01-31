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
    $usersModel->setUserId( 1 );
    $usersModel->setUserName( $datas['userName'] );
    $usersModel->setUserEmail( $datas['userEmail'] );
    // $usersModel->setUserPassword( $datas['password'] );
    $usersModel->setProfilePics( $datas['profilePic'] );
    $usersModel->setPhoneNumber( $datas['phonenumber'] );
    $usersModel->setOrganisationWebsite( $datas['organisationWebsite'] );
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
//add try catch
    
    die();

    $usersDao = new UsersDao();
    $usersDao->editUserDetails( array( "user_name"=>$userObject->getUserName(),
                                       "user_email"=>$userObject->getUserEmail(),
                                       "password"=>$userObject->getUserPassword(),
                                       "profile_pic"=>$this->fileLocation,
                                       "address_id"=>$address->getAddressId()) ,
                                array( "user_id"=>$userObject->getUserId() ) );


    //check for the address exsistence and then change the user details
  }

}

 ?>
