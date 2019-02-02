<?php

namespace App\delegate;
use App\model\Users as UsersModel;
use App\model\Roles as RolesModel;
use App\delegate\Address;
use App\DAO\UsersDao;
use App\DAO\RoleDao;
use App\DAO\SuggestionsNotification;

class Registration
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

  public function getRolesObject( $datas )
  {
    $rolesModel = new RolesModel();
    $rolesModel->setRoleType( $datas['roleType'] );
    return $rolesModel;
  }


  public function registerUser( $datas )
  {
    $message;
    // var_dump($datas);
    $fileLocation = null;//location of the profile picture

    $userObject = $this->getUserObject( $datas );
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
      $address = new Address( $datas );

      if(!$address->getAddressId())
      $address->addAddressDetails();

      //if random user store the name, email, password, fileLocaton, phoneNumber, roleId, addressId
      if( ( ($rolesObject->getRoleId()) == 1) || ( ($rolesObject->getRoleId()) == 3) )
      {
          $message = $usersDao->insertForUsers( $userObject->getUserName(), $userObject->getUserEmail(),
                                     $userObject->getUserPassword(), $this->fileLocation, $userObject->getPhoneNumber(),
                                     $rolesObject->getRoleId(),  $address->getAddressId() );
          if( !strcmp($message["status"], "Invalid Data") )

            $message["message"] = "registered failed";
          else
          $message["message"] = "registered successfully";
          return $message;
      }
      //if organisation enter name, email, password, fileLocation, phoneNumber, roleId, addressId
      else if( $rolesObject->getRoleId() == 2 )
      {
          $message = $usersDao->insertForOrg( $userObject->getUserName(), $userObject->getUserEmail(), $userObject->getUserPassword(),
                                   $userObject->getProfilePics(), $userObject->getPhoneNumber(),
                                   $userObject->getOrganisationWebsite(),  $rolesObject->getRoleId() );
          $message["message"] = "registered successfully";
          return $message;
      }
      else {
        return array("message" => "registration failed",);//false
      }

    }
    else {
      return array("message" => "Already exsists");
    }

}


}

 ?>
