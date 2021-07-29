<?php

namespace Drupal\my_task95_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "task_95_block",
 *   admin_label = @Translation("Task 95 block"),
 *   category = @Translation("Hello World"),
 * )
 */

class MyFirstBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'block_task_95',
      '#title' => 'My block',
      '#description' => 'Hello world',
    ];
  }
}
