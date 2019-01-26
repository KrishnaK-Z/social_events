<?php
namespace App\models;
// use App\utils\DbConnect;
use App\Interphase\UsersInterface;
use App\Interphase\RolesTypeInterface;
use App\Interphase\AddressInterface;
// use Slim\Http\UploadedFile;

class UserDetailsModel implements UsersInterface, RolesTypeInterface, AddressInterface
{


    public $userName;
    public $userEmail;
    public $password;
    public $phonenumber;
    public $roleType;
    public $streetAddress;
    public $area;
    public $pincode;
    public $organisationWebsite;
    public $profilePics;
    public $directory;
    public $fileLocation;
    public $userId;
    public $addressId;
    public $roleId;

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

    public function setRoleType($roleType)
    {
      $this->roleType = $roleType;
    }

    public function getRoleType()
    {
      return $this->roleType;
    }

    public function setRoleId($roleId)
    {
      $this->roleId = $roleId;
    }

    public function getRoleId()
    {
      return $this->roleId;
    }

    public function setStreetAddress($streetAddress)
    {
      $this->streetAddress = $streetAddress;
    }

    public function getStreetAddress()
    {
      return $this->streetAddress;
    }

    public function setArea($area)
    {
      $this->area = $area;
    }

    public function getArea()
    {
      return $this->area;
    }

    public function setPincode($pincode)
    {
      $this->pincode = $pincode;
    }

    public function getPincode()
    {
      return $this->pincode;
    }

    public function setAddressId($addressId)
    {
      $this->addressId = $addressId;
    }

    public function getAddressId()
    {
      return $this->addressId;
    }


}
?>
