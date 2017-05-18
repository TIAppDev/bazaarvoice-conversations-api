<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Answers
 * @package BazaarvoiceConversations\ContentType
 */
class Answers extends SubmitContentTypeBase {

  protected $retrieve_endpoint = 'data/answers';
  protected $submit_endpoint = 'data/submitanswer';
  protected $submit_response_type = 'BazaarvoiceConversations\\Response\\AnswerSubmitResponse';

  /**
   * Get answers for a particular Product based on id.
   *
   * @param string $product_id
   *   Unique product id.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return mixed
   */
  public function getProductAnswers($product_id, array $configuration = []) {
    $answers = [];
    $configuration['arguments']['filter']['productid'] = $product_id;

    $response = $this->retrieveRequest($configuration);
    if ($response && ($response->getResultCount() > 0)) {
      $answers = $response->getResults();
    }
    return $answers;
  }

}