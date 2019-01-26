<?php

namespace App\Interphase;

interface AddressInterface
{

  public function setStreetAddress($street_address);

  public function getStreetAddress();

  public function setArea($area);

  public function getArea();

  public function setPincode($pin_code);

  public function getPincode();

  public function setAddressId($address_id);

  public function getAddressId();
}
 ?>
