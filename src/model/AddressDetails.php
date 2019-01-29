<?php

namespace App\model;

use App\abstracts\AddressDetails as AddressAbs;

class AddressDetails implements AddressAbs
{

  public $addressId;
  public $streetAddress;
  public $area;
  public $pincode;

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
