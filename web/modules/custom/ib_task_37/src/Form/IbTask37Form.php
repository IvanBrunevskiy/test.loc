<?php

namespace Drupal\ib_task_37\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * Extends from FormBase class Form API
 * @see \Drupal\Core\Form\FormBase
 */
class IbTask37Form extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {

//    $form['file'] = [
//      '#title' => $this->t('CSV file'),
//      '#type' => 'managed_file',
//      '#upload_location' => 'public://',
//      '#upload_validators' => array(
//        'file_validate_extensions' => array('csv'),
//      ),
//      '#required' => TRUE,
//    ];
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Начать',
    );


    return $form;
  }

  public function getFormId() {
    return 'ib_task_37_form';
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->fields('nfd', ['nid']);
    $result = $query->execute()->fetchAll();
    $operations = [];
    foreach ($result as $row) {
      $operations[] = array('ib_task_37_change_date', [$row->nid]);
    }
    $batch = array(
      'operations' => $operations,
      'finished' => 'ib_task_37_batch_finished',
      'title' => 'Обновление дат',
      'init_message' => 'Подготовка данных',
      'progress_message' => 'Выполнено @current из @total.',
      'error_message' => 'Произошла ошибка.',
    );
    batch_set($batch);

  }
    function ib_task_37_change_date($nid)
    {

      $node = Node::load($nid);
      $node->get('created')->value = 1628845111;
      $node->save();

    }

    /**
     * Batch finish callback.
     */
    function ib_task_37_batch_finished($success, $results, $operations)
    {
      if ($success) {
        \Drupal::messenger()->addMessage('Обновлена дата у материалов');
      } else {
        \Drupal::messenger()->addMessage('Завершено с ошибками.');
      }
    }

}
