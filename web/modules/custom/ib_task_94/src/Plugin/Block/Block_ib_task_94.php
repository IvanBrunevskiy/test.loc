<?php

namespace Drupal\ib_task_94\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "ib_task_94_block",
 *   admin_label = @Translation("ib Task 94 block"),
 *   category = @Translation("block 94"),
 * )
 */

class Block_ib_task_94 extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_time = \Drupal::time()->getCurrentTime();
    $get_minute = DrupalDateTime::createFromTimestamp($current_time)->format('d/m/Y');
    return [
      '#theme' => 'block_ib_task_94',
      '#title' => 'My block Ivan!!!',
      '#description' => 'Hello world',
      '#time' => $get_minute,
    ];
  }
}
