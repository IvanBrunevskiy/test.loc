<?php

namespace Drupal\ib_task_30\Access;

use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;

/**
 * Checks access for displaying configuration translation page.
 */
class CustomAccessCheck implements AccessInterface {

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   *
   * @var  $acces
   *    A variable that defines the access rights.
   */
  public function access(AccountInterface $account) {
    $current_time = \Drupal::time()->getCurrentTime();
    $get_minute = DrupalDateTime::createFromTimestamp($current_time)->format('i');
    $manager_anonymous = (in_array('manager', $account->getRoles()) || in_array('anonymous', $account->getRoles()));

    if (($get_minute % 2) == 0) {
      $acces = AccessResult::allowedIf(in_array('manager', $account->getRoles()));
    }
    elseif (($get_minute % 2) !== 0) {
      $acces = AccessResult::allowedIf(!$manager_anonymous);
    }

    return $acces;
  }
}
