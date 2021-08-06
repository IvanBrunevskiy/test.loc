<?php

namespace Drupal\ib_task_31\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Extends from FormBase class Form API
 * @see \Drupal\Core\Form\FormBase
 */
class IbTask31Form extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
    ];

    $form['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your name'),
      '#required' => TRUE,
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];

    return $form;
  }

  public function getFormId() {
    return 'ib_task_31_form';
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::logger('ib_task_31')->notice('Email - @email Name - %username.',
      array(
        '@email' => $form_state->getValue('email'),
        '%username' => $form_state->getValue('username'),
      ));
  }
}
