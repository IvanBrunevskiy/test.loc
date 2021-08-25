<?php

namespace Drupal\ib_task_56\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'modal' Block.
 *
 * @Block(
 *   id = "ib_task_56_block",
 *   admin_label = @Translation("ib Task 56 block"),
 *   category = @Translation("modal link"),
 * )
 */

class IbTask56Block extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#title' => 'My modal block',
      '#markup' => '<a href="/ib-task-56" class="use-ajax" data-dialog-type="modal">My modal window</a>',
    ];
  }
}
