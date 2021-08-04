<?php

namespace Drupal\ib_task_30\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the count block.
 */
class IbTask30Controller extends ControllerBase {
  public function index() {
    $output['#markup'] = 'Hello people';

    return $output;
  }
}
