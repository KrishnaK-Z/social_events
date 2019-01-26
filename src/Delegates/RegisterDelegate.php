<?php

namespace App\Delegates;
use App\models\UserDetailsModel;
use App\DAO\UsersDao;
use App\DAO\RoleDao;
use App\DAO\AddressDao;
use App\DAO\SuggestionsNotification;

class RegisterDelegate
{

  public function getUserObject($datas)
  {
    // var_dump($datas);
    $userDetailsModel = new UserDetailsModel();
    $userDetailsModel->setUserName($datas['userName']);
    $userDetailsModel->setUserEmail($datas['userEmail']);
    $userDetailsModel->setUserPassword($datas['password']);
    $userDetailsModel->setProfilePics($datas['profilePic']);
    $userDetailsModel->setPhoneNumber($datas['phonenumber']);
    $userDetailsModel->setOrganisationWebsite($datas['organisationWebsite']);
    $userDetailsModel->setRoleType($datas['roleType']);
    $userDetailsModel->setStreetAddress($datas['streetAddress']);
    $userDetailsModel->setArea($datas['area']);
    $userDetailsModel->setPincode($datas['pincode']);
    return $userDetailsModel;
  }

  public function registerUser($datas)
  {
    // var_dump($datas);
    $fileLocation = null;//location of the profile picture

    $userObject = $this->getUserObject($datas);

    //contains query of the userTable
    $roleDao = new RoleDao();
    $roleId = $roleDao->getRoleId( $userObject->getRoleType() );
    $userObject->setRoleId($roleId[0]['roles_id']);

    //contains query for the Users Table
    $usersDao = new UsersDao();
    //check for the exsistence of the user by user email
    if( !$usersDao->getUserByEmail( $userObject->getUserEmail() ) )
    {
      //check error in the uploaded pic files
      // if( ($userObject->getProfilePics())->getError() === UPLOAD_ERR_OK ){
      //   //get the location of the file
      //   $directory = "../../views/profile_pics";
      //   $fileLocation = "./profile_pics/" . $this->moveUploadedFile($directory, $userObject->getProfilePics());
      // }

      //contains query of the Address Details Table
      $addressDao = new AddressDao();
      //check the exsistence of the address in the address table
      if( !$addressDao->getAddressId( $userObject->getStreetAddress(), $userObject->getArea(), $userObject->getPincode()) )
      {
        //insert address details
        $addressDao->insertAddressDetails( $userObject->getStreetAddress(), $userObject->getArea(), $userObject->getPincode() );
      }

      //get the address id

      $userObject->setAddressId( $addressDao->getAddressId( $userObject->getStreetAddress(), $userObject->getArea(), $userObject->getPincode())[0]['address_id'] );

      //if random user store the name, email, password, fileLocaton, phoneNumber, roleId, addressId
      if( ( ($userObject->getRoleId()) == 1) || ( ($userObject->getRoleId()) == 3) )
      {
          $usersDao->insertForUsers( $userObject->getUserName(), $userObject->getUserEmail(), $userObject->getUserPassword(), $fileLocation, $userObject->getPhoneNumber(), $userObject->getRoleId(),  $userObject->getAddressId() );

          //work need to be done
          // $suggestionsNotification = new SuggestionsNotification();
          // $suggestionsNotification->initializeSuggNotification(  );
      }
      //if organisation enter name, email, password, fileLocation, phoneNumber, roleId, addressId
      else if( $roleId == 2 )
      {
          $usersDao->insertForOrg( $userObject->getUserName(), $userObject->getUserEmail(), $userObject->getUserPassword(), $userObject->getProfilePics(), $userObject->getPhoneNumber(), $userObject->getOrganisationWebsite(),  $roleIdVar );
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


// function moveUploadedFile($directory, $uploadedFile)
// {
//     $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
//     $basename = bin2hex(random_bytes(8));
//     $filename = sprintf('%s.%0.8s', $basename, $extension);
//     $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
//     return $filename;
// }

}

 ?>
