/**
 * @file
 * Simple JavaScript div class file.
 */

(function ($, Drupal, settings) {

  Drupal.behaviors.ib_task_94 = {
    attach: function () {
      let body = document.body;
      let text = body.className;
      let elem = document.querySelector('div')
      alert(elem.textContent = text);
    }
  }

})(jQuery, Drupal, drupalSettings);
