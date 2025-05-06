<?php

namespace Drupal\events_display\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides an 'Upcoming Events Block'.
 *
 * @Block(
 *   id = "upcoming_events_block",
 *   admin_label = @Translation("Upcoming Events Block"),
 *   category = @Translation("Custom")
 * )
 */
class UpcomingEventsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $num_events = $this->configuration['num_events'] ?? 5;
    $event_service = \Drupal::service('events_display.event_service');
    $events = array_slice($event_service->fetchUpcomingEvents(), 0, $num_events);

    $output = [];

    foreach ($events as $event) {
      $title = $event['title'] ?? 'Untitled';
      $start = isset($event['start_date']) ? substr($event['start_date'], 0, 10) : 'Unknown date';
      $end = isset($event['end_date']) ? substr($event['end_date'], 0, 10) : 'Unknown date';
      $space = $event['space']['name'] ?? '';

      $output[] = [
        '#markup' => "<div><strong>$title</strong> - from $start to $end" . ($space ? " @ $space" : "") . "</div>",
      ];
    }

    return [
      '#theme' => 'item_list',
      '#items' => $output,
      '#attributes' => ['class' => ['upcoming-events']],
    ];
  }


  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['num_events'] = [
      '#type' => 'number',
      '#title' => $this->t('Number of Events to Display'),
      '#default_value' => $this->configuration['num_events'] ?? 5,
      '#min' => 1,
      '#max' => 10,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['num_events'] = $form_state->getValue('num_events');
  }

}
