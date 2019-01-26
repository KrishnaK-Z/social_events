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
      // $stmt = parent::queryPrepare("insert into ". $this->tableName ." (street_address, area, pincode) values (?,?,?)");
      // $stmt->bind_param("sss",$streetAddress, $area, $pincode);
      // $stmt->execute();
      // $stmt->close();
  }



  public function getAddressId($streetAddress, $area, $pincode)
  {
    $selector = "address_id";
    $wherePhrase = array('street_address' => $streetAddress, 'area' => $area,
                    'pincode' => $pincode);
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
      // $stmt = parent::queryPrepare("select address_id from ". $this->tableName ." where street_address = ? and area = ? and pincode = ?");
      // $stmt->bind_param("sss",$streetAddress, $area, $pincode);
      // $stmt->execute();
      // return parent::getResults($stmt);
  }


}

 ?>
