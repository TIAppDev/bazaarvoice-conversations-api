<?php

namespace BazaarvoiceConversations\ContentType;

use BazaarvoiceRequest\BazaarvoiceRequestInterface;

abstract ContentTypeBase {

  protected $BazaarvoiceRequest;

  public function __construct(BazaarvoiceRequestInterface $BazaarvoiceRequest) {
    $this->BazaarvoiceRequest = $BazaarvoiceRequest;
  }

}