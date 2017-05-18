<?php

namespace BazaarvoiceConversations;

use BazaarvoiceConversations\ContentType\ContentTypeFactory;
use BazaarvoiceRequest\Request\BazaarvoiceRequestInterface;

/**
 * Class BazaarvoiceConversations
 * @package BazaarvoiceConversations
 */
class BazaarvoiceConversations {

  private $contentTypeFactory;
  private $bazaarvoiceRequest;

  public function __construct(BazaarvoiceRequestInterface $bazaarvoiceRequest) {
    // Instantiate contentTypeFactory.
    $this->contentTypeFactory = new ContentTypeFactory($bazaarvoiceRequest);
    $this->bazaarvoiceRequest = $bazaarvoiceRequest;
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

  public function apiRequest($endpoint, array $configuration = []) {
    return $this->bazaarvoiceRequest->apiRequest($endpoint, $configuration);
  }

}