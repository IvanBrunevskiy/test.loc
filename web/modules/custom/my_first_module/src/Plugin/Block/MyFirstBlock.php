<?php

namespace Drupal\my_first_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "my_first_block",
 *   admin_label = @Translation("My first block"),
 *   category = @Translation("Hello World"),
 * )
 */
class MyFirstBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'myfirst',
      '#title' => 'My block',
      '#description' => 'Hello world'
    ];
  }
}
