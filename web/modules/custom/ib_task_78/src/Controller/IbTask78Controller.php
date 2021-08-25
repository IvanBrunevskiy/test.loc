<?php

namespace Drupal\ib_task_78\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

/**
 * This function displays on the cache.
 */
class IbTask78Controller extends ControllerBase {
  public function index() {
    $account = User::load(\Drupal::currentUser()->id());
    $user_name = $account->get('name')->value;

      if (\Drupal::cache()->get($user_name) == FALSE) {
        \Drupal::cache()->set($user_name, $account);
      }

    $cache = \Drupal::cache()->get($user_name);
    $name = $cache->cid;
    $output['#markup'] = 'Now ' . $name . ' is logged in now';

    return $output;
  }
}
