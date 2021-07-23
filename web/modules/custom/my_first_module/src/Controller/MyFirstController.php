<?php

namespace Drupal\my_first_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the page 'Hello Word'.
 */
class MyFirstController extends ControllerBase {
  public function hello_world() {
    $output['#markup'] = 'Hello World';
    return $output;
  }
}
