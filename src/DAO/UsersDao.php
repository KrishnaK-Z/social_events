<?php

namespace App\DAO;
use App\utils\DbConnect;


class UsersDao extends DbConnect
{

  public $tableName = 'users';
  public $selectUserByEmail;
  public $selectUserById;

  //get all the user details
  public function showAllUserDetails()
  {
    $results = parent::hardCodeSelect("select * from users inner join address_details on users.address_id = address_details.address_id");
    return $results;
  }

  //get all the users for a particular mail id
  public function getUserByEmail($userEmail)
  {
    $selector = "user_email";
    $wherePhrase = array('user_email' => $userEmail);
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

  public function getUserById($userId)
  {
    $selector = "user_id";
    $wherePhrase = array('user_id' => $userId);
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

  public function getUserByEmailPass($userEmail, $userPassword)
  {
    $selector = "*";
    $wherePhrase = array('user_email' => $userEmail, 'password' => $userPassword );
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }


  public function insertForUsers($userName, $userEmail, $password, $fileLocation, $phoneNumber, $roleId, $addressId)
  {
    $columns = array('user_name', 'user_email', 'password', 'profile_pic', 'phone_number', 'role_id', 'address_id');
    $values = array('user_name' => $userName, 'user_email' => $userEmail,
                    'password' => $password, 'profile_pic' => $fileLocation,
                    'phone_number' => $phoneNumber, 'role_id' => $roleId,
                    'address_id' => $addressId);
    parent::insert($this->tableName, $columns, $values);
  }

  public function insertForOrg($userName, $userEmail, $password, $fileLocation, $phonenumber, $organisationWebsite, $roleId)
  {
    $columns = array('user_name', 'user_email', 'password', 'profile_pic', 'phone_number', 'organisation_website', 'role_id');
    $values = array('user_name' => $userName, 'user_email' => $userEmail,
                    'password' => $password, 'profile_pic' => $fileLocation,
                    'phone_number' => $phoneNumber, 'organisation_website' => $organisationWebsite,
                    'role_id' => $roleId,
                    );
    parent::insert($this->tableName, $columns, $values);
  }


}


 ?>
