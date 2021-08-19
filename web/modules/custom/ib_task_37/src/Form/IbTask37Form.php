<?php

namespace Drupal\ib_task_37\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;

/**
 * Extends from FormBase class Form API
 * @see \Drupal\Core\Form\FormBase
 */
class IbTask37Form extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['#attributes']['enctype'] = "multipart/form-data";

    $form['csvfile'] = [
      '#title' => $this->t('CSV file'),
      '#type' => 'managed_file',
      '#upload_location' => 'public://',
      '#upload_validators' => [
        'file_validate_extensions' => ['csv'],
      ],
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => 'Import',
    ];

    return $form;
  }

  public function getFormId()
  {
    return 'ib_task_37_form';
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $file = \Drupal::entityTypeManager()->getStorage('file')
      ->load($form_state->getValue('csvfile')[0]);
    $full_path = $file->get('uri')->value;
    $users_info = [];

    if (($file_read = fopen($full_path, 'r')) !== FALSE) {

      while (($data = fgetcsv($file_read, 1000, ',')) !== FALSE) {
        $users_info[] = $data;
      }
      fclose($file_read);
    }

    $operations = [];

    foreach ($users_info as $row) {
      $operations[] = [
        [$this, 'ib_task_37_create_users'],
        [$row],
      ];
    }

    $batch = [
      'operations' => $operations,
      'finished' => [$this, 'ib_task_37_batch_finished'],
      'title' => 'Users loading',
      'init_message' => 'Data preparation',
      'progress_message' => 'Completed @current из @total.',
      'error_message' => 'An error has occurred.',
    ];
    batch_set($batch);
  }

    function ib_task_37_create_users($user_info) {
      $str = strpos($user_info[0], '@');
      $user_name = substr($user_info[0], 0, $str);
      User::create([
        'name' => $user_name,
        'mail' => $user_info[0],
        'pass' => $user_info[1],
      ])->save();
    }

    /**
     * Batch finish callback.
     */
    function ib_task_37_batch_finished($success) {
      if ($success) {
        \Drupal::messenger()->addMessage('Users uploaded successfully');
      }
      else {
        \Drupal::messenger()->addMessage('Completed with errors.');
      }
    }
}
