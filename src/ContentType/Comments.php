<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Comments
 * @package BazaarvoiceConversations\ContentType
 */
class Comments extends SubmitContentTypeBase {

  protected $retrieve_endpoint = 'data/reviewcomments';
  protected $submit_endpoint = 'data/submitcomment';
  protected $submit_response_type = 'BazaarvoiceConversations\\Response\\CommentSubmitResponse';

  /**
   * Retrieve comments for a specific Product based on Product Id.
   *
   * @param string $product_id
   *   Unique ID of the Product.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return array
   */
  public function getProductComments($product_id, array $configuration = []) {
    $comments = [];

    $configuration['arguments']['filter']['productid'] = $product_id;

    $response = $this->retrieveRequest($configuration);
    if ($response && ($response->getResultCount() > 0)) {
      $comments = $response->getResults();
    }
    return $comments;
  }

  /**
   * Retrieve comments for a specific Review based on Review Id.
   *
   * @param string $review_id
   *   Unique ID of the Review.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return array
   */
  public function getReviewComments($review_id, array $configuration= []) {
    $comments = [];

    $configuration['arguments']['filter']['reviewid'] = $review_id;

    $response = $this->retrieveRequest($configuration);
    if ($response && ($response->getResultCount() > 0)) {
      $comments = $response->getResults();
    }
    return $comments;
  }
}