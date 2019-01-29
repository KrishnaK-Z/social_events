<?php

namespace App\delegate;
use App\model\Users as UsersModel;
use App\model\AddressDetails as AddressModel;
use App\model\Roles as RolesModel;
use App\DAO\UsersDao;
use App\DAO\RoleDao;
use App\DAO\AddressDao;
use App\DAO\SuggestionsNotification;

class RegisterDelegate
{

  public function getUserObject( $datas )
  {
    $usersModel = new UsersModel();
    $usersModel->setUserName( $datas['userName'] );
    $usersModel->setUserEmail( $datas['userEmail'] );
    $usersModel->setUserPassword( $datas['password'] );
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

  public function getRolesObject( $datas )
  {
    $rolesModel = new RolesModel();
    $rolesModel->setRoleType( $datas['roleType'] );
    return $rolesModel;
  }




  public function registerUser( $datas )
  {
    // var_dump($datas);
    $fileLocation = null;//location of the profile picture

    $userObject = $this->getUserObject( $datas );
    $addressObject = $this->getAddressObject( $datas )
    $rolesObject = $this->getRolesObject( $datas );

    $roleDao = new RoleDao();
    $roleId = $roleDao->getRoleId( $rolesObject->getRoleType() );
    $rolesObject->setRoleId( $roleId[0]['roles_id'] );

    //contains query for the Users Table
    $usersDao = new UsersDao();
    //check for the exsistence of the user by user email
    if( !$usersDao->getUserByEmail( $userObject->getUserEmail() ) )
    {
      // check error in the uploaded pic files
      // if( ($userObject->getProfilePics())->getError() === UPLOAD_ERR_OK ){
      //   //get the location of the file
      //   $directory = "../../views/profile_pics";
      //   $fileLocation = "./profile_pics/" . $this->moveUploadedFile($directory, $userObject->getProfilePics());
      // }

      //contains query of the Address Details Table
      $addressDao = new AddressDao();
      //check the exsistence of the address in the address table
      if( !$addressDao->getAddressId( $addressObject->getStreetAddress(), $addressObject->getArea(), $addressObject->getPincode() ) )
      {
        //insert address details
        $addressDao->insertAddressDetails( $addressObject->getStreetAddress(), $addressObject->getArea(), $addressObject->getPincode() );
      }

      //get the address id

      $addressObject->setAddressId( $addressDao->getAddressId( $addressObject->getStreetAddress(), $addressObject->getArea(), $addressObject->getPincode())[0]['address_id'] );

      //if random user store the name, email, password, fileLocaton, phoneNumber, roleId, addressId
      if( ( ($rolesObject->getRoleId()) == 1) || ( ($rolesObject->getRoleId()) == 3) )
      {
          $usersDao->insertForUsers( $userObject->getUserName(), $userObject->getUserEmail(), $userObject->getUserPassword(), $fileLocation, $userObject->getPhoneNumber(), $rolesObject->getRoleId(),  $addressObject->getAddressId() );
      }
      //if organisation enter name, email, password, fileLocation, phoneNumber, roleId, addressId
      else if( $rolesObject->getRoleId() == 2 )
      {
          $usersDao->insertForOrg( $userObject->getUserName(), $userObject->getUserEmail(), $userObject->getUserPassword(), $userObject->getProfilePics(), $userObject->getPhoneNumber(), $userObject->getOrganisationWebsite(),  $rolesObject->getRoleId() );
      }
      else {
        return 0;//false
      }
      return 1;

    }
    else {
      return 0;
    }

}


}

 ?>
