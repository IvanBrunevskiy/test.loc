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
    $country_terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('countrylist');
    $values = $form_state->getValues();
    $country = [];
    foreach ($country_terms as $country_term) {
      $country[$country_term->tid] = $country_term->name;
    }

    $form['country'] = [
      '#type' => 'select',
      '#empty_option' => '- Select a country -',
      '#options' => $country,
      '#title' => $this->t('Country'),
      '#ajax' => [
        'callback' => [$this, 'mySelectChange'],
        'event' => 'change',
        'wrapper' => 'edit-city',
      ],
    ];

    if (isset($values['country'])) {
      $cities_entity = \Drupal::entityTypeManager()->getStorage('taxonomy_term')
        ->loadByProperties(['vid' => 'citylist', 'field_country' => $values['country']]);

      $cities_of_country = [];
      foreach ($cities_entity as $city) {
        $cities_of_country[] = $city->name->value;
      }

    }else {
      $cities_of_country[] = 'Choose the country';
    }

    $form['city'] = [
      '#type' => 'select',
      '#options' => $cities_of_country,
      '#title' => $this->t('City'),
      '#attributes' => ['id' => 'edit-city',],
      '#prefix' => '<div id="edit-city">',
      '#suffix' => '</div>'
    ];

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


