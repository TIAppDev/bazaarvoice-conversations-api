<?php

namespace BazaarvoiceConversations\Response;

use BazaarvoiceRequest\Response\BazaarvoiceResponse;

class ConversationsResponse extends BazaarvoiceResponse {

  protected $locale;

  public function __construct($method, $status_code, $request_url, array $request_configuration = [], array $response = []) {
    parent::__construct($method, $status_code, $request_url, $request_configuration, $response);

    $this->locale = $this->getResponse('Locale');
  }

  public function getLocale() {
    return $this->locale;
  }
}