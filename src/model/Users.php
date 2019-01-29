<?php
namespace App\model;
// use App\utils\DbConnect;
use App\abstracts\Users as UsersAbs;
// use Slim\Http\UploadedFile;

class Users implements UsersAbs
{

    public $userName;
    public $userEmail;
    public $password;
    public $phonenumber;
    public $organisationWebsite;
    public $profilePics;
    public $directory;
    public $fileLocation;
    public $userId;

    public function setUserId($userId)
    {
      $this->userId = $userId;
    }

    public function getUserId()
    {
      return $this->userId;
    }

    public function setUserName($userName)
    {
      $this->userName = $userName;
    }

    public function getUserName()
    {
      return $this->userName;
    }

    public function setUserEmail($userEmail)
    {
      $this->userEmail = $userEmail;
    }

    public function getUserEmail()
    {
      return $this->userEmail;
    }

    public function setUserPassword($password)
    {
      $this->password = $password;
    }

    public function getUserPassword()
    {
      return $this->password;
    }

    public function setProfilePics($profilePics)
    {
      $this->profilePics = $profilePics;
    }

    public function getProfilePics()
    {
      return $this->profilePics;
    }

    public function setPhoneNumber($phonenumber)
    {
      $this->phonenumber = $phonenumber;
    }

    public function getPhoneNumber()
    {
      return $this->phonenumber;
    }

    public function setOrganisationWebsite($organisationWebsite)
    {
      $this->organisationWebsite = $organisationWebsite;
    }

    public function getOrganisationWebsite()
    {
      return $this->organisationWebsite;
    }

}
?>
