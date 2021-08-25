<?php

namespace Drupal\ib_task_55\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\AlertCommand;
use Drupal\Core\Controller\ControllerBase;

/**
 * This function displays on the my alert.
 */
class IbTask55Controller extends ControllerBase {
  public function index() {
    $response = new AjaxResponse();
    $response->addCommand(new AlertCommand('Hello User'));

    return $response;
  }
}
