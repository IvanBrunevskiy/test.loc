<?php

namespace Drupal\ib_task_55\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ajax' Block.
 *
 * @Block(
 *   id = "ib_task_55_block",
 *   admin_label = @Translation("ib Task 55 block"),
 *   category = @Translation("ajax link"),
 * )
 */

class IbTask55Block extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#title' => 'My ajax block',
      '#markup' => '<a class="use-ajax" href="/ib-task-55">show ajax alert</a>',
    ];
  }
}
