<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Questions
 * @package BazaarvoiceConversations\ContentType
 */
class Questions extends SubmitContentTypeBase {

  protected $retrieve_endpoint = 'data/questions';
  protected $submit_endpoint = 'data/submitquestion';
  protected $submit_response_type = 'BazaarvoiceConversations\\Response\\QuestionSubmitResponse';


  /**
   * Get Questions for a specific product based on Product Id.
   *
   * @param string $product_id
   *   Unique ID of the product to retrieve.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return array
   */
  public function getProductQuestions($product_id, array $configuration = []) {

    $questions = [];
    $configuration['arguments']['filter']['productid'] = $product_id;

    $response = $this->retrieveRequest($configuration);
    if ($response && ($response->getResultCount() > 0)) {
      $questions = $response->getResults();
    }
    return $questions;
  }
}