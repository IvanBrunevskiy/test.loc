<?php

namespace Drupal\ib_task_28\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "ib_task_28_block",
 *   admin_label = @Translation("ib Task 28 block"),
 *   category = @Translation("Rouning block"),
 * )
 */

class Block_ib_task_28 extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'block_ib_task_28',
      '#title' => 'My block Ivan',
      '#description' => 'Hello world',
    ];
  }
}
