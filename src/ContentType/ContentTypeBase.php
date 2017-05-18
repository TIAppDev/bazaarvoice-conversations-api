<?php

namespace BazaarvoiceConversations\ContentType;

use BazaarvoiceRequest\Request\BazaarvoiceRequestInterface;

abstract class ContentTypeBase {

  protected $BazaarvoiceRequest;

  public function __construct(BazaarvoiceRequestInterface $BazaarvoiceRequest) {
    $this->BazaarvoiceRequest = $BazaarvoiceRequest;
  }

  /**
   * Makes an API request.
   *
   * @param string $endpoint
   *   API Endpoint to request.
   *
   * @param array  $configuration
   *   API configuration array. Key/value pairs.
   *
   * @param string $response_type
   *   (optional) Class name for type of response object to return.
   *
   * @return mixed
   */
  public function apiRequest($endpoint, array $configuration = [], $response_type = 'BazaarvoiceConversations\\Response\\ConversationsResponse') {
    return $this->BazaarvoiceRequest->apiRequest($endpoint, $configuration, $response_type);
  }



}