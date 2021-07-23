<?php

namespace Drupal\my_first_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class MyFirstController extends ControllerBase
{
public function hello(){
  $array['#markup'] = 'Hello World';
  return $array;
}
}
