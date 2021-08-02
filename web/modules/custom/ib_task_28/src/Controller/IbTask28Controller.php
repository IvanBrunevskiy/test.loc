<?php

namespace Drupal\ib_task_28\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the count block.
 */
class IbTask28Controller extends ControllerBase {
  public function index() {
    $parameter = \Drupal::routeMatch()->getParameter('id');
    $block_manager = \Drupal::service('plugin.manager.block');
    $config = [];
    $plugin_block = $block_manager->createInstance('ib_task_28_block', $config);
    $render = [];

    for($i=0; count($render)<$parameter; $i++) {
      $render[] = $plugin_block->build();
    }

    return $render;
  }
}
