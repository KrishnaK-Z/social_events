<?php

namespace App\model;

use App\abstracts\Roles as RolesAbs;

class Roles implements RolesAbs
{

  public $roleId;
  public $roleType;


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

}


 ?>
