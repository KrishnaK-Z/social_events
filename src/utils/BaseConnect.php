<?php

namespace App\utils;

use Interop\Container\ContainerInterface;

abstract class BaseConnect
{
  protected $c;

  public function __construct(ContainerInterface $c)
  {
    $this->c = $c;
    var_dump($this->c);
  }
}
 ?>
