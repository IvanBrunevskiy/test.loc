<?php

namespace Drupal\ib_task_54\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the my alert.
 */
class IbTask54Controller extends ControllerBase {
  public function index() {
    $render = [];
    $render['#markup'] = 'Alert page!';
    $render['#attached']['library'][] = 'ib_task_54/ib_task_54';

    return $render;
  }
}
