<?php

namespace Drupal\ib_task_94\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the my block.
 */
class IbTask94Controller extends ControllerBase {
  public function index() {
    $block_manager = \Drupal::service('plugin.manager.block');
    $config = [];
    $plugin_block = $block_manager->createInstance('ib_task_94_block', $config);
    $render = [];
    $render[] = $plugin_block->build();
    $render['#markup'] = 'Hello World!';
    $render['#attached']['library'][] = 'ib_task_94/ib_task_94';

    return $render;
  }
}
