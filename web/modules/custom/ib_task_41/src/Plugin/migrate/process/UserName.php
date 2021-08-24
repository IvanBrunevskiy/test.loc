<?php

namespace Drupal\ib_task_41\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;

/**
 * Return reversed string.
 *
 * @MigrateProcessPlugin(
 *   id = "username"
 * )
 */
class UserName extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, \Drupal\migrate\MigrateExecutableInterface $migrate_executable, \Drupal\migrate\Row $row, $destination_property) {
    $str = strpos($value, '@');
    $user_name = substr($value, 0, $str);
    return $user_name;
  }

}
