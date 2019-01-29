<?php

namespace App\DAO;
use App\utils\DbConnect;

class AddressDao extends dbConnect
{


  public $tableName = 'address_details';

  public function insertAddressDetails($streetAddress, $area, $pincode)
  {
      $columns = array('street_address', 'area', 'pincode');
      $values = array('street_address' => $streetAddress, 'area' => $area,
                      'pincode' => $pincode);
      parent::insert($this->tableName, $columns, $values);
  }



  public function getAddressId($streetAddress, $area, $pincode)
  {
    $selector = "address_id";
    $wherePhrase = array('street_address' => $streetAddress, 'area' => $area,
                    'pincode' => $pincode);
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }


}

 ?>
