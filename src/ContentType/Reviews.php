<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Reviews
 * @package BazaarvoiceConversations\ContentType
 */
class Reviews extends SubmitContentTypeBase {

  protected $retrieve_endpoint = 'data/reviews';
  protected $submit_endpoint = 'data/submitreview';
  protected $submit_response_type = 'BazaarvoiceConversations\\Response\\ReviewSubmitResponse';

  /**
   * Get Reviews for a specific product based on Product Id.
   *
   * @param string $product_id
   *   Unique Product Id.
   *
   * @param array $configuration
   *   key/value array of API configuration.
   *
   * @return array
   */
  public function getProductReviews($product_id, array $configuration = []) {
    $configuration['arguments']['filter']['productid'] = $product_id;
    return $this->retrieveRequest($configuration);
  }
}
