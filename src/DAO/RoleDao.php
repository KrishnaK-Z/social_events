<?php

namespace App\DAO;
use App\utils\DbConnect;


class RoleDao extends DbConnect
{

  public $tableName = 'roles';
  public $roleId;

  public function getRoleId($roleType)
  {
    $selector = "roles_id";
    $wherePhrase = array('role_type' => $roleType);
    $results = parent::selectBy($this->tableName, $wherePhrase, $selector);
    return $results;
  }

}

 ?>
