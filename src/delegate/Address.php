<?php

namespace App\delegate;

use App\model\AddressDetails as AddressModel;
use App\DAO\AddressDao;

class Address
{

  public $addressModel;
  public $addressDao;

  public function __construct( $datas )
  {
    $this->addressModel = new AddressModel();
    $this->addressDao = new AddressDao();
    $this->addressModel->setStreetAddress( $datas['streetAddress'] );
    $this->addressModel->setArea( $datas['area'] );
    $this->addressModel->setPincode( $datas['pincode'] );
  }

  public function addAddressDetails()
  {
    $this->addressDao->insertAddressDetails( $this->addressModel->getStreetAddress(),
                                       $this->addressModel->getArea(),
                                       $this->addressModel->getPincode() );
  }

  public function getAddressId()
  {
    return $this->addressDao->getAddressId( $this->addressModel->getStreetAddress(),
                                       $this->addressModel->getArea(),
                                       $this->addressModel->getPincode())[0]['address_id'] ;
  }

// $addressObject->setAddressId(  );

}


 ?>
