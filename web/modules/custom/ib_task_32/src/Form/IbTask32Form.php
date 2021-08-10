<?php

namespace Drupal\ib_task_32\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Extends from FormBase class Form API
 * @see \Drupal\Core\Form\FormBase
 */
class IbTask32Form extends FormBase
{

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

    $form['country'] = [
      '#type' => 'select',
      '#empty_value' => '',
      '#empty_option' => '- Select a value -',
      '#default_value' => (isset($values['country']) ? $values['country'] : ''),
      '#options' => $country,
      '#title' => $this->t('Country'),
      '#ajax' => array(
        'callback' => [$this, 'mySelectChange'],
        'event' => 'change',
        'wrapper' => 'edit-city',
      ),
    ];

    $form['city'] = [
      '#type' => 'select',
      '#options' => ['Choose the country'],
    ];

    $values = $form_state->getValues();
    if (!empty($values['country'])) {
    $cities = \Drupal::entityTypeManager()->getStorage('taxonomy_term')
      ->loadByProperties(['vid' => 'citylist', 'field_country' => $values['country']]);
    $cities_of_country = [];

      foreach ($cities as $city_id) {
        foreach ($city as $key => $value) {
          if ($city_id->id() == $key) {
            $cities_of_country[] = $value;
          }
        }
      }

      $form['city']['#title'] = 'City';
      $form['city']['#options'] = $cities_of_country;
    }

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];

    return $form;
  }

  public function mySelectChange(array &$form, FormStateInterface $form_state) {
    return $form['city'];
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


