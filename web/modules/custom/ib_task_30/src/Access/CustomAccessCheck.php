<?php

namespace Drupal\ib_task_30\Access;

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
   */
  public function access(AccountInterface $account) {
    $current_time = \Drupal::time()->getCurrentTime();
    $date_output = date('i', $current_time);

    if (in_array('manager', $account->getRoles())) {
      $manager = TRUE;
    }
    else {
      $auth = TRUE;
    }

    if (($date_output % 2) == 0) {
      return AccessResult::allowedIf($manager);
    }
    elseif (($date_output % 2) !== 0) {
      return AccessResult::allowedIf($auth);
    }
  }
}
