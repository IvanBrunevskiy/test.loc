<?php

namespace Drupal\ib_task_95\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "ib-task_95_block",
 *   admin_label = @Translation("ib Task 95 block"),
 *   category = @Translation("Hello World"),
 * )
 */

class MyFirstBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'block_ib_task_95',
      '#title' => 'My block',
      '#description' => 'Hello world',
    ];
  }
}
