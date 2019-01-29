<?php

namespace App\delegate;

use App\DAO\UsersDao;
use App\DAO\AddressDao;

use App\model\Users as UsersModel;
use App\model\AddressDetails as AddressModel;

class Users
{
  public function getUserObject( $datas )
  {
    $usersModel = new UsersModel();
    $usersModel->setUserName( $datas['userName'] );
    $usersModel->setUserEmail( $datas['userEmail'] );
    // $usersModel->setUserPassword( $datas['password'] );
    $usersModel->setProfilePics( $datas['profilePic'] );
    $usersModel->setPhoneNumber( $datas['phonenumber'] );
    $usersModel->setOrganisationWebsite( $datas['organisationWebsite'] );
    return $usersModel;
  }

  public function getAddressObject( $datas )
  {
    $addressModel = new AddressModel();
    $addressModel->setStreetAddress( $datas['streetAddress'] );
    $addressModel->setArea( $datas['area'] );
    $addressModel->setPincode( $datas['pincode'] );
    return $addressModel;
  }
  //show all the user details
  public function showAllUserDetails()
  {
    $usersDao = new UsersDao();
    return $usersDao->showAllUserDetails();
  }

//edit the user detailss
  public function editUserDetails( $datas )
  {
    $userObject = $this->getUserObject( $datas );
    $addressObject = $this->getAddressObject( $datas )

    $usersDao = new UsersDao();
    $usersDao->editUserDetails(  );

    $addressDao = new AddressDao();
    //check for the address exsistence and then change the user details
  }

}

 ?>
