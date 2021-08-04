<?php

namespace Drupal\ib_task_93\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the Country.
 */
class IbTask93Controller extends ControllerBase {
  public function index() {
    $config = \Drupal::config('ib_task_93.settings');
    $country = $config->getRawData();
    $output['#title'] = $country['ib_task_93_country'];

    return $output;
  }
}
