<?php

namespace Drupal\ib_task_27\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the page five nodes.
 */
class IbTask27Controller extends ControllerBase {
  public function index() {
    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->fields('nfd', ['title', 'created',]);
    $query->range(0, 5);
    $result = $query->execute()->fetchAll();
    $output = ['#theme' => 'page_ib_task_27', '#result' => $result];
    return $output;
  }
}
