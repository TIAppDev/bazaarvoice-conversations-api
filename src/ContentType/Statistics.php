<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Statistics
 * @package BazaarvoiceConversations\ContentType
 */
class Statistics extends ContentTypeBase implements RetrieveContentInterface {

  public function getSingle($id, array $parameters = []) {
    $single_content = FALSE;
    // Call getMultiple, passing ID as an array.
    if ($multiple_content = $this->getMultiple([$id], $parameters)) {
      // Pop off the returned object.
      $single_content = array_pop($multiple_content);
    }
    return $single_content;
  }

  public function getMultiple(array $ids, array $parameters = []) {
    // Set default filter for ids.
    $parameters['filter']['productid'] = $ids;
    $parameters['stats'] = ['Reviews','NativeReviews'];

    return $this->getAll($parameters);
  }

  public function getAll(array $parameters = []) {
    $configuration = [
      'arguments' => $parameters,
    ];
    return $this->BazaarvoiceRequest->apiRequest('data/statistics', $configuration);
  }

  /**
   * Get Statistics for a specific product.
   *
   * @param string $product_id
   *   Unique ID of the product
   *
   * @param array $parameters
   *   Array of parameters to pass to endpoint.
   *
   * @return mixed
   */
  public function getProductStatistics($product_id, array $parameters = []) {
    $parameters['filter']['productid'] = $product_id;
    return $this->getAll($parameters);
  }

}