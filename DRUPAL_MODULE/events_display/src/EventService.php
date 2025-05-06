<?php

namespace Drupal\events_display;

use Drupal\Core\Cache\CacheBackendInterface;
use GuzzleHttp\ClientInterface;
/**
 * Class to fetch upcoming events from Laravel API.
 */
class EventService {

  protected $httpClient;
  protected $cache;
  protected $logger;

  /**
   * Constructs a new EventService.
   *
   * @param \Drupal\Core\Http\ClientInterface $http_client
   *   The HTTP client service.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache
   *   The cache service.
   * @param \Psr\Log\LoggerInterface $logger
   *   The logger service.
   */
  public function __construct(ClientInterface $http_client, CacheBackendInterface $cache) {
    $this->httpClient = $http_client;
    $this->cache = $cache;
  }


  /**
   * Fetch upcoming events from Laravel API.
   *
   * @return array
   *   An array of events.
   */
  public function fetchUpcomingEvents() {
    $cache = $this->cache->get('events_upcoming');
    if ($cache) {
      return $cache->data;
    }

    try {
      $response = $this->httpClient->get('http://localhost:8000/api/events');
      $body = json_decode($response->getBody()->getContents(), true);

      // Extract only the "data" array from the response
      if (!isset($body['data']) || !is_array($body['data'])) {
        throw new \Exception('Invalid API response format');
      }

      $events = $body['data'];

      // Optionally format or trim data here
      $this->cache->set('events_upcoming', $events, strtotime('+1 hour'));
      return $events;
    } catch (\Exception $e) {
      return [];
    }
  }
}
