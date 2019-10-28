<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Statistics
 * @package BazaarvoiceConversations\ContentType
 */
class Statistics extends RetrieveContentTypeBase {

  protected $retrieve_endpoint = 'data/statistics';
  protected $id_field = 'productid';

  public function getMultipleResultsById(array $ids, array $configuration = []) {
    $configuration['arguments']['stats'] = ['Reviews', 'NativeReviews'];

    return parent::getMultipleResultsById($ids, $configuration);
  }

  /**
   * Get Statistics for a specific product.
   *
   * @param string $product_id
   *   Unique ID of the product
   *
   * @param array $configuration
   *   API configuration Key/Value pair array to pass to request.
   *
   * @return mixed
   */
  public function getProductStatistics($product_id, array $configuration = []) {
    $stats = [];
    $configuration['arguments']['filter']['productid'] = $product_id;

    $response = $this->retrieveRequest($configuration);
    if ($response && ($response->getResultCount() > 0)) {
      $stats = $response->getResults();
    }

    return $stats;
  }

}
