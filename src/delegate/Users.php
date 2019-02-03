<?php

namespace App\delegate;

use App\DAO\UsersDao;
use App\DAO\AddressDao;

use App\delegate\Helper;

class Users extends BaseDelegate
{
  public $fileLocation=null;

  //show all the user details
  public function showAllUserDetails()
  {
    $usersDao = new UsersDao();
    return $usersDao->showAllUserDetails();
  }



  public function showAllUsersByName( $name )
  {
    $usersDao = new UsersDao();
    return $usersDao->showAllUsersByName( $name );
  }



  public function showAllUsersByArea( $area )
  {
    $userDao = new UserDao();
    return $usersDao->showAllUsersByArea( $area );
  }



//edit the user detailss
  public function editUserDetails( $datas )
  {

    $userObject = $this->helper->getUserObject( $datas );

    $address = new Address( $datas );


    if(!$address->getAddressId())
    $address->addAddressDetails();


    $usersDao = new UsersDao();
    $usersDao->editUserDetails( $userObject->getUserName(), $userObject->getUserEmail(),
                               $userObject->getUserPassword(), $userObject->getPhoneNumber(),
                                $userObject->getUserId());

  }

}

 ?>
