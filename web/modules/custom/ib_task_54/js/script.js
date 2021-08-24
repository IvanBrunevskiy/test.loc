/**
 * @file
 * Simple JavaScript div class file.
 */
(function ($, Drupal, settings) {
  Drupal.behaviors.helloworld = {
    attach: function (context) {
      alert('Hello! I am alert!');
    }
  }
})(jQuery, Drupal, drupalSettings);

