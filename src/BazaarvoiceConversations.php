<?php

namespace BazaarvoiceConversations;

use BazaarvoiceConversations\ContentType\ContentTypeFactory;
use BazaarvoiceRequest\BazaarvoiceRequest;
use BazaarvoiceRequest\BazaarvoiceRequestInterface;

class BazaarvoiceConversations {

  private $contentTypeFactory;


  public function __construct(BazaarvoiceRequestInterface $bazaarvoiceRequest) {
    // Instantiate contentTypeFactory.
    $this->contentTypeFactory = new ContentTypeFactory($bazaarvoiceRequest);

  }

  public function getContentType($type) {
    return $this->contentTypeFactory->build($type);
  }





}