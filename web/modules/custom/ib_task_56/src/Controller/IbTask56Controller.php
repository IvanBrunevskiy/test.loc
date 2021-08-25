<?php

namespace Drupal\ib_task_56\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the my alert.
 */
class IbTask56Controller extends ControllerBase {
  public function index() {
    $output['#markup'] = 'Hello Ivan! It is your first modal window';
    return $output;
  }
}
