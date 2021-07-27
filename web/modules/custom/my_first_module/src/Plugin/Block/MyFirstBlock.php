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
  public function build() {
    return [
      '#markup' => $this->t('Hello, World!'),
    ];
  }
}
