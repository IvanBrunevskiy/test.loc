<?php

namespace Drupal\ib_task_93\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class ModuleConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ib_task_93_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ib_task_93.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ib_task_93.settings');
    $form['ib_task_93_country'] = [
      '#type' => 'select',
      '#title' => 'Country',
      '#options' => [
        'Belarus' => 'Belarus',
        'Russia' => 'Russia',
        'USA' => 'USA',
      ],
      '#default_value' => $config->get('ib_task_93_country'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('ib_task_93.settings')
      ->set('ib_task_93_country', $form_state->getValue('ib_task_93_country'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
