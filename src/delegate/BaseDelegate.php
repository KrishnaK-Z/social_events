<?php

namespace App\delegate;
use App\delegate\Helper;

abstract class BaseDelegate
{
  protected $helper;

  public function __construct()
  {
    $this->helper = new Helper();
  }
}


 ?>
