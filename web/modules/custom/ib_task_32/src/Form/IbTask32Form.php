<?php

namespace Drupal\ib_task_32\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Extends from FormBase class Form API
 * @see \Drupal\Core\Form\FormBase
 */
class IbTask32Form extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {
    $city_terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('citylist');
    $country_terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('countrylist');

    $city = [];
    foreach ($city_terms as $city_term) {
      $city[$city_term->tid] = $city_term->name;
    }

    $country = [];
    foreach ($country_terms as $country_term) {
      $country[$country_term->tid] = $country_term->name;
    }

    $form['city'] = [
      '#type' => 'select',
      '#options' => $city,
      '#title' => $this->t('City'),
    ];

    $form['country'] = [
      '#type' => 'select',
      '#options' => $country,
      '#title' => $this->t('Country'),
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];

    return $form;
  }

  public function getFormId() {
    return 'ib_task_32_form';
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $city_key = $form_state->getValue('city');
    $country_key = $form_state->getValue('country');
    \Drupal::logger('ib_task_32')->notice('City - @city Country - @country.',

      [
        '@city' => $form['city']['#options'][$city_key],
        '@country' => $form['country']['#options'][$country_key],
      ]);
  }
}
