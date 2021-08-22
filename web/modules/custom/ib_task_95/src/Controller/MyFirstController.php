<?php

namespace Drupal\ib_task_95\Controller;

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
