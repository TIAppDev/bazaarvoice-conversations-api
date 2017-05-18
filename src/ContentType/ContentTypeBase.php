<?php

namespace BazaarvoiceConversations\ContentType;

use BazaarvoiceRequest\BazaarvoiceRequestInterface;

abstract class ContentTypeBase {

  protected $BazaarvoiceRequest;

  public function __construct(BazaarvoiceRequestInterface $BazaarvoiceRequest) {
    $this->BazaarvoiceRequest = $BazaarvoiceRequest;
  }

  public function apiRequest($endpoint, array $configuration = [], $response_type = 'BazaarvoiceConversations\\Response\\ConversationsResponse') {
    return $this->BazaarvoiceRequest->apiRequest($endpoint, $configuration, $response_type);
  }

  public function retrieveRequest($endpoint, array $configuration = [], $response_type = 'BazaarvoiceConversations\\Response\\RetrieveContentResponse') {
    return $this->apiRequest($endpoint, $configuration, $response_type);
  }

  public function submitRequest($endpoint, array $configuration = [], $response_type = 'BazaarvoiceConversations\\Response\\SubmitContentResponse') {
    return $this->apiRequest($endpoint, $configuration, $response_type);
  }
}