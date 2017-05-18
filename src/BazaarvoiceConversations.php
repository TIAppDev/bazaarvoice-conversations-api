<?php

namespace BazaarvoiceConversations;

use BazaarvoiceConversations\ContentType\ContentTypeFactory;
use BazaarvoiceRequest\BazaarvoiceRequestInterface;

class BazaarvoiceConversations {

  private $contentTypeFactory;

  public function __construct(BazaarvoiceRequestInterface $bazaarvoiceRequest) {
    // Instantiate contentTypeFactory.
    $this->contentTypeFactory = new ContentTypeFactory($bazaarvoiceRequest);
  }

  /**
   * Return Bazaarvoice Content Type Object from factory.
   *
   * @param string $type
   *   Content Type name.
   *
   * @return mixed
   *    Boolean FALSE or class object.
   */
  public function getContentType($type) {
    return $this->contentTypeFactory->build($type);
  }

}